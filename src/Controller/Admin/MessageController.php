<?php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use App\Repository\ContactMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Boîte de réception admin : contacts, disponibilités, réservations.
 *
 * @Route("/admin/messages", name="admin_message_")
 * @IsGranted("ROLE_ADMIN")
 */
class MessageController extends AbstractController
{
    private const TYPES = [
        'all' => 'Tous les messages',
        'contact' => 'Contacts',
        'availability' => 'Disponibilités',
        'booking' => 'Réservations',
    ];

    public function __construct(
        private ContactMessageRepository $messages,
        private EntityManagerInterface $em,
    ) {}

    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        $type = (string) $request->query->get('type', 'all');
        if (!array_key_exists($type, self::TYPES)) {
            $type = 'all';
        }

        $qb = $this->messages->createQueryBuilder('m')
            ->orderBy('m.createdAt', 'DESC');

        if ($type !== 'all') {
            $qb->where('m.type = :type')->setParameter('type', $type);
        }

        $items = $qb->getQuery()->getResult();

        // Compteurs par type pour les onglets
        $counts = [
            'all' => $this->messages->countAll(),
            'contact' => $this->messages->countByType(ContactMessage::TYPE_CONTACT),
            'availability' => $this->messages->countByType(ContactMessage::TYPE_AVAILABILITY),
            'booking' => $this->messages->countByType(ContactMessage::TYPE_BOOKING),
        ];

        return $this->render('admin/message/index.html.twig', [
            'items' => $items,
            'type' => $type,
            'types' => self::TYPES,
            'counts' => $counts,
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(int $id): Response
    {
        $message = $this->messages->find($id);
        if ($message === null) {
            throw $this->createNotFoundException('Message introuvable.');
        }

        // Marque comme lu à l'ouverture
        if (!$message->getIsRead()) {
            $message->setIsRead(true);
            $this->em->flush();
        }

        return $this->render('admin/message/show.html.twig', [
            'message' => $message,
            'typeLabels' => self::TYPES,
        ]);
    }

    /**
     * @Route("/{id}/reply", name="reply", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function reply(Request $request, int $id): Response
    {
        $message = $this->messages->find($id);
        if ($message === null) {
            throw $this->createNotFoundException('Message introuvable.');
        }

        if (!$this->isCsrfTokenValid('admin_message_reply_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_message_show', ['id' => $id]);
        }

        $subject = trim((string) $request->request->get('subject'));
        $body = trim((string) $request->request->get('body'));

        if ($subject === '' || $body === '') {
            $this->addFlash('error', 'Le sujet et le message sont obligatoires.');
            return $this->redirectToRoute('admin_message_show', ['id' => $id]);
        }

        if ($message->getEmail() === '' || $message->getEmail() === 'n/a' || !filter_var($message->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $this->addFlash('error', "Impossible d'envoyer : cet enregistrement n'a pas d'adresse email valide.");
            return $this->redirectToRoute('admin_message_show', ['id' => $id]);
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->Port       = 587;
            $mail->SMTPAuth   = true;
            $mail->Username   = 'takamuramhatli@gmail.com';
            $mail->Password   = 'iiwb djvx ctpd ooej';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->setFrom('noreply@baroudeursdedesert.com', 'Baroudeurs du Désert');
            $mail->addAddress($message->getEmail(), $message->getName());
            $mail->addReplyTo('contact@baroudeursdedesert.com', 'Baroudeurs du Désert');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = "
            <html>
            <body style='font-family: Arial, sans-serif; color: #333;'>
                <div style='max-width:600px;margin:0 auto;padding:20px;background:#f9f6f0;border-radius:10px;'>
                    <div style='background:#3B281C;color:#fff;padding:20px;text-align:center;border-radius:10px 10px 0 0;'>
                        <h2 style='margin:0;'>Baroudeurs du Désert</h2>
                    </div>
                    <div style='padding:30px;background:#fff;border-radius:0 0 10px 10px;'>
                        " . nl2br(htmlspecialchars($body)) . "
                        <hr style='margin:30px 0;'>
                        <p style='color:#6b6b6b;font-size:12px;'>Réponse à votre message envoyé le " . $message->getCreatedAt()->format('d/m/Y à H:i') . ".</p>
                    </div>
                    <div style='text-align:center;margin-top:20px;color:#C8A97E;font-size:12px;'>
                        &copy; " . date('Y') . " Baroudeurs du Désert - Tous droits réservés
                    </div>
                </div>
            </body>
            </html>
            ";
            $mail->AltBody = $body;

            $mail->send();
            $this->addFlash('success', sprintf('Réponse envoyée à %s.', $message->getEmail()));
        } catch (PHPMailerException $e) {
            $this->addFlash('error', "L'email n'a pas pu être envoyé : {$mail->ErrorInfo}");
        }

        return $this->redirectToRoute('admin_message_show', ['id' => $id]);
    }

    /**
     * @Route("/{id}/toggle-read", name="toggle_read", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function toggleRead(Request $request, int $id): Response
    {
        $message = $this->messages->find($id);
        if ($message === null) {
            throw $this->createNotFoundException('Message introuvable.');
        }

        if (!$this->isCsrfTokenValid('admin_message_toggle_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_message_index');
        }

        $message->setIsRead(!$message->getIsRead());
        $this->em->flush();

        $this->addFlash('success', $message->getIsRead() ? 'Marqué comme lu.' : 'Marqué comme non lu.');

        return $this->redirectToRoute('admin_message_show', ['id' => $id]);
    }

    /**
     * @Route("/{id}/delete", name="delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, int $id): Response
    {
        $message = $this->messages->find($id);
        if ($message === null) {
            throw $this->createNotFoundException('Message introuvable.');
        }

        if (!$this->isCsrfTokenValid('admin_message_delete_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_message_index');
        }

        $this->em->remove($message);
        $this->em->flush();

        $this->addFlash('success', 'Message supprimé.');

        return $this->redirectToRoute('admin_message_index');
    }
}
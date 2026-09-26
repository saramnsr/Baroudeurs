<?php

namespace App\Controller\Admin;

use App\Repository\NewsletterRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Envoi d'un email à tous les abonnés de la newsletter.
 *
 * @Route("/admin/newsletter", name="admin_newsletter_")
 * @IsGranted("ROLE_ADMIN")
 */
class NewsletterController extends AbstractController
{
    public function __construct(
        private NewsletterRepository $newsletterRepository,
    ) {}

    /**
     * @Route("", name="compose", methods={"GET"})
     */
    public function compose(): Response
    {
        $subscribers = $this->newsletterRepository->createQueryBuilder('n')
            ->orderBy('n.subscribedAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/newsletter/compose.html.twig', [
            'subscribers' => $subscribers,
            'subscriberCount' => count($subscribers),
        ]);
    }

    /**
     * @Route("/send", name="send", methods={"POST"})
     */
    public function send(Request $request): Response
    {
        // Envoi potentiellement long si beaucoup d'abonnés
        set_time_limit(0);
        ini_set('memory_limit', '512M');

        if (!$this->isCsrfTokenValid('admin_newsletter_send', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_newsletter_compose');
        }

        $subject = trim((string) $request->request->get('subject'));
        $body = trim((string) $request->request->get('body'));

        if ($subject === '' || $body === '') {
            $this->addFlash('error', 'Le sujet et le message sont obligatoires.');
            return $this->redirectToRoute('admin_newsletter_compose');
        }

        // Récupère tous les abonnés actifs
        $subscribers = $this->newsletterRepository->createQueryBuilder('n')
            ->where('n.isActive = :active')
            ->setParameter('active', true)
            ->getQuery()
            ->getResult();

        if (empty($subscribers)) {
            $this->addFlash('warning', 'Aucun abonné actif à qui envoyer.');
            return $this->redirectToRoute('admin_newsletter_compose');
        }

        $sent = 0;
        $failed = 0;

        foreach ($subscribers as $subscriber) {
            $email = $subscriber->getEmail();
            if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $failed++;
                continue;
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
                $mail->addAddress($email);

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
                        </div>
                        <div style='text-align:center;margin-top:20px;color:#C8A97E;font-size:12px;'>
                            &copy; " . date('Y') . " Baroudeurs du Désert - Tous droits réservés<br>
                            Vous recevez cet email car vous êtes inscrit à notre newsletter.
                        </div>
                    </div>
                </body>
                </html>
                ";
                $mail->AltBody = $body;

                $mail->send();
                $sent++;
            } catch (PHPMailerException $e) {
                $failed++;
            }

            // Petite pause pour ne pas se faire bloquer par Gmail
            usleep(200000); // 0.2s
        }

        $message = sprintf('Email envoyé à %d abonné%s.', $sent, $sent > 1 ? 's' : '');
        if ($failed > 0) {
            $message .= sprintf(' %d échec%s.', $failed, $failed > 1 ? 's' : '');
        }

        $this->addFlash($failed === 0 ? 'success' : 'warning', $message);

        return $this->redirectToRoute('admin_newsletter_compose');
    }
}
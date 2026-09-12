<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProgrammeRepository;
use App\Repository\TestimonialRepository;
use App\Repository\QuoteRepository;
use App\Repository\CircuitRepository;
use App\Repository\ExcursionRepository;
use App\Entity\Testimonial;
use App\Entity\Quote;
use Doctrine\ORM\EntityManagerInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Entity\Newsletter;

class FontController extends AbstractController
{
    private ProgrammeRepository $programmeRepository;
    private TestimonialRepository $testimonialRepository;
    private QuoteRepository $quoteRepository;
    private CircuitRepository $circuitRepository;
    private ExcursionRepository $excursionRepository;

    public function __construct(
        ProgrammeRepository $programmeRepository, 
        TestimonialRepository $testimonialRepository,
        QuoteRepository $quoteRepository,
        CircuitRepository $circuitRepository,
        ExcursionRepository $excursionRepository
    ) {
        $this->programmeRepository = $programmeRepository;
        $this->testimonialRepository = $testimonialRepository;
        $this->quoteRepository = $quoteRepository;
        $this->circuitRepository = $circuitRepository;
        $this->excursionRepository = $excursionRepository;
    }

    /**
     * @Route("/", name="app_font_index")
     */
    public function index(): Response
    {
        $programmes = $this->programmeRepository->findAll();
        $featuredProgrammes = $this->programmeRepository->findFeatured(5);

        // Featured excursions on the homepage must come from the real
        // Excursion entity (same table used by /excursions and the detail
        // page), not from Programme — otherwise the ids won't resolve
        // in FontController::detail().
        $featuredExcursions = array_slice($this->excursionRepository->findAllOrdered(), 0, 5);

        return $this->render('font/index.html.twig', [
            'programmes' => $programmes,
            'featuredProgrammes' => $featuredProgrammes,
            'featuredExcursions' => $featuredExcursions,
        ]);
    }

    /**
     * @Route("/contact", name="app_font_contact")
     */
    public function contact(): Response
    {
        return $this->render('font/contact.html.twig');
    }

    /**
     * @Route("/programmes", name="programmes")
     */
    public function programmes(Request $request): Response
    {
        $destination = $request->query->get('destination');
        $duration = $request->query->get('duration');
        $type = $request->query->get('type');

        $programmes = $this->programmeRepository->findByFilters($destination, $duration, $type);

        return $this->render('font/programmes.html.twig', [
            'programmes' => $programmes,
            'currentDestination' => $destination,
            'currentDuration' => $duration,
            'currentType' => $type,
        ]);
    }

    /**
     * @Route("/change-language/{locale}", name="change_language")
     */
    public function changeLanguage(string $locale, Request $request): Response
    {
        $request->getSession()->set('_locale', $locale);

        return $this->redirectToRoute('app_font_index');
    }

    /**
     * @Route("/gallery", name="app_font_gallery")
     */
    public function gallery(): Response
    {
        return $this->render('font/gallery.html.twig');
    }

    /**
     * @Route("/programme/{id}", name="programme_detail")
     */
    public function programmeDetail(int $id): Response
    {
        $programme = $this->programmeRepository->find($id);

        if (!$programme) {
            throw $this->createNotFoundException('Programme not found');
        }

        return $this->render('font/programme_detail.html.twig', [
            'programme' => $programme,
        ]);
    }

    /**
     * @Route("/testimonials", name="testimonials")
     */
    public function testimonials(): Response
    {
        $testimonials = $this->testimonialRepository->findAll();
        $randomImages = ['author-thumb-1.jpg', 'author-thumb-2.jpg', 'testimonial-1.jpg', 'thumb-1.jpg'];
        
        return $this->render('font/testimonials.html.twig', [
            'testimonials' => $testimonials,
            'randomImages' => $randomImages,
        ]);
    }

    /**
     * @Route("/testimonial/submit", name="app_testimonial_submit", methods={"POST"})
     */
    public function submitTestimonial(Request $request, EntityManagerInterface $em): Response
    {
        $name = $request->request->get('name');
        $country = $request->request->get('country');
        $rating = $request->request->get('rating');
        $message = $request->request->get('message');
        
        if (empty($name) || empty($country) || empty($rating) || empty($message)) {
            $this->addFlash('error', 'Please fill in all required fields.');
            return $this->redirectToRoute('testimonials');
        }
        
        $testimonial = new Testimonial();
        $testimonial->setName($name);
        $testimonial->setCountry($country);
        $testimonial->setRating((int)$rating);
        $testimonial->setVideoFilename(null);
        
        $locale = $request->getLocale();
        
        $testimonial->setCommentFr(null);
        $testimonial->setCommentEn(null);
        $testimonial->setCommentAr(null);
        $testimonial->setCommentIt(null);
        
        switch($locale) {
            case 'fr':
                $testimonial->setCommentFr($message);
                break;
            case 'ar':
                $testimonial->setCommentAr($message);
                break;
            case 'it':
                $testimonial->setCommentIt($message);
                break;
            default:
                $testimonial->setCommentEn($message);
        }
        
        $em->persist($testimonial);
        $em->flush();
        
        $this->addFlash('success', 'Thank you for your testimonial! It has been submitted successfully.');
        
        return $this->redirectToRoute('testimonials');
    }

    /**
     * @Route("/quote", name="app_font_quote")
     */
    public function quote(Request $request): Response
    {
        $programmes = $this->programmeRepository->findAll();
        
        return $this->render('font/quote.html.twig', [
            'programmes' => $programmes,
        ]);
    }

    /**
     * @Route("/quote/submit", name="app_quote_submit", methods={"POST"})
     */
    public function submitQuote(Request $request, EntityManagerInterface $em): Response
    {
        $lastName = $request->request->get('lastName');
        $firstName = $request->request->get('firstName');
        $email = $request->request->get('email');
        $telephone = $request->request->get('telephone');
        $circuit = $request->request->get('circuit');
        $departureLocation = $request->request->get('departureLocation');
        $arrivalLocation = $request->request->get('arrivalLocation');
        $startDate = $request->request->get('startDate');
        $endDate = $request->request->get('endDate');
        $duration = $request->request->get('duration');
        $participants = $request->request->get('participants');
        $specificRequests = $request->request->get('specificRequests');
        
        if (empty($lastName) || empty($firstName) || empty($email) || empty($telephone)) {
            $this->addFlash('error', 'Please fill in all required fields.');
            return $this->redirectToRoute('app_font_quote');
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addFlash('error', 'Please enter a valid email address.');
            return $this->redirectToRoute('app_font_quote');
        }
        
        $quote = new Quote();
        $quote->setLastName($lastName);
        $quote->setFirstName($firstName);
        $quote->setEmail($email);
        $quote->setTelephone($telephone);
        $quote->setCircuit($circuit);
        $quote->setDepartureLocation($departureLocation);
        $quote->setArrivalLocation($arrivalLocation);
        
        if ($startDate) {
            $quote->setStartDate(new \DateTime($startDate));
        }
        if ($endDate) {
            $quote->setEndDate(new \DateTime($endDate));
        }
        
        $quote->setDuration($duration);
        $quote->setParticipants($participants);
        $quote->setSpecificRequests($specificRequests);
        $quote->setLocale($request->getLocale());
        
        $em->persist($quote);
        $em->flush();
        
        $this->addFlash('success', 'Your quote request has been sent successfully! We will contact you shortly.');
        
        return $this->redirectToRoute('app_font_quote');
    }

    /**
     * @Route("/about", name="app_font_about")
     */
    public function about(): Response
    {
        $galleryImages = [
            'Call Desert1.webp',
            'Call Desert2.jpg',
            'Call Desert3.jpg',
            'Call Desert4.jpg',
            'Circuit Douz1.jpg',
            'Circuit Douz2.jpg',
            'Desert Mirage 1.jpg',
            'Desert Mirage 2.jpg',
            'Desert Mirage 3.jpg',
            'Desert-Baroudeurs1.jpg',
            'Desert-Baroudeurs2.jpg',
            'Desert-Baroudeurs3.avif',
            'Desert-Baroudeurs4.jpg',
            'Desert-Charm1.jpg',
            'Desert-Charm2.jpg',
            'Desert-Charm3.jpg',
            'Desert-Charm4.jpg',
            'Desert-Rose2.jpg',
            'Desert-Rose3.jpg',
            'Endless Desert 1.webp',
            'Endless Desert 2.jpg',
            'Endless Desert 3.jpg',
            'Endless Desert 4.jpg',
            'Tataouine1.avif',
            'Tataouine3.jpg',
            'Tataouine4.jpg'
        ];
        
        $teamMembers = [
            [
                'name' => 'about_page.team.member1.name',
                'role' => 'about_page.team.member1.role',
                'description' => 'about_page.team.member1.description',
                'image' => 'team-1.jpg'
            ],
            [
                'name' => 'about_page.team.member2.name',
                'role' => 'about_page.team.member2.role',
                'description' => 'about_page.team.member2.description',
                'image' => 'team-2.jpg'
            ],
            [
                'name' => 'about_page.team.member3.name',
                'role' => 'about_page.team.member3.role',
                'description' => 'about_page.team.member3.description',
                'image' => 'team-3.jpg'
            ],
            [
                'name' => 'about_page.team.member4.name',
                'role' => 'about_page.team.member4.role',
                'description' => 'about_page.team.member4.description',
                'image' => 'team-4.jpg'
            ]
        ];
        
        return $this->render('font/about.html.twig', [
            'galleryImages' => $galleryImages,
            'teamMembers' => $teamMembers,
        ]);
    }

    /**
     * @Route("/blog", name="app_font_blog")
     */
    public function blog(): Response
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'blog_page.article1.title',
                'excerpt' => 'blog_page.article1.excerpt',
                'content1' => 'blog_page.article1.content1',
                'content2' => 'blog_page.article1.content2',
                'image' => 'assets/images/service/details/Desert-Baroudeurs1.jpg',
                'author' => 'Ahmed Ben Ali',
                'date' => '2024-01-15',
                'circuit_link' => 'programmes',
            ],
            [
                'id' => 2,
                'title' => 'blog_page.article2.title',
                'excerpt' => 'blog_page.article2.excerpt',
                'content1' => 'blog_page.article2.content1',
                'content2' => 'blog_page.article2.content2',
                'image' => 'assets/images/service/details/Tataouine1.avif',
                'author' => 'Mohamed El Khadra',
                'date' => '2024-02-10',
                'circuit_link' => 'programmes',
            ],
            [
                'id' => 3,
                'title' => 'blog_page.article3.title',
                'excerpt' => 'blog_page.article3.excerpt',
                'content1' => 'blog_page.article3.content1',
                'content2' => 'blog_page.article3.content2',
                'image' => 'assets/images/service/details/Desert-Charm1.jpg',
                'author' => 'Laila Ben Amor',
                'date' => '2024-03-05',
                'circuit_link' => 'programmes',
            ],
        ];

        return $this->render('font/blog.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/book-adventure/submit", name="app_book_adventure_submit", methods={"POST"})
     */
    public function submitBookAdventure(Request $request): Response
    {
        $destination = $request->request->get('destination');
        $programmeId = $request->request->get('programme');
        $date = $request->request->get('date');
        $guests = $request->request->get('guests');

        if (empty($destination) || empty($programmeId) || empty($date) || empty($guests)) {
            $this->addFlash('error', 'Please fill in all required fields.');
            return $this->redirectToRoute('app_font_index');
        }

        $programmeTitle = 'N/A';
        $programme = $this->programmeRepository->find($programmeId);
        if ($programme) {
            $locale = $request->getLocale();
            switch ($locale) {
                case 'fr':
                    $programmeTitle = $programme->getTitleFr();
                    break;
                case 'ar':
                    $programmeTitle = $programme->getTitleAr();
                    break;
                case 'it':
                    $programmeTitle = $programme->getTitleIt();
                    break;
                default:
                    $programmeTitle = $programme->getTitleEn();
            }
        }

        $mail = new PHPMailer(true);

        try {
            // Gmail SMTP settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->Port       = 587;
            $mail->SMTPAuth   = true;
            $mail->Username   = 'takamuramhatli@gmail.com';     // ← YOUR Gmail
            $mail->Password   = 'iiwb djvx ctpd ooej';       // ← YOUR App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->setFrom('noreply@baroudeursdedesert.com', 'Baroudeurs du Désert');
            $mail->addAddress('contact@baroudeursdedesert.com');      // ← Company email

            $mail->isHTML(false);
            $mail->Subject = 'New Booking Request - Baroudeurs du Désert';
            $mail->Body    = "
            =====================================
            NEW BOOKING REQUEST
            =====================================

            Destination: {$destination}
            Programme: {$programmeTitle}
            Date: {$date}
            Number of Guests: {$guests}

            -------------------------------------
            Submitted from: Website Booking Form
            Date Submitted: " . date('Y-m-d H:i:s') . "
            =====================================
            ";

            $mail->send();
            $this->addFlash('success', 'Your booking request has been sent successfully! We will contact you shortly.');
        } catch (Exception $e) {
            $this->addFlash('error', "Message could not be sent. Error: {$mail->ErrorInfo}");
        }

        return $this->redirectToRoute('app_font_index');
    }
  /**
 * @Route("/newsletter/subscribe", name="app_newsletter_subscribe", methods={"POST"})
 */
public function subscribeNewsletter(Request $request, EntityManagerInterface $em): Response
{
    $email = $request->request->get('email');
    
    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->addFlash('error', 'Please enter a valid email address.');
        return $this->redirectToRoute('app_font_index');
    }
    
    // Check if email already exists
    $existing = $em->getRepository(Newsletter::class)->findOneBy(['email' => $email]);
    
    if ($existing) {
        $this->addFlash('warning', 'This email is already subscribed to our newsletter.');
        return $this->redirectToRoute('app_font_index');
    }
    
    // Create new subscription
    $newsletter = new Newsletter();
    $newsletter->setEmail($email);
    $newsletter->setSubscribedAt(new \DateTime());
    $newsletter->setIsActive(true);
    
    $em->persist($newsletter);
    $em->flush();
    
    $this->addFlash('success', 'Thank you for subscribing to our newsletter!');
    
    return $this->redirectToRoute('app_font_index');
}

/**
 * @Route("/contact/submit", name="app_contact_submit", methods={"POST"})
 */
public function submitContact(Request $request): Response
{
    $name = $request->request->get('name');
    $email = $request->request->get('email');
    $message = $request->request->get('message');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        $this->addFlash('error', 'Please fill in all required fields.');
        return $this->redirectToRoute('app_font_contact');
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->addFlash('error', 'Please enter a valid email address.');
        return $this->redirectToRoute('app_font_contact');
    }
    
    $mail = new PHPMailer(true);
    
    try {
        // Gmail SMTP settings (YOUR Gmail)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 587;
        $mail->SMTPAuth   = true;
        $mail->Username   = 'takamuramhatli@gmail.com';     // ← YOUR Gmail
        $mail->Password   = 'iiwb djvx ctpd ooej';       // ← YOUR App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        
        // Sender and Recipient
        $mail->setFrom('noreply@baroudeursdedesert.com', 'Baroudeurs du Désert');
        $mail->addAddress('contact@baroudeursdedesert.com'); // ← Company email
        
        // Reply to the person who filled the form
        $mail->addReplyTo($email, $name);
        
        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Message - Baroudeurs du Désert';
        $mail->Body    = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f6f0; border-radius: 10px; }
                .header { background: #3B281C; color: #fff; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { padding: 30px; background: #fff; border-radius: 0 0 10px 10px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #3B281C; }
                .value { color: #5B4636; }
                .footer { text-align: center; margin-top: 20px; color: #C8A97E; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>📩 New Contact Message</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <div class='label'>Name:</div>
                        <div class='value'>" . htmlspecialchars($name) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>Email:</div>
                        <div class='value'>" . htmlspecialchars($email) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>Message:</div>
                        <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                    </div>
                    <hr>
                    <p style='color: #5B4636; font-size: 14px;'>This message was sent from the contact form on your website.</p>
                </div>
                <div class='footer'>
                    &copy; " . date('Y') . " Baroudeurs du Désert - All Rights Reserved
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Plain text version for email clients that don't support HTML
        $mail->AltBody = "
        New Contact Message
        ===================
        Name: {$name}
        Email: {$email}
        Message: {$message}
        ===================
        This message was sent from the contact form on your website.
        ";
        
        $mail->send();
        $this->addFlash('success', 'Your message has been sent successfully! We will contact you shortly.');
        
    } catch (Exception $e) {
        $this->addFlash('error', "Message could not be sent. Error: {$mail->ErrorInfo}");
    }
    
    return $this->redirectToRoute('app_font_contact');
}

/**
 * @Route("/circuits", name="app_font_circuits")
 */
public function circuits(): Response
{
    $circuits = $this->circuitRepository->findAllOrdered();
    $programmes = $this->programmeRepository->findAll();

    return $this->render('font/circuits.html.twig', [
        'circuits' => $circuits,
        'programmes' => $programmes,
    ]);
}

/**
 * @Route("/excursions", name="app_font_excursions")
 */
public function excursions(): Response
{
    $excursions = $this->excursionRepository->findAllOrdered();

    return $this->render('font/excursions.html.twig', [
        'excursions' => $excursions,
    ]);
}



/**
 * @Route("/detail/{type}/{id}", name="app_font_detail", requirements={"type"="circuit|excursion", "id"="\d+"})
 */
public function detail(string $type, int $id): Response
{
    if ($type === 'circuit') {
        $item = $this->circuitRepository->find($id);
        $related = $this->circuitRepository->findAllOrdered();
    } else {
        $item = $this->excursionRepository->find($id);
        $related = $this->excursionRepository->findAllOrdered();
    }

    if (!$item) {
        throw $this->createNotFoundException('Item not found');
    }

    return $this->render('font/detail.html.twig', [
        'type' => $type,
        'item' => $item,
        'circuits' => $related,
    ]);
}



/**
 * @Route("/circuit/booking/submit", name="app_circuit_booking_submit", methods={"POST"})
 */
public function submitCircuitBooking(Request $request): Response
{
    $checkIn = $request->request->get('checkIn');
    $checkOut = $request->request->get('checkOut');
    $guests = $request->request->get('guests');
    $circuitId = $request->request->get('circuitId');
    $circuitTitle = $request->request->get('circuitTitle');
    $name = $request->request->get('name');
    $email = $request->request->get('email');

    if (empty($checkIn) || empty($checkOut) || empty($guests) || empty($name) || empty($email)) {
        $this->addFlash('error', 'Please fill in all required fields.');
        return $this->redirectToRoute('app_font_detail', ['type' => 'circuit', 'id' => $circuitId]);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->addFlash('error', 'Please enter a valid email address.');
        return $this->redirectToRoute('app_font_detail', ['type' => 'circuit', 'id' => $circuitId]);
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
        $mail->addAddress('contact@baroudeursdedesert.com');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = 'New Circuit Booking Request - ' . $circuitTitle;
        $mail->Body    = "
        =====================================
        NEW CIRCUIT BOOKING REQUEST
        =====================================

        Circuit: {$circuitTitle}
        Name: {$name}
        Email: {$email}
        Check-in: {$checkIn}
        Check-out: {$checkOut}
        Guests: {$guests}

        -------------------------------------
        Submitted from: Circuit Detail Page
        Date Submitted: " . date('Y-m-d H:i:s') . "
        =====================================
        ";

        $mail->send();
        $this->addFlash('success', 'Your booking request has been sent successfully! We will contact you shortly.');
    } catch (Exception $e) {
        $this->addFlash('error', "Message could not be sent. Error: {$mail->ErrorInfo}");
    }

    return $this->redirectToRoute('app_font_detail', ['type' => 'circuit', 'id' => $circuitId]);
}


/**
 * @Route("/services", name="app_font_services")
 */
public function services(): Response
{
    return $this->render('font/services.html.twig');
}
}
<?php

namespace App\DataFixtures;

use App\Entity\Testimonial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestimonialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $testimonials = [
            [
                'name' => 'Emily Johnson',
                'country' => 'United Kingdom',
                'rating' => 5,
                'videoFilename' => null,
                'commentFr' => "Une expérience inoubliable ! La balade à dos de dromadaire, le bivouac sous les étoiles et l'accueil des guides étaient exceptionnels. On se sentait vraiment en sécurité tout en vivant quelque chose d'authentique.",
                'commentEn' => "An unforgettable experience! The camel ride, the bivouac under the stars, and the guides' hospitality were outstanding. We felt completely safe while living something truly authentic.",
                'commentAr' => "تجربة لا تُنسى! ركوب الجمل، والمبيت تحت النجوم، وحسن ضيافة المرشدين كانت رائعة جدًا. شعرنا بالأمان الكامل بينما نعيش تجربة أصيلة حقًا.",
                'commentIt' => "Un'esperienza indimenticabile! Il giro in cammello, il bivacco sotto le stelle e l'ospitalità delle guide sono stati eccezionali. Ci siamo sentiti al sicuro vivendo qualcosa di davvero autentico.",
            ],
            [
                'name' => 'Marco Rossi',
                'country' => 'Italy',
                'rating' => 5,
                'videoFilename' => null,
                'commentFr' => "Tout était parfaitement organisé, du transfert à l'aéroport jusqu'au dernier repas. Le coucher de soleil sur les dunes de Ksar Ghilane restera gravé dans ma mémoire.",
                'commentEn' => "Everything was perfectly organized, from the airport transfer to the last meal. The sunset over the dunes of Ksar Ghilane will stay with me forever.",
                'commentAr' => "كان كل شيء منظمًا بإتقان، من النقل من المطار إلى آخر وجبة. غروب الشمس فوق كثبان قصر غيلان سيبقى محفورًا في ذاكرتي.",
                'commentIt' => "Tutto era organizzato alla perfezione, dal trasferimento in aeroporto fino all'ultimo pasto. Il tramonto sulle dune di Ksar Ghilane resterà per sempre nella mia memoria.",
            ],
            [
                'name' => 'Sophie Lefèvre',
                'country' => 'France',
                'rating' => 5,
                'videoFilename' => null,
                'commentFr' => "Le circuit Rose de Sables a dépassé toutes nos attentes. Nos chameliers étaient passionnés et nous ont fait découvrir des lieux que nous n'aurions jamais trouvés seuls. À refaire sans hésiter !",
                'commentEn' => "The Desert Rose circuit exceeded all our expectations. Our camel drivers were passionate and showed us places we never would have found on our own. We'd do it again without hesitation!",
                'commentAr' => "تجاوزت جولة وردة الرمال كل توقعاتنا. كان الجمّالة شغوفين وأرونا أماكن لم نكن لنجدها بأنفسنا أبدًا. سنكررها دون تردد!",
                'commentIt' => "Il circuito Rosa del Deserto ha superato tutte le nostre aspettative. I nostri cammellieri erano appassionati e ci hanno mostrato luoghi che non avremmo mai trovato da soli. Lo rifaremmo senza esitazione!",
            ],
            [
                'name' => 'Hans Müller',
                'country' => 'Germany',
                'rating' => 4,
                'videoFilename' => null,
                'commentFr' => "Très bon rapport qualité-prix pour un circuit privé. Les repas bédouins étaient délicieux et les paysages à couper le souffle. Seul bémol : la piste était un peu longue le dernier jour.",
                'commentEn' => "Very good value for a private tour. The bedouin meals were delicious and the landscapes breathtaking. Only downside: the track was a bit long on the last day.",
                'commentAr' => "قيمة ممتازة مقابل السعر لجولة خاصة. كانت الوجبات البدوية لذيذة والمناظر خلابة. العيب الوحيد: كانت المسالك طويلة بعض الشيء في اليوم الأخير.",
                'commentIt' => "Ottimo rapporto qualità-prezzo per un tour privato. I pasti beduini erano deliziosi e i paesaggi mozzafiato. Unico neo: la pista era un po' lunga l'ultimo giorno.",
            ],
            [
                'name' => 'Amina Ben Salah',
                'country' => 'Tunisia',
                'rating' => 5,
                'videoFilename' => null,
                'commentFr' => "En tant que Tunisienne, je pensais tout connaître de mon pays, mais ce circuit m'a fait redécouvrir le Sud sous un autre angle. Les guides connaissent chaque recoin du désert par cœur.",
                'commentEn' => "As a Tunisian, I thought I knew everything about my country, but this tour made me rediscover the South from a whole new angle. The guides know every corner of the desert by heart.",
                'commentAr' => "كتونسية، كنت أظن أنني أعرف كل شيء عن بلدي، لكن هذه الجولة جعلتني أعيد اكتشاف الجنوب من زاوية جديدة تمامًا. المرشدون يعرفون كل ركن من أركان الصحراء عن ظهر قلب.",
                'commentIt' => "Da tunisina, pensavo di conoscere già tutto del mio paese, ma questo tour mi ha fatto riscoprire il Sud da un'angolazione completamente nuova. Le guide conoscono ogni angolo del deserto a memoria.",
            ],
            [
                'name' => 'David Chen',
                'country' => 'Canada',
                'rating' => 5,
                'videoFilename' => null,
                'commentFr' => "Le circuit 4x4 vers Tembaïne était une aventure pure. Aucun autre touriste en vue pendant des heures, juste le silence du désert et notre petit groupe. Exactement ce qu'on cherchait.",
                'commentEn' => "The 4x4 circuit to Tembaïne was pure adventure. No other tourists in sight for hours, just the silence of the desert and our small group. Exactly what we were looking for.",
                'commentAr' => "كانت جولة الدفع الرباعي نحو تمباين مغامرة خالصة. لم نر سائحًا آخر لساعات، فقط صمت الصحراء ومجموعتنا الصغيرة. بالضبط ما كنا نبحث عنه.",
                'commentIt' => "Il circuito in 4x4 verso Tembaïne è stata pura avventura. Nessun altro turista in vista per ore, solo il silenzio del deserto e il nostro piccolo gruppo. Esattamente ciò che cercavamo.",
            ],
            [
                'name' => 'Laura Martínez',
                'country' => 'Spain',
                'rating' => 5,
                'videoFilename' => 'desert-4x4-tour.mp4',
                'commentFr' => "J'ai filmé une partie de notre excursion, vous pouvez voir par vous-mêmes à quel point le désert tunisien est magique. Une équipe professionnelle et chaleureuse du début à la fin.",
                'commentEn' => "I filmed part of our excursion, you can see for yourselves how magical the Tunisian desert is. A professional and warm team from start to finish.",
                'commentAr' => "صورت جزءًا من رحلتنا، يمكنكم أن تروا بأنفسكم مدى سحر الصحراء التونسية. فريق محترف ودافئ من البداية إلى النهاية.",
                'commentIt' => "Ho filmato parte della nostra escursione, potete vedere con i vostri occhi quanto sia magico il deserto tunisino. Un team professionale e caloroso dall'inizio alla fine.",
            ],
        ];

        foreach ($testimonials as $data) {
            $testimonial = new Testimonial();
            $testimonial->setName($data['name']);
            $testimonial->setCountry($data['country']);
            $testimonial->setRating($data['rating']);
            $testimonial->setVideoFilename($data['videoFilename']);
            $testimonial->setCommentFr($data['commentFr']);
            $testimonial->setCommentEn($data['commentEn']);
            $testimonial->setCommentAr($data['commentAr']);
            $testimonial->setCommentIt($data['commentIt']);

            $manager->persist($testimonial);
        }

        $manager->flush();
    }
}
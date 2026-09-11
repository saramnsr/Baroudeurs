<?php

namespace App\DataFixtures;

use App\Entity\Excursion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExcursionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ============ EXCURSION 1: Appel du Désert ============
        $e1 = new Excursion();
        $e1->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1789040783/baroudeurs/excursions/kuw674phwztv921qnwzv.jpg');
        $e1->setTitleFr('Appel du Désert');
        $e1->setTitleEn('Call of the Desert');
        $e1->setTitleAr('نداء الصحراء');
        $e1->setTitleIt('Richiamo del Deserto');
        $e1->setDescriptionFr("Une immersion de 3 jours dans les dunes dorées, de Benwia à Leegtaaya, à dos de dromadaire. Nuits sous tente bédouine, couchers et levers de soleil sur le désert, et dîners traditionnels au coin du feu.");
        $e1->setDescriptionEn("A 3-day immersion in golden dunes, from Benwia to Leegtaaya, by camel. Nights under a Bedouin tent, desert sunrises and sunsets, and traditional campfire dinners.");
        $e1->setDescriptionAr("انغماس لمدة 3 أيام في الكثبان الذهبية، من بنويا إلى ليقطاية، على ظهر الجمل. ليالٍ تحت خيمة بدوية، وشروق وغروب الشمس في الصحراء، وعشاءات تقليدية حول النار.");
        $e1->setDescriptionIt("Un'immersione di 3 giorni tra le dune dorate, da Benwia a Leegtaaya, in dromedario. Notti sotto la tenda beduina, albe e tramonti nel deserto, e cene tradizionali intorno al fuoco.");
        $e1->setDurationFr('3 jours / 2 nuits');
        $e1->setDurationEn('3 days / 2 nights');
        $e1->setDurationAr('3 أيام / ليلتان');
        $e1->setDurationIt('3 giorni / 2 notti');
        $e1->setIcons(['fas fa-campground', 'fas fa-fire', 'fas fa-moon', 'fas fa-utensils']);
        $e1->setIncludedFr(['Pension complète durant toute l\'escapade', 'Hébergement en bivouac sous tente bédouine', 'Repas typiques préparés par les bédouins']);
        $e1->setIncludedEn(['Full board throughout the trip', 'Bedouin tent bivouac accommodation', 'Traditional meals prepared by the Bedouins']);
        $e1->setIncludedAr(['إقامة كاملة طوال الرحلة', 'الإقامة في مخيم تحت خيمة بدوية', 'وجبات تقليدية يعدها البدو']);
        $e1->setIncludedIt(['Pensione completa durante tutto il viaggio', 'Alloggio in bivacco sotto tenda beduina', 'Pasti tradizionali preparati dai beduini']);
        $e1->setPosition(1);
        $manager->persist($e1);

        // ============ EXCURSION 2: Baroudeurs de Désert 15 Jours ============
        $e2 = new Excursion();
        $e2->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788609904/baroudeurs/service/details/Temba%C3%AFne/6.jpg');
        $e2->setTitleFr('Baroudeurs de Désert - 15 Jours');
        $e2->setTitleEn('Desert Baroudeurs - 15 Days');
        $e2->setTitleAr('بارودور الصحراء - 15 يومًا');
        $e2->setTitleIt('Baroudeurs del Deserto - 15 Giorni');
        $e2->setDescriptionFr("Une grande traversée de 15 jours à dos de dromadaire, de Bir Abdallah à El Mellaha, à travers dunes, montagnes de sable et puits isolés. Une aventure humaine et spirituelle loin de toute civilisation.");
        $e2->setDescriptionEn("A great 15-day camel crossing, from Bir Abdallah to El Mellaha, through dunes, sand mountains, and remote wells. A human and spiritual adventure far from civilization.");
        $e2->setDescriptionAr("عبور كبير لمدة 15 يومًا على ظهر الجمل، من بئر عبد الله إلى الملاحة، عبر الكثبان وجبال الرمل والآبار النائية. مغامرة إنسانية وروحية بعيدًا عن الحضارة.");
        $e2->setDescriptionIt("Un grande attraversamento di 15 giorni in dromedario, da Bir Abdallah a El Mellaha, tra dune, montagne di sabbia e pozzi remoti. Un'avventura umana e spirituale lontano dalla civiltà.");
        $e2->setDurationFr('15 jours / 14 nuits');
        $e2->setDurationEn('15 days / 14 nights');
        $e2->setDurationAr('15 يومًا / 14 ليلة');
        $e2->setDurationIt('15 giorni / 14 notti');
        $e2->setIcons(['fas fa-campground', 'fas fa-mountain', 'fas fa-moon', 'fas fa-fire']);
        $e2->setIncludedFr(['Pension complète tout au long du séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners typiques préparés par des bédouins', 'Transports et assistance durant tout le séjour']);
        $e2->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional dinners prepared by the Bedouins', 'Transport and assistance throughout the stay']);
        $e2->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات تقليدية يعدها البدو', 'النقل والمساعدة طوال فترة الإقامة']);
        $e2->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene tradizionali preparate dai beduini', 'Trasporti e assistenza per tutto il soggiorno']);
        $e2->setPosition(2);
        $manager->persist($e2);

        // ============ EXCURSION 3: Charme du Désert 2 Jours ============
        $e3 = new Excursion();
        $e3->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788607644/baroudeurs/service/details/Endless/3.jpg');
        $e3->setTitleFr('Charme du Désert - 2 Jours');
        $e3->setTitleEn('Desert Charm - 2 Days');
        $e3->setTitleAr('سحر الصحراء - يومان');
        $e3->setTitleIt('Fascino del Deserto - 2 Giorni');
        $e3->setDescriptionFr("Une escapade courte et magique de Douz à Dhirat Aicha, avec un lever de soleil spectaculaire sur les dunes. Nuit sous tente bédouine et dîner traditionnel autour du feu.");
        $e3->setDescriptionEn("A short, magical getaway from Douz to Dhirat Aicha, with a spectacular sunrise over the dunes. Night under a Bedouin tent and traditional campfire dinner.");
        $e3->setDescriptionAr("رحلة قصيرة وساحرة من دوز إلى ذراع عيشة، مع شروق شمس رائع فوق الكثبان. ليلة تحت خيمة بدوية وعشاء تقليدي حول النار.");
        $e3->setDescriptionIt("Una fuga breve e magica da Douz a Dhirat Aicha, con un'alba spettacolare sulle dune. Notte sotto la tenda beduina e cena tradizionale intorno al fuoco.");
        $e3->setDurationFr('2 jours / 1 nuit');
        $e3->setDurationEn('2 days / 1 night');
        $e3->setDurationAr('يومان / ليلة واحدة');
        $e3->setDurationIt('2 giorni / 1 notte');
        $e3->setIcons(['fas fa-campground', 'fas fa-sun', 'fas fa-fire', 'fas fa-utensils']);
        $e3->setIncludedFr(['Pension complète durant tout le séjour', 'Hébergement en bivouac sous tente bédouine', 'Repas typiques préparés par les bédouins']);
        $e3->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional meals prepared by the Bedouins']);
        $e3->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'وجبات تقليدية يعدها البدو']);
        $e3->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Pasti tradizionali preparati dai beduini']);
        $e3->setPosition(3);
        $manager->persist($e3);

        // ============ EXCURSION 4: Désert Infini 8 Jours ============
        $e4 = new Excursion();
        $e4->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788608071/baroudeurs/service/details/Charm/3.jpg');
        $e4->setTitleFr('Désert Infini - 8 Jours');
        $e4->setTitleEn('Endless Desert - 8 Days');
        $e4->setTitleAr('الصحراء اللانهائية - 8 أيام');
        $e4->setTitleIt('Deserto Infinito - 8 Giorni');
        $e4->setDescriptionFr("8 jours à dos de dromadaire de El Mellaha à Ksar Ghilane, entre dunes infinies et oasis mythique aux sources chaudes. Une immersion totale dans le silence et la beauté du Sahara.");
        $e4->setDescriptionEn("8 days by camel from El Mellaha to Ksar Ghilane, between endless dunes and the mythical hot-spring oasis. A total immersion in the silence and beauty of the Sahara.");
        $e4->setDescriptionAr("8 أيام على ظهر الجمل من الملاحة إلى قصر غيلان، بين الكثبان اللانهائية والواحة الأسطورية ذات الينابيع الحارة. انغماس كامل في صمت وجمال الصحراء الكبرى.");
        $e4->setDescriptionIt("8 giorni in dromedario da El Mellaha a Ksar Ghilane, tra dune infinite e l'oasi mitica dalle sorgenti termali. Un'immersione totale nel silenzio e nella bellezza del Sahara.");
        $e4->setDurationFr('8 jours / 7 nuits');
        $e4->setDurationEn('8 days / 7 nights');
        $e4->setDurationAr('8 أيام / 7 ليال');
        $e4->setDurationIt('8 giorni / 7 notti');
        $e4->setIcons(['fas fa-campground', 'fas fa-swimming-pool', 'fas fa-fire', 'fas fa-moon']);
        $e4->setIncludedFr(['Pension complète durant tout le séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners traditionnels préparés par des bédouins (chorba, couscous, etc.)', 'Transports et assistance tout au long du voyage']);
        $e4->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional dinners prepared by the Bedouins (chorba, couscous, etc.)', 'Transport and assistance throughout the trip']);
        $e4->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات تقليدية يعدها البدو (شوربة، كسكسي، إلخ)', 'النقل والمساعدة طوال الرحلة']);
        $e4->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene tradizionali preparate dai beduini (chorba, couscous, ecc.)', 'Trasporti e assistenza per tutto il viaggio']);
        $e4->setPosition(4);
        $manager->persist($e4);

        // ============ EXCURSION 5: Rose de Sables 8 Jours ============
      
        $e5 = new Excursion();
        $e5->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788609877/baroudeurs/service/details/Mirage/3.jpg');
        $e5->setTitleFr('Rose de Sables - 8 Jours');
        $e5->setTitleEn('Desert Rose - 8 Days');
        $e5->setTitleAr('وردة الرمال - 8 أيام');
        $e5->setTitleIt('Rosa del Deserto - 8 Giorni');
        $e5->setDescriptionFr("8 jours à la recherche des célèbres roses de sable, de El Bidha à El Khaltaya, à dos de dromadaire. Rencontres avec les chameliers et nuits sous tente bédouine au cœur du désert.");
        $e5->setDescriptionEn("8 days in search of the famous desert roses, from El Bidha to El Khaltaya, by camel. Encounters with camel guides and nights under a Bedouin tent deep in the desert.");
        $e5->setDescriptionAr("8 أيام بحثًا عن ورود الرمال الشهيرة، من البيضاء إلى الخلطية، على ظهر الجمل. لقاءات مع الجمالة وليالٍ تحت خيمة بدوية في قلب الصحراء.");
        $e5->setDescriptionIt("8 giorni alla ricerca delle famose rose del deserto, da El Bidha a El Khaltaya, in dromedario. Incontri con i cammellieri e notti sotto la tenda beduina nel cuore del deserto.");
        $e5->setDurationFr('8 jours / 7 nuits');
        $e5->setDurationEn('8 days / 7 nights');
        $e5->setDurationAr('8 أيام / 7 ليال');
        $e5->setDurationIt('8 giorni / 7 notti');
        $e5->setIcons(['fas fa-campground', 'fas fa-gem', 'fas fa-fire', 'fas fa-moon']);
        $e5->setIncludedFr(['Pension complète tout au long du séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners préparés par des bédouins, avec des plats traditionnels (chorba, couscous, etc.)', 'Transports et assistance tout au long du voyage']);
        $e5->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Dinners prepared by the Bedouins, with traditional dishes (chorba, couscous, etc.)', 'Transport and assistance throughout the trip']);
        $e5->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات يعدها البدو، بأطباق تقليدية (شوربة، كسكسي، إلخ)', 'النقل والمساعدة طوال الرحلة']);
        $e5->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene preparate dai beduini, con piatti tradizionali (chorba, couscous, ecc.)', 'Trasporti e assistenza per tutto il viaggio']);
        $e5->setPosition(5);
        $manager->persist($e5);

        $manager->flush();
    }
}
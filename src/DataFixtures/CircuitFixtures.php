<?php

namespace App\DataFixtures;

use App\Entity\Circuit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CircuitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ============ CIRCUIT 1: Circuit Désert 8 Jours ============
        $c1 = new Circuit();
        $c1->setImage('Circuits/circuit desert.jpg');
        $c1->setTitleFr('Circuit Désert 8 Jours - Douz à Tembaïne');
        $c1->setTitleEn('8-Day Desert Circuit - Douz to Tembaïne');
        $c1->setTitleAr('رحلة الصحراء 8 أيام - من دوز إلى تمباين');
        $c1->setTitleIt('Circuito nel Deserto 8 Giorni - Douz a Tembaïne');
        $c1->setDescriptionFr("Traversez des dunes infinies en 4x4, de Douz à Tembaïne, avec des nuits sous les étoiles. Baignez-vous dans la source chaude de Huidat Riched et découvrez l'oasis de Ksar Ghilane.");
        $c1->setDescriptionEn("Cross endless dunes by 4x4 from Douz to Tembaïne, camping under the stars. Bathe in the hot spring of Huidat Riched and discover the oasis of Ksar Ghilane.");
        $c1->setDescriptionAr("اعبر الكثبان اللامتناهية بسيارة الدفع الرباعي من دوز إلى تمباين، مع المبيت تحت النجوم. استحم في ينبوع هويدات ريشد الحار واكتشف واحة قصر غيلان.");
        $c1->setDescriptionIt("Attraversa dune infinite in 4x4, da Douz a Tembaïne, con notti sotto le stelle. Fai il bagno nella sorgente termale di Huidat Riched e scopri l'oasi di Ksar Ghilane.");
        $c1->setDurationFr('8 jours / 7 nuits');
        $c1->setDurationEn('8 days / 7 nights');
        $c1->setDurationAr('8 أيام / 7 ليال');
        $c1->setDurationIt('8 giorni / 7 notti');
        $c1->setIcons(['flaticon-van', 'flaticon-tent-1', 'flaticon-eat', 'flaticon-sea-waves']);
        $c1->setPosition(2);

        $c1->setIntroFr("Nous vous proposons à titre d'exemple ci-dessous un type de circuit et excursion 4x4 dans le désert. Lors de notre premier contact, nous pouvons vous donner le type de circuit le mieux adapté à vos besoins, allant d'une nuit jusqu'à 15 jours.");
        $c1->setIntroEn("As an example, we present below a type of 4x4 desert circuit and excursion. During our first contact, we can suggest the type of circuit best suited to your needs, ranging from one night up to 15 days.");
        $c1->setIntroAr("نقدم لكم أدناه، على سبيل المثال، نوعًا من رحلات وجولات الدفع الرباعي في الصحراء. عند أول اتصال بنا، يمكننا تحديد نوع الرحلة الأنسب لاحتياجاتكم، والتي تتراوح من ليلة واحدة إلى 15 يومًا.");
        $c1->setIntroIt("Vi proponiamo di seguito, a titolo di esempio, un tipo di circuito ed escursione in 4x4 nel deserto. Al nostro primo contatto, possiamo indicarvi il tipo di circuito più adatto alle vostre esigenze, da una notte fino a 15 giorni.");

        $c1->setFullDescriptionFr("Un circuit de 8 jours à travers le Sahara tunisien, de Douz à Tembaïne. Traversez des dunes infinies, baignez-vous dans la source chaude de Huidat Riched et dominez le désert depuis la montagne rocheuse d'El Mida. Découvrez l'oasis de Ksar Ghilane et la piscine d'eau chaude d'Elwat Sbat avant le retour vers Douz, Djerba ou Tozeur.");
        $c1->setFullDescriptionEn("An 8-day circuit through the Tunisian Sahara, from Douz to Tembaïne. Cross endless dunes, bathe in the hot spring of Huidat Riched, and overlook the desert from the rocky mountain of El Mida. Discover the oasis of Ksar Ghilane and the hot water pool of Elwat Sbat before returning to Douz, Djerba, or Tozeur.");
        $c1->setFullDescriptionAr("رحلة لمدة 8 أيام عبر الصحراء التونسية، من دوز إلى تمباين. اعبر الكثبان اللامتناهية، واستحم في ينبوع هويدات ريشد الحار، وأشرف على الصحراء من جبل الميدة الصخري. اكتشف واحة قصر غيلان ومسبح علوة سبات قبل العودة إلى دوز أو جربة أو توزر.");
        $c1->setFullDescriptionIt("Un circuito di 8 giorni nel Sahara tunisino, da Douz a Tembaïne. Attraversa dune infinite, fai il bagno nella sorgente termale di Huidat Riched e domina il deserto dalla montagna rocciosa di El Mida. Scopri l'oasi di Ksar Ghilane e la piscina calda di Elwat Sbat prima di tornare a Douz, Djerba o Tozeur.");

        $c1->setItineraryFr(['Accueil et transfert à Douz', 'Marché de Douz et route vers Tembaïne', 'Dunes et source chaude de Huidat Riched', 'Montagne rocheuse d\'El Mida', 'Oasis de Ksar Ghilane', 'Elwat Sbat et piscine d\'eau chaude', 'Retour en 4x4', 'Transfert à l\'aéroport']);
        $c1->setItineraryEn(['Arrival and transfer to Douz', 'Douz market and drive to Tembaïne', 'Dunes and Huidat Riched hot spring', 'Rocky mountain of El Mida', 'Ksar Ghilane oasis', 'Elwat Sbat and hot water pool', 'Return by 4x4', 'Airport transfer']);
        $c1->setItineraryAr(['الوصول والنقل إلى دوز', 'سوق دوز والتوجه نحو تمباين', 'الكثبان وينبوع هويدات ريشد الحار', 'جبل الميدة الصخري', 'واحة قصر غيلان', 'علوة سبات ومسبح المياه الحارة', 'العودة بسيارة الدفع الرباعي', 'النقل إلى المطار']);
        $c1->setItineraryIt(['Arrivo e trasferimento a Douz', 'Mercato di Douz e viaggio verso Tembaïne', 'Dune e sorgente termale di Huidat Riched', 'Montagna rocciosa di El Mida', 'Oasi di Ksar Ghilane', 'Elwat Sbat e piscina di acqua calda', 'Ritorno in 4x4', 'Trasferimento in aeroporto']);

        $c1->setItineraryDetailFr(["Accueil et assistance à l'aéroport de Djerba ou de Tozeur, transfert à l'hôtel *** à Douz.", "Visite du marché de Douz le matin, départ en 4×4 vers Tembaïne, lieu de passage traditionnel avec de belles montagnes et un puits profond où l'on rencontre souvent des nomades.", "Marche au milieu des dunes jusqu'à Huidat Riched, dont la source chaude offre une baignade inoubliable sous les étoiles.", "La caravane rejoint El Mida, une petite montagne rocheuse d'où l'on domine le Sahara, avec un puits où s'abreuvent les troupeaux.", "Après une cinquantaine de kilomètres, arrivée à l'oasis de Ksar Ghilane, la plus méridionale de Tunisie, alimentée par une source thermale.", "Direction Elwat Sbat, un site isolé avec une petite piscine d'eau chaude, où l'on s'installe pour la soirée.", "Retour en 4×4 vers l'hôtel à Douz, Djerba ou Tozeur.", "Transfert final vers l'aéroport de Djerba ou de Tozeur."]);
        $c1->setItineraryDetailEn(["Welcome and assistance at Djerba or Tozeur airport, transfer to the hotel in Douz.", "Morning visit to the Douz market, departure by 4x4 towards Tembaïne, a traditional crossing point with beautiful mountains and a deep well where nomads are often met.", "Walk among the dunes to Huidat Riched, whose hot spring offers an unforgettable swim under the stars.", "The caravan reaches El Mida, a small rocky mountain overlooking the Sahara, with a well where herds drink.", "After about fifty kilometers, arrival at the oasis of Ksar Ghilane, the southernmost in Tunisia, fed by a thermal spring.", "Onward to Elwat Sbat, an isolated site with a small hot water pool, where the evening is spent.", "Return by 4x4 to the hotel in Douz, Djerba, or Tozeur.", "Final transfer to the airport in Djerba or Tozeur."]);
        $c1->setItineraryDetailAr(["الاستقبال والمساعدة في مطار جربة أو توزر، والنقل إلى الفندق في دوز.", "زيارة صباحية لسوق دوز، ثم الانطلاق بسيارة الدفع الرباعي نحو تمباين، وهو معبر تقليدي بجباله الجميلة وبئره العميق حيث يلتقى غالبًا بالبدو الرحل.", "المشي وسط الكثبان وصولًا إلى هويدات ريشد، حيث يوفر ينبوعها الحار سباحة لا تُنسى تحت النجوم.", "تصل القافلة إلى الميدة، وهو جبل صخري صغير يطل على الصحراء، وبه بئر تشرب منه القطعان.", "بعد نحو خمسين كيلومترًا، الوصول إلى واحة قصر غيلان، أقصى واحة جنوبية في تونس، تغذيها ينابيع حرارية.", "التوجه نحو علوة سبات، وهو موقع معزول به مسبح صغير من المياه الحارة، حيث تُقضى الأمسية.", "العودة بسيارة الدفع الرباعي إلى الفندق في دوز أو جربة أو توزر.", "النقل الأخير إلى مطار جربة أو توزر."]);
        $c1->setItineraryDetailIt(["Accoglienza e assistenza all'aeroporto di Djerba o Tozeur, trasferimento all'hotel a Douz.", "Visita mattutina al mercato di Douz, partenza in 4x4 verso Tembaïne, un punto di passaggio tradizionale con belle montagne e un pozzo profondo dove spesso si incontrano i nomadi.", "Camminata tra le dune fino a Huidat Riched, la cui sorgente termale offre un bagno indimenticabile sotto le stelle.", "La carovana raggiunge El Mida, una piccola montagna rocciosa che domina il Sahara, con un pozzo dove si abbeverano le mandrie.", "Dopo circa cinquanta chilometri, arrivo all'oasi di Ksar Ghilane, la più meridionale della Tunisia, alimentata da una sorgente termale.", "Si prosegue verso Elwat Sbat, un sito isolato con una piccola piscina di acqua calda, dove si trascorre la serata.", "Ritorno in 4x4 all'hotel a Douz, Djerba o Tozeur.", "Trasferimento finale all'aeroporto di Djerba o Tozeur."]);

        $c1->setIncludedFr(['Alimentation', "Transfert de l'aéroport à l'hôtel et de retour", "Hébergement à l'hôtel à Djerba et à Douz", 'Matelas ou sac de couchage', 'Couverture', 'Tente', 'Autorisation']);
        $c1->setIncludedEn(['Meals', 'Airport-to-hotel transfer and return', 'Hotel accommodation in Djerba and Douz', 'Mattress or sleeping bag', 'Blanket', 'Tent', 'Permit']);
        $c1->setIncludedAr(['الطعام', 'النقل من المطار إلى الفندق والعودة', 'الإقامة في الفندق بجربة ودوز', 'مرتبة أو كيس نوم', 'بطانية', 'خيمة', 'تصريح']);
        $c1->setIncludedIt(['Vitto', 'Trasferimento aeroporto-hotel e ritorno', 'Alloggio in hotel a Djerba e Douz', 'Materasso o sacco a pelo', 'Coperta', 'Tenda', 'Permesso']);
        $c1->setIncludedIcons(['eat', 'van', 'cottage', 'bed', 'blanket', 'tent-1', 'draw-check-mark']);

        $c1->setClosingFr("A ce propos, nous sommes ravis de porter à votre connaissance que notre agence de voyages se spécialise dans l'organisation de plusieurs activités touristiques ayant l'attention de concrétiser votre séjour et de réaliser votre voyage d'aventures Tunisie et spécialement au Sahara de Douz.");
        $c1->setClosingEn("We are delighted to let you know that our travel agency specializes in organizing a variety of tourist activities, dedicated to making your stay a reality and fulfilling your Tunisian adventure, especially in the Douz Sahara.");
        $c1->setClosingAr("يسرنا أن نعلمكم أن وكالتنا للأسفار متخصصة في تنظيم عدة أنشطة سياحية تهتم بتجسيد إقامتكم وتحقيق رحلة مغامرتكم في تونس، وخاصة في صحراء دوز.");
        $c1->setClosingIt("Siamo lieti di informarvi che la nostra agenzia di viaggi è specializzata nell'organizzazione di diverse attività turistiche, con l'obiettivo di concretizzare il vostro soggiorno e realizzare il vostro viaggio d'avventura in Tunisia, in particolare nel Sahara di Douz.");

        $c1->setGalleryImages([
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788609964/baroudeurs/service/details/Circuit/3.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788609943/baroudeurs/service/Douz.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605419/baroudeurs/service/Desert%20Rose.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788559533/5_skoo9g.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788560647/6_k3qr6o.jpg',
        ]);

        $manager->persist($c1);

        // ============ CIRCUIT 2: Excursion Nuit à Ksar Ghilane ============
        $c2 = new Circuit();
        $c2->setImage('Circuits/excursion nuit k.ghilane.webp');
        $c2->setTitleFr('Excursion Nuit à Ksar Ghilane');
        $c2->setTitleEn('Ksar Ghilane Overnight Excursion');
        $c2->setTitleAr('رحلة ليلية إلى قصر غيلان');
        $c2->setTitleIt('Escursione Notturna a Ksar Ghilane');
        $c2->setDescriptionFr("Découvrez les villages berbères, le marché animé de Tataouine et les maisons troglodytes de Chenini avant de rejoindre l'oasis de Ksar Ghilane. Baignez-vous dans son bassin naturel et passez une nuit magique sous le ciel du désert.");
        $c2->setDescriptionEn("Explore Berber villages, the lively Tataouine market, and the troglodyte houses of Chenini before heading to the oasis of Ksar Ghilane. Swim in its natural pool and spend a magical night camped beneath the desert sky.");
        $c2->setDescriptionAr("اكتشف القرى الأمازيغية وسوق تطاوين النابض بالحياة ومنازل شنيني الكهفية قبل التوجه إلى واحة قصر غيلان. اسبح في حوضها الطبيعي واقض ليلة سحرية تحت سماء الصحراء.");
        $c2->setDescriptionIt("Scopri i villaggi berberi, il vivace mercato di Tataouine e le case trogloditiche di Chenini prima di raggiungere l'oasi di Ksar Ghilane. Fai il bagno nella sua piscina naturale e trascorri una notte magica sotto il cielo del deserto.");
        $c2->setDurationFr('2 jours / 1 nuit');
        $c2->setDurationEn('2 days / 1 night');
        $c2->setDurationAr('يومان / ليلة واحدة');
        $c2->setDurationIt('2 giorni / 1 notte');
        $c2->setIcons(['flaticon-hiking', 'flaticon-camp', 'flaticon-campfire']);
        $c2->setPosition(3);

        $c2->setIntroFr("Voici un itinéraire détaillé pour votre première journée en Tunisie, incluant des précisions sur les repas et la nuit.");
        $c2->setIntroEn("Here is a detailed itinerary for your first day in Tunisia, including details about meals and overnight stays.");
        $c2->setIntroAr("إليكم برنامجًا مفصلاً ليومكم الأول في تونس، يتضمن تفاصيل حول الوجبات والمبيت.");
        $c2->setIntroIt("Ecco un itinerario dettagliato per il vostro primo giorno in Tunisia, con dettagli sui pasti e sul pernottamento.");

        $c2->setFullDescriptionFr("Deux jours entre villages berbères et désert. Traversez la Roman Road, découvrez le marché de Tataouine et le village troglodyte de Chenini, puis baignez-vous dans le bassin naturel de Ksar Ghilane pour une nuit sous les étoiles. Le second jour, visitez une famille berbère à Matmata, l'hôtel Sidi Idriss (décor de Star Wars) et le village de Toujane.");
        $c2->setFullDescriptionEn("Two days between Berber villages and the desert. Cross the Roman Road, discover the Tataouine market and the troglodyte village of Chenini, then swim in the natural pool of Ksar Ghilane for a night under the stars. On the second day, visit a Berber family in Matmata, the Sidi Idriss hotel (Star Wars set), and the village of Toujane.");
        $c2->setFullDescriptionAr("يومان بين القرى الأمازيغية والصحراء. اعبر الطريق الروماني، اكتشف سوق تطاوين وقرية شنيني الكهفية، ثم اسبح في الحوض الطبيعي لقصر غيلان لقضاء ليلة تحت النجوم. في اليوم الثاني، زر عائلة أمازيغية في مطماطة، وفندق سيدي إدريس (موقع تصوير ستار وورز)، وقرية توجان.");
        $c2->setFullDescriptionIt("Due giorni tra villaggi berberi e deserto. Attraversa la Roman Road, scopri il mercato di Tataouine e il villaggio trogloditico di Chenini, poi fai il bagno nella piscina naturale di Ksar Ghilane per una notte sotto le stelle. Il secondo giorno, visita una famiglia berbera a Matmata, l'hotel Sidi Idriss (set di Star Wars) e il villaggio di Toujane.");

        $c2->setItineraryFr(['Prise en charge à l\'hôtel', 'Trajet vers Tataouine (Roman Road)', 'Lac salé de Chahbania', 'Marché de Tataouine', 'Village berbère de Chenini', 'Déjeuner local', 'Oasis de Ksar Ghilane', 'Activités optionnelles (quad, chameau)', 'Nuit à Ksar Ghilane', 'Petit-déjeuner et départ pour Matmata', 'Visite d\'une famille berbère', 'Village de Tamazret', 'Hôtel troglodyte Sidi Idriss', 'Village de Toujane', 'Retour à l\'hôtel']);
        $c2->setItineraryEn(['Hotel pickup', 'Drive to Tataouine (Roman Road)', 'Chahbania salt lake', 'Tataouine market', 'Berber village of Chenini', 'Local lunch', 'Ksar Ghilane oasis', 'Optional activities (quad, camel)', 'Night in Ksar Ghilane', 'Breakfast and departure for Matmata', 'Visit to a Berber family', 'Village of Tamazret', 'Sidi Idriss troglodyte hotel', 'Village of Toujane', 'Return to the hotel']);
        $c2->setItineraryAr(['الانطلاق من الفندق', 'التوجه نحو تطاوين (الطريق الروماني)', 'بحيرة الشحبانية المالحة', 'سوق تطاوين', 'قرية شنيني الأمازيغية', 'غداء محلي', 'واحة قصر غيلان', 'أنشطة اختيارية (دراجة رباعية، جمل)', 'ليلة في قصر غيلان', 'الفطور والانطلاق نحو مطماطة', 'زيارة عائلة أمازيغية', 'قرية تمزرط', 'فندق سيدي إدريس الكهفي', 'قرية توجان', 'العودة إلى الفندق']);
        $c2->setItineraryIt(['Prelievo in hotel', 'Tragitto verso Tataouine (Roman Road)', 'Lago salato di Chahbania', 'Mercato di Tataouine', 'Villaggio berbero di Chenini', 'Pranzo locale', 'Oasi di Ksar Ghilane', 'Attività opzionali (quad, dromedario)', 'Notte a Ksar Ghilane', 'Colazione e partenza per Matmata', 'Visita a una famiglia berbera', 'Villaggio di Tamazret', 'Hotel trogloditico Sidi Idriss', 'Villaggio di Toujane', 'Ritorno in hotel']);

        $c2->setItineraryDetailFr(["Vous serez accueilli à votre hôtel pour débuter votre aventure.", "Nous emprunterons la Roman Road, une digue pittoresque reliant l'île de Djerba au continent.", "Pause au lac salé de Chahbania pour profiter de la vue magnifique et prendre quelques photos mémorables.", "Découverte du marché local, où vous pourrez explorer les différents produits et épices berbères.", "Un guide local vous fera découvrir l'histoire, les traditions et le mode de vie des habitants de Chenini.", "Dégustation d'un repas traditionnel berbère dans l'un des restaurants du village.", "Baignade dans le bassin d'eau naturel de Ksar Ghilane, un lieu magique au milieu des dunes dorées.", "Possibilité de sillonner les alentours de l'oasis en quad ou à dos de chameau, moyennant un supplément.", "Nuit dans un hébergement local, pour profiter de l'ambiance unique du désert.", "Après un bon petit-déjeuner, départ pour le village de Matmata.", "Rencontre avec une famille berbère et visite de leur habitat troglodyte traditionnel.", "Pause au village berbère de Tamazret, avec dégustation d'un thé aux amandes, spécialité locale.", "Visite de Sidi Idriss, un hôtel troglodyte célèbre pour avoir été le décor de scènes du film Star Wars.", "Visite du village berbère de Toujane, caché entre deux montagnes, réputé pour ses tapis et son miel.", "Retour à l'hôtel, la tête pleine de souvenirs inoubliables."]);
        $c2->setItineraryDetailEn(["You will be welcomed at your hotel to begin your adventure.", "We will take the Roman Road, a picturesque causeway linking the island of Djerba to the mainland.", "A pause at the Chahbania salt lake to enjoy the magnificent view and take some memorable photos.", "Discovery of the local market, exploring various Berber products and spices.", "A local guide will introduce you to the history, traditions, and way of life of Chenini's inhabitants.", "Enjoy a traditional Berber meal at one of the village restaurants.", "Swim in the natural pool of Ksar Ghilane, a magical spot amid golden dunes.", "Optional exploration of the oasis surroundings by quad bike or camel, for an extra fee.", "A night in local accommodation, enjoying the unique desert atmosphere.", "After a good breakfast, departure for the village of Matmata.", "Meet a Berber family and visit their traditional troglodyte home.", "A stop in the Berber village of Tamazret, with an almond tea, a local specialty.", "Visit Sidi Idriss, a troglodyte hotel famous for being the set of Star Wars scenes.", "Visit the Berber village of Toujane, tucked between two mountains, known for its carpets and honey.", "Return to the hotel, full of unforgettable memories."]);
        $c2->setItineraryDetailAr(["سيتم استقبالكم في فندقكم لبدء مغامرتكم.", "سنسلك الطريق الروماني، وهو جسر جميل يربط جزيرة جربة بالقارة.", "توقف عند بحيرة الشحبانية المالحة للاستمتاع بالمنظر الرائع والتقاط بعض الصور التذكارية.", "اكتشاف السوق المحلي واستكشاف مختلف المنتجات والتوابل الأمازيغية.", "سيقدم لكم مرشد محلي تاريخ وتقاليد وأسلوب حياة سكان شنيني.", "تذوق وجبة أمازيغية تقليدية في أحد مطاعم القرية.", "السباحة في الحوض الطبيعي لقصر غيلان، وهو مكان ساحر وسط الكثبان الذهبية.", "إمكانية استكشاف محيط الواحة بالدراجة الرباعية أو على ظهر الجمل مقابل رسوم إضافية.", "المبيت في إقامة محلية، والاستمتاع بأجواء الصحراء الفريدة.", "بعد فطور شهي، الانطلاق نحو قرية مطماطة.", "لقاء عائلة أمازيغية وزيارة مسكنهم الكهفي التقليدي.", "توقف في قرية تمزرط الأمازيغية، مع تذوق شاي باللوز، وهو طبق محلي خاص.", "زيارة سيدي إدريس، وهو فندق كهفي مشهور بكونه موقع تصوير مشاهد من ستار وورز.", "زيارة قرية توجان الأمازيغية، المختبئة بين جبلين، والمشهورة بسجادها وعسلها.", "العودة إلى الفندق، مليئين بذكريات لا تُنسى."]);
        $c2->setItineraryDetailIt(["Sarete accolti nel vostro hotel per iniziare la vostra avventura.", "Percorreremo la Roman Road, una pittoresca diga che collega l'isola di Djerba alla terraferma.", "Sosta al lago salato di Chahbania per ammirare il magnifico paesaggio e scattare foto memorabili.", "Scoperta del mercato locale, esplorando diversi prodotti e spezie berbere.", "Una guida locale vi farà scoprire la storia, le tradizioni e il modo di vivere degli abitanti di Chenini.", "Gustate un pasto tradizionale berbero in uno dei ristoranti del villaggio.", "Bagno nella piscina naturale di Ksar Ghilane, un luogo magico tra le dune dorate.", "Possibilità di esplorare i dintorni dell'oasi in quad o in dromedario, con un supplemento.", "Una notte in un alloggio locale, godendo dell'atmosfera unica del deserto.", "Dopo una buona colazione, partenza per il villaggio di Matmata.", "Incontro con una famiglia berbera e visita alla loro tradizionale abitazione trogloditica.", "Sosta nel villaggio berbero di Tamazret, con un tè alle mandorle, specialità locale.", "Visita a Sidi Idriss, un hotel trogloditico famoso per essere stato il set di scene di Star Wars.", "Visita al villaggio berbero di Toujane, nascosto tra due montagne, noto per i suoi tappeti e il suo miele.", "Ritorno in hotel, con la testa piena di ricordi indimenticabili."]);

        $c2->setIncludedFr(['Prise en charge à l\'hôtel', 'Guide local', 'Déjeuner', 'Transport en véhicule', 'Hébergement à Ksar Ghilane']);
        $c2->setIncludedEn(['Hotel pickup', 'Local guide', 'Lunch', 'Vehicle transport', 'Accommodation in Ksar Ghilane']);
        $c2->setIncludedAr(['الانطلاق من الفندق', 'مرشد محلي', 'الغداء', 'النقل بالمركبة', 'الإقامة في قصر غيلان']);
        $c2->setIncludedIt(['Prelievo in hotel', 'Guida locale', 'Pranzo', 'Trasporto in veicolo', 'Alloggio a Ksar Ghilane']);
        $c2->setIncludedIcons(['van', 'hiking', 'eat', 'van', 'tent-1']);

        $c2->setClosingFr("Nous espérons que cet itinéraire vous plaira et que vous profiterez pleinement de votre séjour en Tunisie !");
        $c2->setClosingEn("We hope you enjoy this itinerary and make the most of your stay in Tunisia!");
        $c2->setClosingAr("نأمل أن يعجبكم هذا البرنامج وأن تستمتعوا بإقامتكم في تونس!");
        $c2->setClosingIt("Speriamo che questo itinerario vi piaccia e che possiate godervi appieno il vostro soggiorno in Tunisia!");

        $c2->setGalleryImages([
            'https://res.cloudinary.com/dy13axswo/image/upload/v1789039783/baroudeurs/excursions/metnj7iunp5pitmdmeei.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788609984/baroudeurs/service/details/Baroudeurs/5.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788609892/baroudeurs/service/details/Temba%C3%AFne/3.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788608952/baroudeurs/service/details/Baroudeurs/1.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788608074/baroudeurs/service/details/Charm/5.jpg',
        ]);

        $manager->persist($c2);

        // ============ CIRCUIT 3: Excursion à Tataouine ============
        $c3 = new Circuit();
        $c3->setImage('Circuits/excursion Tatouine.jpg');
        $c3->setTitleFr("Excursion d'une Journée à Tataouine");
        $c3->setTitleEn('Tataouine Day Excursion');
        $c3->setTitleAr('رحلة يوم واحد إلى تطاوين');
        $c3->setTitleIt('Escursione di un Giorno a Tataouine');
        $c3->setDescriptionFr("Une journée de découverte le long de la Roman Road historique, avec un arrêt au lac salé de Chahbania, le marché de Tataouine et le village troglodyte de Chenini. Terminez au ksar Hadada, célèbre décor de Star Wars.");
        $c3->setDescriptionEn("A day of discovery along the historic Roman Road, with a stop at the Chahbania salt lake, the Tataouine market, and the troglodyte village of Chenini. Finish at Ksar Hadada, the famous Star Wars filming location.");
        $c3->setDescriptionAr("يوم من الاكتشاف على طول الطريق الروماني التاريخي، مع توقف عند بحيرة الشحبانية المالحة وسوق تطاوين وقرية شنيني الكهفية. تنتهي الرحلة في قصر حدادة، الموقع الشهير لتصوير ستار وورز.");
        $c3->setDescriptionIt("Una giornata alla scoperta della storica Roman Road, con una sosta al lago salato di Chahbania, il mercato di Tataouine e il villaggio trogloditico di Chenini. Termina al ksar Hadada, famoso set di Star Wars.");
        $c3->setDurationFr('1 jour');
        $c3->setDurationEn('1 day');
        $c3->setDurationAr('يوم واحد');
        $c3->setDurationIt('1 giorno');
        $c3->setIcons(['flaticon-hiking-2', 'flaticon-camp', 'flaticon-quotation']);
        $c3->setPosition(1);

        $c3->setIntroFr("Votre excursion promet d'être une expérience mémorable, riche en découvertes culturelles et en paysages magnifiques. Voici un aperçu de votre journée :");
        $c3->setIntroEn("Your excursion promises to be a memorable experience, full of cultural discoveries and beautiful landscapes. Here is an overview of your day:");
        $c3->setIntroAr("تعد رحلتكم بأن تكون تجربة لا تُنسى، مليئة بالاكتشافات الثقافية والمناظر الطبيعية الخلابة. إليكم لمحة عن يومكم:");
        $c3->setIntroIt("La vostra escursione promette di essere un'esperienza memorabile, ricca di scoperte culturali e paesaggi magnifici. Ecco una panoramica della vostra giornata:");

        $c3->setFullDescriptionFr("Une journée le long de la Roman Road historique. Admirez le lac salé de Chahbania, explorez le marché animé de Tataouine et le village troglodyte de Chenini avec un guide local. Dégustez un déjeuner berbère traditionnel avant de découvrir le ksar Hadada, célèbre décor du film Star Wars.");
        $c3->setFullDescriptionEn("A day along the historic Roman Road. Admire the Chahbania salt lake, explore the lively Tataouine market and the troglodyte village of Chenini with a local guide. Enjoy a traditional Berber lunch before discovering Ksar Hadada, the famous Star Wars filming location.");
        $c3->setFullDescriptionAr("يوم على طول الطريق الروماني التاريخي. استمتع بمنظر بحيرة الشحبانية المالحة، واستكشف سوق تطاوين النابض بالحياة وقرية شنيني الكهفية برفقة مرشد محلي. تذوق غداءً أمازيغياً تقليدياً قبل اكتشاف قصر حدادة، الموقع الشهير لتصوير ستار وورز.");
        $c3->setFullDescriptionIt("Una giornata lungo la storica Roman Road. Ammira il lago salato di Chahbania, esplora il vivace mercato di Tataouine e il villaggio trogloditico di Chenini con una guida locale. Gusta un pranzo berbero tradizionale prima di scoprire il ksar Hadada, famoso set di Star Wars.");

        $c3->setItineraryFr(['Départ de votre hôtel', 'Traversée de la Roman Road', 'Pause au lac salé de Chahbania', 'Exploration du marché de Tataouine', 'Visite du village de Chenini', 'Déjeuner dans un restaurant berbère', 'Visite du ksar Hadada', 'Retour à votre hôtel']);
        $c3->setItineraryEn(['Departure from your hotel', 'Crossing the Roman Road', 'Stop at the Chahbania salt lake', 'Exploring the Tataouine market', 'Visit to the village of Chenini', 'Lunch at a Berber restaurant', 'Visit to Ksar Hadada', 'Return to your hotel']);
        $c3->setItineraryAr(['الانطلاق من الفندق', 'عبور الطريق الروماني', 'توقف عند بحيرة الشحبانية المالحة', 'استكشاف سوق تطاوين', 'زيارة قرية شنيني', 'الغداء في مطعم أمازيغي', 'زيارة قصر حدادة', 'العودة إلى الفندق']);
        $c3->setItineraryIt(['Partenza dal vostro hotel', 'Attraversamento della Roman Road', 'Sosta al lago salato di Chahbania', 'Esplorazione del mercato di Tataouine', 'Visita al villaggio di Chenini', 'Pranzo in un ristorante berbero', 'Visita al ksar Hadada', 'Ritorno in hotel']);

        $c3->setItineraryDetailFr(["Votre aventure commence par un départ matinal, vous mettant dans l'ambiance pour une journée remplie de découvertes.", "Un vestige historique qui relie l'île à l'Afrique continentale, témoin de l'importance de cette ancienne voie de commerce.", "Admirez ce site naturel fascinant, où les reflets du soleil sur l'eau créent des panoramas époustouflants.", "Explorez les produits locaux, sentez les épices berbères et interagissez avec les marchands dans une ambiance vibrante.", "Un village célèbre pour ses maisons troglodytes et son architecture berbère, découvert avec un guide local.", "Dégustez un repas traditionnel berbère et découvrez la gastronomie typique de la région.", "Un site emblématique qui a servi de décor pour le film Star Wars, chargé d'histoire cinématographique.", "Vous serez raccompagné à votre hôtel, riche de souvenirs inoubliables à partager avec vos proches."]);
        $c3->setItineraryDetailEn(["Your adventure begins with an early morning departure, setting the mood for a day full of discoveries.", "A historic causeway linking the island to mainland Africa, testament to the importance of this ancient trade route.", "Admire this fascinating natural site, where the sun's reflections on the water create breathtaking views.", "Explore local products, smell Berber spices, and interact with vendors in a lively atmosphere.", "A village famous for its troglodyte houses and Berber architecture, discovered with a local guide.", "Enjoy a traditional Berber meal and discover the region's typical cuisine.", "An iconic site that served as a set for the Star Wars film, steeped in cinema history.", "You'll be taken back to your hotel, full of unforgettable memories to share with loved ones."]);
        $c3->setItineraryDetailAr(["تبدأ مغامرتكم بانطلاقة صباحية، لتضعكم في أجواء يوم حافل بالاكتشافات.", "أثر تاريخي يربط الجزيرة بالقارة الأفريقية، شاهد على أهمية هذا الطريق التجاري القديم.", "استمتعوا بهذا الموقع الطبيعي الساحر، حيث تخلق انعكاسات الشمس على الماء مناظر خلابة.", "استكشفوا المنتجات المحلية وشموا التوابل الأمازيغية وتفاعلوا مع الباعة في أجواء حيوية.", "قرية مشهورة بمنازلها الكهفية وهندستها الأمازيغية، تُكتشف برفقة مرشد محلي.", "تذوقوا وجبة أمازيغية تقليدية واكتشفوا مطبخ المنطقة النموذجي.", "موقع رمزي كان مسرحًا لتصوير فيلم ستار وورز، غني بتاريخ السينما.", "سيتم إرجاعكم إلى فندقكم، مليئين بذكريات لا تُنسى لمشاركتها مع أحبائكم."]);
        $c3->setItineraryDetailIt(["La vostra avventura inizia con una partenza mattutina, dando il via a una giornata ricca di scoperte.", "Un vestigio storico che collega l'isola al continente africano, testimone dell'importanza di questa antica via commerciale.", "Ammirate questo affascinante sito naturale, dove i riflessi del sole sull'acqua creano panorami mozzafiato.", "Esplorate i prodotti locali, sentite le spezie berbere e interagite con i venditori in un'atmosfera vivace.", "Un villaggio famoso per le sue case trogloditiche e la sua architettura berbera, scoperto con una guida locale.", "Gustate un pasto tradizionale berbero e scoprite la gastronomia tipica della regione.", "Un sito emblematico che ha fatto da set per il film Star Wars, ricco di storia del cinema.", "Sarete riaccompagnati al vostro hotel, ricchi di ricordi indimenticabili da condividere con i vostri cari."]);

        $c3->setIncludedFr(['Guide local', 'Déjeuner berbère', 'Transport en véhicule climatisé']);
        $c3->setIncludedEn(['Local guide', 'Berber lunch', 'Air-conditioned vehicle transport']);
        $c3->setIncludedAr(['مرشد محلي', 'غداء أمازيغي', 'النقل بمركبة مكيفة']);
        $c3->setIncludedIt(['Guida locale', 'Pranzo berbero', 'Trasporto in veicolo climatizzato']);
        $c3->setIncludedIcons(['hiking', 'eat', 'van']);

        $c3->setClosingFr("Profitez de chaque instant de cette belle aventure en Tunisie !");
        $c3->setClosingEn("Enjoy every moment of this wonderful adventure in Tunisia!");
        $c3->setClosingAr("استمتعوا بكل لحظة من هذه المغامرة الرائعة في تونس!");
        $c3->setClosingIt("Godetevi ogni momento di questa splendida avventura in Tunisia!");

        $c3->setGalleryImages([
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788607423/baroudeurs/service/Endless.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605281/baroudeurs/service/details/Tataouine/8.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605279/baroudeurs/service/details/Tataouine/7.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605266/baroudeurs/service/details/Tataouine/2.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605262/baroudeurs/service/details/Tataouine/1.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605274/baroudeurs/service/details/Tataouine/4.webp',
        ]);

        $manager->persist($c3);

        // ============ CIRCUIT 4: Mirage du Désert ============
        $c4 = new Circuit();
        $c4->setImage('Excursions/BAROUDEURS DE DESERT 15JR DROMADAIRE.jpg');
        $c4->setTitleFr('Mirage du Désert - 8 Jours / 7 Nuits');
        $c4->setTitleEn('Mirage du Désert - 8 Days / 7 Nights');
        $c4->setTitleAr('سراب الصحراء - 8 أيام / 7 ليال');
        $c4->setTitleIt('Miraggio del Deserto - 8 Giorni / 7 Notti');
        $c4->setDescriptionFr("Un tour complet du sud tunisien : Djerba, Tataouine, Ksar Ghilane, Douz, les oasis de Tozeur, le mythique train Lézard Rouge et le village troglodyte de Matmata. Pension complète et hôtels 3* tout au long du parcours.");
        $c4->setDescriptionEn("A complete tour of southern Tunisia: Djerba, Tataouine, Ksar Ghilane, Douz, the oases of Tozeur, the legendary Red Lizard train, and the troglodyte village of Matmata. Full board and 3-star hotels throughout.");
        $c4->setDescriptionAr("جولة كاملة في جنوب تونس: جربة وتطاوين وقصر غيلان ودوز وواحات توزر وقطار السحلية الحمراء الأسطوري وقرية مطماطة الكهفية. إقامة كاملة وفنادق 3 نجوم طوال الرحلة.");
        $c4->setDescriptionIt("Un tour completo del sud della Tunisia: Djerba, Tataouine, Ksar Ghilane, Douz, le oasi di Tozeur, il leggendario treno Lucertola Rossa e il villaggio trogloditico di Matmata. Pensione completa e hotel 3 stelle lungo tutto il percorso.");
        $c4->setDurationFr('8 jours / 7 nuits');
        $c4->setDurationEn('8 days / 7 nights');
        $c4->setDurationAr('8 أيام / 7 ليال');
        $c4->setDurationIt('8 giorni / 7 notti');
        $c4->setIcons(['flaticon-cottage', 'flaticon-van', 'flaticon-hiking-2']);
        $c4->setPosition(4);

        $c4->setIntroFr("Mirage du Désert : Une aventure inoubliable de 8 jours / 7 nuits.");
        $c4->setIntroEn("Mirage du Désert: An unforgettable 8-day / 7-night adventure.");
        $c4->setIntroAr("سراب الصحراء: مغامرة لا تُنسى لمدة 8 أيام / 7 ليال.");
        $c4->setIntroIt("Miraggio del Deserto: Un'avventura indimenticabile di 8 giorni / 7 notti.");

        $c4->setFullDescriptionFr("Un tour de 8 jours à travers le sud tunisien. De Djerba à Tataouine et Ksar Ghilane, puis Douz, Nefta et Tozeur, découvrez oasis de montagne, dunes et roses des sables. Voyagez à bord du train Lézard Rouge, explorez l'architecture troglodytique de Matmata et le village de Toujane avant le retour à Djerba.");
        $c4->setFullDescriptionEn("An 8-day tour through southern Tunisia. From Djerba to Tataouine and Ksar Ghilane, then Douz, Nefta, and Tozeur, discover mountain oases, dunes, and desert roses. Travel aboard the Red Lizard train, explore the troglodyte architecture of Matmata and the village of Toujane before returning to Djerba.");
        $c4->setFullDescriptionAr("جولة لمدة 8 أيام عبر جنوب تونس. من جربة إلى تطاوين وقصر غيلان، ثم دوز ونفطة وتوزر، اكتشف واحات الجبال والكثبان وورود الرمال. سافر على متن قطار السحلية الحمراء، واستكشف الهندسة الكهفية لمطماطة وقرية توجان قبل العودة إلى جربة.");
        $c4->setFullDescriptionIt("Un tour di 8 giorni nel sud della Tunisia. Da Djerba a Tataouine e Ksar Ghilane, poi Douz, Nefta e Tozeur, scopri oasi di montagna, dune e rose del deserto. Viaggia a bordo del treno Lucertola Rossa, esplora l'architettura trogloditica di Matmata e il villaggio di Toujane prima di tornare a Djerba.");

        $c4->setItineraryFr(['Arrivée à Djerba', 'Tataouine, Chenini et Ksar Ghilane', 'Ksar Ghilane à Douz', 'Douz, Nefta et Tozeur', 'Oasis de montagne', 'Lézard Rouge et Matmata', 'Matmata, Toujane et Djerba', 'Départ']);
        $c4->setItineraryEn(['Arrival in Djerba', 'Tataouine, Chenini and Ksar Ghilane', 'Ksar Ghilane to Douz', 'Douz, Nefta and Tozeur', 'Mountain oases', 'Red Lizard train and Matmata', 'Matmata, Toujane and Djerba', 'Departure']);
        $c4->setItineraryAr(['الوصول إلى جربة', 'تطاوين وشنيني وقصر غيلان', 'قصر غيلان إلى دوز', 'دوز ونفطة وتوزر', 'واحات الجبل', 'قطار السحلية الحمراء ومطماطة', 'مطماطة وتوجان وجربة', 'المغادرة']);
        $c4->setItineraryIt(['Arrivo a Djerba', 'Tataouine, Chenini e Ksar Ghilane', 'Da Ksar Ghilane a Douz', 'Douz, Nefta e Tozeur', 'Oasi di montagna', 'Treno Lucertola Rossa e Matmata', 'Matmata, Toujane e Djerba', 'Partenza']);

        $c4->setItineraryDetailFr(["Accueil chaleureux à l'aéroport de Djerba, transfert vers un hôtel 3* pour une première nuit en demi-pension.", "Route vers Tataouine via la chaussée romaine, visite du Ksar Hadada (décor de Star Wars), du marché de Tataouine et du village de Chenini, puis arrivée à Ksar Ghilane pour un bain dans les sources chaudes.", "Départ pour Douz, la porte du désert, marché local et oasis, avec possibilité de randonnée en dromadaire ou hammam traditionnel.", "Route vers Nefta, la corbeille de palmiers, puis vers Tozeur, célèbre pour son architecture en briques.", "Exploration des oasis de montagne de Chebika, Tamerza et Mides, puis découverte de la fabrication traditionnelle de briques à Tozeur.", "Voyage à bord du train Lézard Rouge à travers les gorges de Selja, arrêt au Chott El Jerid pour admirer les roses des sables, puis direction Matmata.", "Découverte de l'architecture troglodytique de Matmata et du village de Toujane, halte au village des potiers de Guellala.", "Dernier petit-déjeuner à Djerba, transfert vers l'aéroport pour le vol de retour."]);
        $c4->setItineraryDetailEn(["Warm welcome at Djerba airport, transfer to a 3-star hotel for a first night on half-board.", "Drive to Tataouine via the Roman causeway, visit Ksar Hadada (Star Wars set), the Tataouine market, and Chenini village, then arrival at Ksar Ghilane for a dip in the hot springs.", "Departure for Douz, the gateway to the desert, local market and oases, with the option of a camel ride or a traditional hammam.", "Drive to Nefta, the basket of palm trees, then to Tozeur, famous for its brick architecture.", "Exploring the mountain oases of Chebika, Tamerza, and Mides, then discovering traditional brick-making in Tozeur.", "Journey aboard the Red Lizard train through the Selja gorges, a stop at Chott El Jerid to admire the desert roses, then on to Matmata.", "Discovering the troglodyte architecture of Matmata and the village of Toujane, a stop at the potters' village of Guellala.", "Last breakfast in Djerba, transfer to the airport for the return flight."]);
        $c4->setItineraryDetailAr(["استقبال حار في مطار جربة، والنقل إلى فندق 3 نجوم لقضاء الليلة الأولى بنظام نصف إقامة.", "التوجه نحو تطاوين عبر الطريق الروماني، وزيارة قصر حدادة (موقع تصوير ستار وورز) وسوق تطاوين وقرية شنيني، ثم الوصول إلى قصر غيلان للاستحمام في الينابيع الحارة.", "الانطلاق نحو دوز، بوابة الصحراء، مع السوق المحلي والواحات، مع إمكانية ركوب الجمال أو حمام تقليدي.", "التوجه نحو نفطة، سلة النخيل، ثم نحو توزر، المشهورة بهندستها من الطوب.", "استكشاف واحات الجبل شبيقة وتمغزة وميدس، ثم اكتشاف صناعة الطوب التقليدية في توزر.", "رحلة على متن قطار السحلية الحمراء عبر أخاديد سلجة، وتوقف عند شط الجريد للإعجاب بورود الرمال، ثم التوجه نحو مطماطة.", "اكتشاف الهندسة الكهفية لمطماطة وقرية توجان، وتوقف في قرية الفخارين بقلالة.", "فطور أخير في جربة، والنقل إلى المطار لرحلة العودة."]);
        $c4->setItineraryDetailIt(["Calorosa accoglienza all'aeroporto di Djerba, trasferimento in un hotel 3 stelle per la prima notte in mezza pensione.", "Viaggio verso Tataouine tramite la strada romana, visita a Ksar Hadada (set di Star Wars), al mercato di Tataouine e al villaggio di Chenini, poi arrivo a Ksar Ghilane per un bagno nelle sorgenti termali.", "Partenza per Douz, la porta del deserto, mercato locale e oasi, con possibilità di un'escursione in dromedario o un hammam tradizionale.", "Viaggio verso Nefta, il cesto di palme, poi verso Tozeur, famosa per la sua architettura in mattoni.", "Esplorazione delle oasi di montagna di Chebika, Tamerza e Mides, poi scoperta della tradizionale fabbricazione dei mattoni a Tozeur.", "Viaggio a bordo del treno Lucertola Rossa attraverso le gole di Selja, sosta al Chott El Jerid per ammirare le rose del deserto, poi direzione Matmata.", "Scoperta dell'architettura trogloditica di Matmata e del villaggio di Toujane, sosta al villaggio dei vasai di Guellala.", "Ultima colazione a Djerba, trasferimento in aeroporto per il volo di ritorno."]);

        $c4->setIncludedFr(['Pension complète (petits déjeuners, déjeuners, dîners)', 'Hébergement en hôtels 3* tout au long du parcours', 'Visites guidées des principaux sites touristiques', 'Transports en véhicules confortables']);
        $c4->setIncludedEn(['Full board (breakfasts, lunches, dinners)', '3-star hotel accommodation throughout the trip', 'Guided tours of the main tourist sites', 'Transport in comfortable vehicles']);
        $c4->setIncludedAr(['إقامة كاملة (فطور، غداء، عشاء)', 'الإقامة في فنادق 3 نجوم طوال الرحلة', 'جولات مرشدة إلى المواقع السياحية الرئيسية', 'النقل بمركبات مريحة']);
        $c4->setIncludedIt(['Pensione completa (colazioni, pranzi, cene)', 'Alloggio in hotel 3 stelle per tutto il percorso', 'Visite guidate ai principali siti turistici', 'Trasporti in veicoli confortevoli']);
        $c4->setIncludedIcons(['eat', 'cottage', 'hiking', 'van']);

        $c4->setExcludedFr(['Boissons aux repas', 'Pourboires']);
        $c4->setExcludedEn(['Drinks with meals', 'Tips']);
        $c4->setExcludedAr(['المشروبات مع الوجبات', 'البقشيش']);
        $c4->setExcludedIt(['Bevande ai pasti', 'Mance']);
        $c4->setExcludedIcons(['pot', 'draw-check-mark']);

        $c4->setClosingFr("Laissez-vous envoûter par le charme du désert et partez à la découverte de ses merveilles avec ce programme qui combine aventure, authenticité et détente !");
        $c4->setClosingEn("Let yourself be captivated by the charm of the desert and set off to discover its wonders with this program combining adventure, authenticity, and relaxation!");
        $c4->setClosingAr("دعوا أنفسكم تنبهرون بسحر الصحراء وانطلقوا لاكتشاف عجائبها مع هذا البرنامج الذي يجمع بين المغامرة والأصالة والاسترخاء!");
        $c4->setClosingIt("Lasciatevi incantare dal fascino del deserto e partite alla scoperta delle sue meraviglie con questo programma che unisce avventura, autenticità e relax!");

        $c4->setGalleryImages([
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788608078/baroudeurs/service/details/Charm/6.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788607595/baroudeurs/service/details/Endless/2.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788605755/baroudeurs/service/details/Rose/4.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788559711/8_gyuz3p.jpg',
            'https://res.cloudinary.com/dy13axswo/image/upload/v1788608876/baroudeurs/service/details/Circuit/6.jpg',
        ]);

        $manager->persist($c4);

        $manager->flush();
    }
}
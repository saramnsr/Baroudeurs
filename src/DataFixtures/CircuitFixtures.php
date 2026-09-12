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

        $c1->setItinerarySummaryFr("Ce circuit de 8 jours relie Douz à Tembaïne à travers des dunes infinies, avec des étapes à Huidat Riched, El Mida, Ksar Ghilane et Elwat Sbat. Chaque jour combine marche dans le désert, découverte de sites isolés et nuits sous les étoiles. Le circuit se termine par un retour progressif vers Douz, Djerba ou Tozeur.");
        $c1->setItinerarySummaryEn("This 8-day circuit links Douz to Tembaïne across endless dunes, with stops at Huidat Riched, El Mida, Ksar Ghilane, and Elwat Sbat. Each day combines walking through the desert, discovering isolated sites, and nights under the stars. The circuit ends with a gradual return to Douz, Djerba, or Tozeur.");
        $c1->setItinerarySummaryAr("تربط هذه الرحلة التي تستغرق 8 أيام بين دوز وتمباين عبر كثبان لا نهائية، مع محطات في هويدات ريشد والميدة وقصر غيلان وعلوة سبات. يجمع كل يوم بين المشي في الصحراء واكتشاف مواقع معزولة والمبيت تحت النجوم. تنتهي الرحلة بعودة تدريجية إلى دوز أو جربة أو توزر.");
        $c1->setItinerarySummaryIt("Questo circuito di 8 giorni collega Douz a Tembaïne attraverso dune infinite, con tappe a Huidat Riched, El Mida, Ksar Ghilane ed Elwat Sbat. Ogni giorno unisce camminate nel deserto, scoperta di siti isolati e notti sotto le stelle. Il circuito termina con un ritorno graduale verso Douz, Djerba o Tozeur.");

        $c1->setItineraryFr(['Accueil et transfert à Douz', 'Marché de Douz et route vers Tembaïne', 'Dunes et source chaude de Huidat Riched', 'Montagne rocheuse d\'El Mida', 'Oasis de Ksar Ghilane', 'Elwat Sbat et piscine d\'eau chaude', 'Retour en 4x4', 'Transfert à l\'aéroport']);
        $c1->setItineraryEn(['Arrival and transfer to Douz', 'Douz market and drive to Tembaïne', 'Dunes and Huidat Riched hot spring', 'Rocky mountain of El Mida', 'Ksar Ghilane oasis', 'Elwat Sbat and hot water pool', 'Return by 4x4', 'Airport transfer']);
        $c1->setItineraryAr(['الوصول والنقل إلى دوز', 'سوق دوز والتوجه نحو تمباين', 'الكثبان وينبوع هويدات ريشد الحار', 'جبل الميدة الصخري', 'واحة قصر غيلان', 'علوة سبات ومسبح المياه الحارة', 'العودة بسيارة الدفع الرباعي', 'النقل إلى المطار']);
        $c1->setItineraryIt(['Arrivo e trasferimento a Douz', 'Mercato di Douz e viaggio verso Tembaïne', 'Dune e sorgente termale di Huidat Riched', 'Montagna rocciosa di El Mida', 'Oasi di Ksar Ghilane', 'Elwat Sbat e piscina di acqua calda', 'Ritorno in 4x4', 'Trasferimento in aeroporto']);

        // Full original multi-sentence text from the document, used in full where the doc provides more than one sentence
        $c1->setItineraryDetailFr([
            "Accueil et assistance à l'aéroport de Djerba ou de Tozeur, transfert à l'hôtel *** à Douz.",
            "Le matin, visite du marché de Douz. Départ avec (4×4) vers « Tembaïne », dîner et logement. « Tembaïne » est un lieu de passage traditionnel tant pour les excursions en dromadaires que pour celles en 4×4 et en moto. Vous pourrez parfois ne pas y être seuls mais ça vaut la peine, c'est un très beau site avec des montagnes d'où l'on domine la région et un puits très profond où vous rencontrerez souvent des nomades.",
            "Marche au milieu des dunes qui s'étalent à l'infini jusqu'à « Huidat Riched », dont la source chaude au milieu des grandes dunes offre une occasion de baignade inoubliable. Où nous pourrons aussi rêver dans le désert sous les étoiles et la lune.",
            "La caravane se déplace vers « El Mida ». Des cordons de dunes, des vallées pour rejoindre « El Mida » (gour signifie montagne). Du haut de cette petite montagne rocheuse vous aurez l'impression de dominer le Sahara ! Il y a aussi un puit où s'abreuvent les troupeaux et près duquel vivent souvent des familles nomades.",
            "Après avoir parcouru une cinquantaine de kilomètres de pistes, quel spectacle : à la porte du Grand Sud Tunisien, sur l'arête Est du Grand Erg Oriental, s'étend l'oasis de « Ksar Ghilane ». La plus méridionale des Oasis de Tunisie, elle est parcourue de séguias alimentés par une source thermale.",
            "Puis, nous continuons notre circuit vers « Elwat Sbat » à quelques kilomètres qui présente l'avantage d'être isolé, beaucoup moins couru que Ksar Ghilane et offre même une petite piscine d'eau chaude. Nous nous installerons là-bas pour passer notre soirée.",
            "Retour en 4×4 à l'hôtel*** à Douz, Djerba ou à Tozeur.",
            "Transfert à l'aéroport à Djerba ou à Tozeur.",
        ]);
        $c1->setItineraryDetailEn([
            "Welcome and assistance at Djerba or Tozeur airport, transfer to the hotel in Douz.",
            "In the morning, visit the Douz market. Departure by 4x4 towards 'Tembaïne', dinner and accommodation. 'Tembaïne' is a traditional crossing point for both camel and 4x4/motorbike excursions. You may sometimes share it with others, but it's worth it — a beautiful site with mountains overlooking the region and a very deep well where you will often meet nomads.",
            "Walk among dunes stretching endlessly to 'Huidat Riched', whose hot spring amid the great dunes offers an unforgettable swimming opportunity. Where we can also dream in the desert under the stars and the moon.",
            "The caravan moves towards 'El Mida'. Rows of dunes and valleys lead to 'El Mida' ('gour' means mountain). From the top of this small rocky mountain, you'll feel like you're overlooking the Sahara! There is also a well where herds drink and where nomadic families often live nearby.",
            "After covering about fifty kilometers of tracks, what a sight: at the gateway to the Great Tunisian South, on the eastern ridge of the Grand Erg Oriental, lies the oasis of 'Ksar Ghilane'. The southernmost oasis in Tunisia, crossed by irrigation channels fed by a thermal spring.",
            "We then continue our circuit towards 'Elwat Sbat' a few kilometers away, which has the advantage of being isolated, much less visited than Ksar Ghilane, and even offers a small hot water pool. We will settle there for the evening.",
            "Return by 4x4 to the hotel in Douz, Djerba, or Tozeur.",
            "Transfer to the airport in Djerba or Tozeur.",
        ]);
        $c1->setItineraryDetailAr([
            "الاستقبال والمساعدة في مطار جربة أو توزر، والنقل إلى الفندق في دوز.",
            "في الصباح، زيارة سوق دوز. الانطلاق بسيارات الدفع الرباعي نحو 'تمباين'، العشاء والمبيت. 'تمباين' هو معبر تقليدي لكل من رحلات الجمال والدفع الرباعي والدراجات النارية. قد لا تكونون وحدكم أحيانًا لكن الأمر يستحق العناء، فهو موقع جميل بجباله المطلة على المنطقة وبئر عميق جدًا حيث ستلتقون غالبًا بالبدو الرحل.",
            "المشي وسط الكثبان الممتدة إلى ما لا نهاية وصولًا إلى 'هويدات ريشد'، حيث يوفر ينبوعها الحار وسط الكثبان الكبيرة فرصة سباحة لا تُنسى. حيث يمكننا أيضًا الحلم في الصحراء تحت النجوم والقمر.",
            "تتحرك القافلة نحو 'الميدة'. سلاسل من الكثبان والوديان للوصول إلى 'الميدة' (كلمة 'قور' تعني الجبل). من قمة هذا الجبل الصخري الصغير، ستشعرون وكأنكم تسيطرون على الصحراء الكبرى! يوجد أيضًا بئر تشرب منه القطعان وغالبًا ما تعيش بالقرب منه عائلات بدوية.",
            "بعد قطع نحو خمسين كيلومترًا من المسالك، يا له من منظر: عند بوابة الجنوب التونسي الكبير، على الحافة الشرقية للعرق الشرقي الكبير، تمتد واحة 'قصر غيلان'. أقصى واحة جنوبية في تونس، تعبرها سواقي تغذيها ينابيع حرارية.",
            "نواصل بعدها جولتنا نحو 'علوة سبات' على بعد بضعة كيلومترات، الذي يتميز بكونه معزولًا وأقل ازدحامًا بكثير من قصر غيلان، بل ويوفر مسبحًا صغيرًا من المياه الحارة. سنستقر هناك لقضاء أمسيتنا.",
            "العودة بسيارة الدفع الرباعي إلى الفندق في دوز أو جربة أو توزر.",
            "النقل إلى المطار في جربة أو توزر.",
        ]);
        $c1->setItineraryDetailIt([
            "Accoglienza e assistenza all'aeroporto di Djerba o Tozeur, trasferimento all'hotel a Douz.",
            "Al mattino, visita al mercato di Douz. Partenza in 4x4 verso 'Tembaïne', cena e pernottamento. 'Tembaïne' è un luogo di passaggio tradizionale sia per le escursioni in dromedario che in 4x4 e in moto. A volte potreste non essere soli, ma ne vale la pena: un sito bellissimo con montagne da cui si domina la regione e un pozzo molto profondo dove spesso si incontrano i nomadi.",
            "Camminata tra le dune che si estendono all'infinito fino a 'Huidat Riched', la cui sorgente termale tra le grandi dune offre un'occasione di bagno indimenticabile. Dove possiamo anche sognare nel deserto sotto le stelle e la luna.",
            "La carovana si sposta verso 'El Mida'. Cordoni di dune e vallate per raggiungere 'El Mida' ('gour' significa montagna). Dalla cima di questa piccola montagna rocciosa avrete l'impressione di dominare il Sahara! C'è anche un pozzo dove si abbeverano le mandrie e vicino al quale spesso vivono famiglie nomadi.",
            "Dopo aver percorso una cinquantina di chilometri di piste, che spettacolo: alla porta del Grande Sud Tunisino, sul crinale orientale del Grande Erg Orientale, si estende l'oasi di 'Ksar Ghilane'. La più meridionale delle oasi della Tunisia, attraversata da canali alimentati da una sorgente termale.",
            "Proseguiamo poi il nostro circuito verso 'Elwat Sbat', a pochi chilometri di distanza, che presenta il vantaggio di essere isolato, molto meno frequentato di Ksar Ghilane, e offre persino una piccola piscina di acqua calda. Ci fermeremo lì per trascorrere la serata.",
            "Ritorno in 4x4 all'hotel a Douz, Djerba o Tozeur.",
            "Trasferimento all'aeroporto di Djerba o Tozeur.",
        ]);

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
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788609964/baroudeurs/service/details/Circuit/3.jpg', 'title' => 'Circuit'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788609943/baroudeurs/service/Douz.jpg', 'title' => 'Douz'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605419/baroudeurs/service/Desert%20Rose.jpg', 'title' => 'Desert Rose'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559533/5_skoo9g.jpg', 'title' => 'Desert Outskirts'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788560647/6_k3qr6o.jpg', 'title' => 'Sahara Trails'],
        ]);

        $c1->setReviewAvatar('t-1.jpg');
        $c1->setReviewName('Thomas Berger');
        $c1->setReviewCountry('Germany');
        $c1->setReviewRating(5);
        $c1->setReviewCommentFr("Huit jours inoubliables dans le Sahara. Les dunes, les sources chaudes et les nuits sous les étoiles ont rendu ce voyage vraiment spécial.");
        $c1->setReviewCommentEn("An unforgettable 8 days in the Sahara. The dunes, the hot springs, and the nights under the stars made this trip truly special.");
        $c1->setReviewCommentAr("ثمانية أيام لا تُنسى في الصحراء الكبرى. الكثبان والينابيع الحارة والليالي تحت النجوم جعلت هذه الرحلة مميزة حقًا.");
        $c1->setReviewCommentIt("Otto giorni indimenticabili nel Sahara. Le dune, le sorgenti termali e le notti sotto le stelle hanno reso questo viaggio davvero speciale.");

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

        $c2->setItinerarySummaryFr("Cette excursion de 2 jours va de la Roman Road et du marché de Tataouine jusqu'au village berbère de Chenini, puis à l'oasis de Ksar Ghilane pour une nuit. Le second jour se poursuit par Matmata, Tamazret, Sidi Idriss et Toujane, avant le retour à l'hôtel.");
        $c2->setItinerarySummaryEn("This 2-day excursion goes from the Roman Road and Tataouine market to the Berber village of Chenini, then to the oasis of Ksar Ghilane for an overnight stay. The second day continues through Matmata, Tamazret, Sidi Idriss, and Toujane, before returning to the hotel.");
        $c2->setItinerarySummaryAr("تنطلق هذه الرحلة التي تستغرق يومين من الطريق الروماني وسوق تطاوين وصولًا إلى قرية شنيني الأمازيغية، ثم إلى واحة قصر غيلان للمبيت. يستمر اليوم الثاني عبر مطماطة وتمزرط وسيدي إدريس وتوجان، قبل العودة إلى الفندق.");
        $c2->setItinerarySummaryIt("Questa escursione di 2 giorni va dalla Roman Road e dal mercato di Tataouine al villaggio berbero di Chenini, poi all'oasi di Ksar Ghilane per il pernottamento. Il secondo giorno prosegue attraverso Matmata, Tamazret, Sidi Idriss e Toujane, prima di tornare in hotel.");

        $c2->setItineraryFr(['Tataouine et oasis de Ksar Ghilane', 'Matmata et villages berbères']);
        $c2->setItineraryEn(['Tataouine and the Ksar Ghilane Oasis', 'Matmata and Berber Villages']);
        $c2->setItineraryAr(['تطاوين وواحة قصر غيلان', 'مطماطة والقرى الأمازيغية']);
        $c2->setItineraryIt(['Tataouine e l\'Oasi di Ksar Ghilane', 'Matmata e i Villaggi Berberi']);

        $c2->setItineraryDetailFr([
            "Vous serez accueilli à votre hôtel pour débuter votre aventure. Nous emprunterons la Roman Road, une digue pittoresque reliant l'île de Djerba au continent. En chemin, nous ferons une pause au lac salé de Chahbania pour profiter de la vue magnifique et prendre quelques photos mémorables. Une fois arrivés, vous aurez l'opportunité de découvrir le marché local, où vous pourrez explorer les différents produits et épices berbères. Nous reprendrons ensuite la route vers Chenini, un village berbère, où un guide local vous fera découvrir son histoire, ses traditions, et son mode de vie. À midi, vous aurez la chance de déguster un repas traditionnel berbère dans l'un des restaurants du village. Après le déjeuner, nous nous dirigerons vers l'Erg, le désert de roches, pour rejoindre l'oasis de Ksar Ghilane, où vous pourrez vous baigner dans le bassin d'eau naturel. Pour ceux qui le souhaitent, il sera possible de sillonner les alentours de l'oasis en quad ou à dos de chameau, moyennant un supplément. Après une journée bien remplie, vous passerez la nuit dans un hébergement local, où vous pourrez profiter de l'ambiance unique du désert.",
            "Le lendemain matin, après un bon petit-déjeuner, nous partirons pour le village de Matmata. À Matmata, vous aurez la chance de rencontrer une famille berbère et de visiter leur habitat troglodyte traditionnel. Nous ferons une pause au village berbère de Tamazret, où vous pourrez déguster un thé aux amandes, une spécialité locale. Ensuite, nous nous rendrons à Sidi Idriss, un hôtel troglodyte célèbre pour avoir été le décor de certaines scènes du film Star Wars. La dernière visite de la journée sera au village berbère de Toujane, caché entre deux montagnes et réputé pour ses tapis faits à la main et son miel. À la fin de cette journée riche en découvertes, vous serez raccompagné à votre hôtel, la tête pleine de souvenirs inoubliables.",
        ]);
        $c2->setItineraryDetailEn([
            "You will be welcomed at your hotel to begin your adventure. We will take the Roman Road, a picturesque causeway linking the island of Djerba to the mainland. Along the way, we will pause at the Chahbania salt lake to enjoy the magnificent view and take some memorable photos. Once there, you'll have the chance to discover the local market, exploring various Berber products and spices. We will then continue to Chenini, a Berber village, where a local guide will introduce you to its history, traditions, and way of life. At midday, you'll enjoy a traditional Berber meal at one of the village restaurants. After lunch, we head to the Erg, the rocky desert, to reach the oasis of Ksar Ghilane, where you can swim in the natural pool. For those who wish, it will be possible to explore the oasis surroundings by quad bike or camel, for an extra fee. After a full day, you'll spend the night in local accommodation, enjoying the unique desert atmosphere.",
            "The next morning, after a good breakfast, we will set off for the village of Matmata. In Matmata, you'll have the chance to meet a Berber family and visit their traditional troglodyte home. We will stop in the Berber village of Tamazret, where you can enjoy an almond tea, a local specialty. Next, we head to Sidi Idriss, a troglodyte hotel famous for being the set of scenes from the Star Wars film. The day's last visit will be to the Berber village of Toujane, tucked between two mountains and known for its handmade carpets and honey. At the end of this discovery-filled day, you'll be taken back to your hotel, full of unforgettable memories.",
        ]);
        $c2->setItineraryDetailAr([
            "سيتم استقبالكم في فندقكم لبدء مغامرتكم. سنسلك الطريق الروماني، وهو جسر جميل يربط جزيرة جربة بالقارة. في الطريق، سنتوقف عند بحيرة الشحبانية المالحة للاستمتاع بالمنظر الرائع والتقاط بعض الصور التذكارية. بمجرد الوصول، ستتاح لكم فرصة اكتشاف السوق المحلي، حيث يمكنكم استكشاف مختلف المنتجات والتوابل الأمازيغية. سنواصل بعدها إلى شنيني، وهي قرية أمازيغية، حيث سيقدم لكم مرشد محلي تاريخها وتقاليدها وأسلوب حياتها. عند الظهيرة، ستستمتعون بوجبة أمازيغية تقليدية في أحد مطاعم القرية. بعد الغداء، سنتجه نحو العرق، صحراء الصخور، للوصول إلى واحة قصر غيلان، حيث يمكنكم السباحة في الحوض الطبيعي. لمن يرغب، يمكن استكشاف محيط الواحة بالدراجة الرباعية أو على ظهر الجمل مقابل رسوم إضافية. بعد يوم حافل، ستقضون الليلة في إقامة محلية، مستمتعين بأجواء الصحراء الفريدة.",
            "في صباح اليوم التالي، وبعد فطور شهي، سننطلق نحو قرية مطماطة. في مطماطة، ستتاح لكم فرصة لقاء عائلة أمازيغية وزيارة مسكنهم الكهفي التقليدي. سنتوقف في قرية تمزرط الأمازيغية، حيث يمكنكم تذوق شاي باللوز، وهو طبق محلي خاص. بعدها، سنتوجه إلى سيدي إدريس، وهو فندق كهفي مشهور بكونه موقع تصوير مشاهد من ستار وورز. ستكون الزيارة الأخيرة لليوم إلى قرية توجان الأمازيغية، المختبئة بين جبلين والمشهورة بسجادها اليدوي وعسلها. في نهاية هذا اليوم الحافل بالاكتشافات، سيتم إرجاعكم إلى فندقكم، مليئين بذكريات لا تُنسى.",
        ]);
        $c2->setItineraryDetailIt([
            "Sarete accolti nel vostro hotel per iniziare la vostra avventura. Percorreremo la Roman Road, una pittoresca diga che collega l'isola di Djerba alla terraferma. Lungo il percorso, faremo una sosta al lago salato di Chahbania per ammirare il magnifico paesaggio e scattare foto memorabili. Una volta arrivati, avrete l'opportunità di scoprire il mercato locale, esplorando diversi prodotti e spezie berbere. Proseguiremo poi verso Chenini, un villaggio berbero, dove una guida locale vi farà scoprire la sua storia, le sue tradizioni e il suo modo di vivere. A mezzogiorno, gusterete un pasto tradizionale berbero in uno dei ristoranti del villaggio. Dopo pranzo, ci dirigeremo verso l'Erg, il deserto di roccia, per raggiungere l'oasi di Ksar Ghilane, dove potrete fare il bagno nella piscina naturale. Per chi lo desidera, sarà possibile esplorare i dintorni dell'oasi in quad o in dromedario, con un supplemento. Dopo una giornata intensa, trascorrerete la notte in un alloggio locale, godendo dell'atmosfera unica del deserto.",
            "La mattina seguente, dopo una buona colazione, partiremo per il villaggio di Matmata. A Matmata, avrete la possibilità di incontrare una famiglia berbera e visitare la loro tradizionale abitazione trogloditica. Faremo una sosta nel villaggio berbero di Tamazret, dove potrete gustare un tè alle mandorle, una specialità locale. Successivamente, ci recheremo a Sidi Idriss, un hotel trogloditico famoso per essere stato il set di scene del film Star Wars. L'ultima visita della giornata sarà al villaggio berbero di Toujane, nascosto tra due montagne e noto per i suoi tappeti fatti a mano e il suo miele. Alla fine di questa giornata ricca di scoperte, sarete riaccompagnati al vostro hotel, con la testa piena di ricordi indimenticabili.",
        ]);

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
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1789039783/baroudeurs/excursions/metnj7iunp5pitmdmeei.jpg', 'title' => 'Desert Horizon'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788609984/baroudeurs/service/details/Baroudeurs/5.jpg', 'title' => 'Baroudeurs'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788609892/baroudeurs/service/details/Temba%C3%AFne/3.jpg', 'title' => 'Tembaïne'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608952/baroudeurs/service/details/Baroudeurs/1.jpg', 'title' => 'Baroudeurs'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608074/baroudeurs/service/details/Charm/5.jpg', 'title' => 'Charm'],
        ]);

        $c2->setReviewAvatar('t-3.jpg');
        $c2->setReviewName('Sophie Martin');
        $c2->setReviewCountry('France');
        $c2->setReviewRating(5);
        $c2->setReviewCommentFr("Ksar Ghilane de nuit était magique. Deux jours remplis de culture, d'histoire et de la plus belle oasis du désert que j'aie jamais vue.");
        $c2->setReviewCommentEn("Ksar Ghilane at night was magical. Two days packed with culture, history, and the most beautiful desert oasis I've ever seen.");
        $c2->setReviewCommentAr("كان قصر غيلان ليلاً ساحرًا. يومان مليئان بالثقافة والتاريخ وأجمل واحة صحراوية رأيتها في حياتي.");
        $c2->setReviewCommentIt("Ksar Ghilane di notte era magica. Due giorni pieni di cultura, storia e la più bella oasi del deserto che abbia mai visto.");

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

        $c3->setItinerarySummaryFr("Cette excursion d'une journée suit la Roman Road historique jusqu'au lac salé de Chahbania, au marché de Tataouine et au village troglodyte de Chenini. La journée se termine au ksar Hadada, célèbre décor de Star Wars, avant le retour à l'hôtel.");
        $c3->setItinerarySummaryEn("This single-day excursion follows the historic Roman Road to the Chahbania salt lake, the Tataouine market, and the troglodyte village of Chenini. The day ends at Ksar Hadada, the famous Star Wars filming location, before returning to your hotel.");
        $c3->setItinerarySummaryAr("تتبع هذه الرحلة التي تستغرق يومًا واحدًا الطريق الروماني التاريخي وصولًا إلى بحيرة الشحبانية المالحة وسوق تطاوين وقرية شنيني الكهفية. ينتهي اليوم في قصر حدادة، الموقع الشهير لتصوير ستار وورز، قبل العودة إلى الفندق.");
        $c3->setItinerarySummaryIt("Questa escursione di un giorno segue la storica Roman Road fino al lago salato di Chahbania, al mercato di Tataouine e al villaggio trogloditico di Chenini. La giornata si conclude al ksar Hadada, famoso set di Star Wars, prima del ritorno in hotel.");

        $c3->setItineraryFr(['Roman Road et lac de Chahbania', 'Marché de Tataouine et Chenini', 'Ksar Hadada et retour']);
        $c3->setItineraryEn(['Roman Road and Chahbania Lake', 'Tataouine Market and Chenini', 'Ksar Hadada and Return']);
        $c3->setItineraryAr(['الطريق الروماني وبحيرة الشحبانية', 'سوق تطاوين وشنيني', 'قصر حدادة والعودة']);
        $c3->setItineraryIt(['Roman Road e Lago di Chahbania', 'Mercato di Tataouine e Chenini', 'Ksar Hadada e Ritorno']);

        $c3->setItineraryDetailFr([
            "Votre aventure commence par un départ matinal de votre hôtel, vous mettant dans l'ambiance pour une journée remplie de découvertes. En chemin vers Tataouine, vous traverserez la Roman Road, un vestige historique qui relie l'île à l'Afrique continentale. Votre première halte sera au lac salé de Chahbania, où les reflets du soleil sur l'eau créent des panoramas époustouflants.",
            "Vous vous aventurerez ensuite dans les rues animées du marché de Tataouine pour explorer les produits locaux et les épices berbères. Vous continuerez votre journée en visitant le village de Chenini, célèbre pour ses maisons troglodytes et son architecture berbère, accompagné d'un guide local. À midi, vous aurez le plaisir de déguster un repas traditionnel berbère dans un restaurant local.",
            "Après le déjeuner, vous vous dirigerez vers le ksar Hadada, un site emblématique qui a servi de décor pour le film Star Wars. À la fin de cette journée bien remplie, vous serez raccompagné à votre hôtel, riche de souvenirs inoubliables.",
        ]);
        $c3->setItineraryDetailEn([
            "Your adventure begins with an early morning departure from your hotel, setting the mood for a day full of discoveries. On the way to Tataouine, you'll cross the Roman Road, a historic causeway linking the island to mainland Africa. Your first stop will be at the Chahbania salt lake, where the sun's reflections on the water create breathtaking views.",
            "You'll then venture into the lively streets of the Tataouine market to explore local products and Berber spices. You'll continue your day with a visit to the village of Chenini, famous for its troglodyte houses and Berber architecture, accompanied by a local guide. At midday, you'll enjoy a traditional Berber meal at a local restaurant.",
            "After lunch, you'll head to Ksar Hadada, an iconic site that served as a set for the Star Wars film. At the end of this full day, you'll be taken back to your hotel, full of unforgettable memories.",
        ]);
        $c3->setItineraryDetailAr([
            "تبدأ مغامرتكم بانطلاقة صباحية من فندقكم، لتضعكم في أجواء يوم حافل بالاكتشافات. في الطريق نحو تطاوين، ستعبرون الطريق الروماني، وهو أثر تاريخي يربط الجزيرة بالقارة الأفريقية. ستكون محطتكم الأولى عند بحيرة الشحبانية المالحة، حيث تخلق انعكاسات الشمس على الماء مناظر خلابة.",
            "ستغامرون بعدها في شوارع سوق تطاوين النابضة بالحياة لاستكشاف المنتجات المحلية والتوابل الأمازيغية. ستواصلون يومكم بزيارة قرية شنيني، المشهورة بمنازلها الكهفية وهندستها الأمازيغية، برفقة مرشد محلي. عند الظهيرة، ستستمتعون بوجبة أمازيغية تقليدية في مطعم محلي.",
            "بعد الغداء، ستتوجهون نحو قصر حدادة، وهو موقع رمزي كان مسرحًا لتصوير فيلم ستار وورز. في نهاية هذا اليوم الحافل، سيتم إرجاعكم إلى فندقكم، مليئين بذكريات لا تُنسى.",
        ]);
        $c3->setItineraryDetailIt([
            "La vostra avventura inizia con una partenza mattutina dal vostro hotel, dando il via a una giornata ricca di scoperte. Sulla strada verso Tataouine, attraverserete la Roman Road, un vestigio storico che collega l'isola al continente africano. La vostra prima tappa sarà al lago salato di Chahbania, dove i riflessi del sole sull'acqua creano panorami mozzafiato.",
            "Vi avventurerete poi nelle vivaci strade del mercato di Tataouine per esplorare i prodotti locali e le spezie berbere. Continuerete la giornata visitando il villaggio di Chenini, famoso per le sue case trogloditiche e la sua architettura berbera, accompagnati da una guida locale. A mezzogiorno, gusterete un pasto tradizionale berbero in un ristorante locale.",
            "Dopo pranzo, vi dirigerete verso il ksar Hadada, un sito emblematico che ha fatto da set per il film Star Wars. Alla fine di questa giornata intensa, sarete riaccompagnati al vostro hotel, ricchi di ricordi indimenticabili.",
        ]);

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
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607423/baroudeurs/service/Endless.jpg', 'title' => 'Endless'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605281/baroudeurs/service/details/Tataouine/8.jpg', 'title' => 'Tataouine'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605279/baroudeurs/service/details/Tataouine/7.jpg', 'title' => 'Tataouine'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605266/baroudeurs/service/details/Tataouine/2.jpg', 'title' => 'Tataouine'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605262/baroudeurs/service/details/Tataouine/1.jpg', 'title' => 'Tataouine'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605274/baroudeurs/service/details/Tataouine/4.webp', 'title' => 'Tataouine'],
        ]);

        $c3->setReviewAvatar('t-5.jpg');
        $c3->setReviewName('James Carter');
        $c3->setReviewCountry('United Kingdom');
        $c3->setReviewRating(4);
        $c3->setReviewCommentFr("Une journée parfaite. Chenini et le décor de Star Wars à Ksar Hadada étaient les points forts. Très bien organisé du début à la fin.");
        $c3->setReviewCommentEn("A perfect day trip. Chenini and the Star Wars set at Ksar Hadada were the highlights. Very well organized from start to finish.");
        $c3->setReviewCommentAr("رحلة يوم واحد مثالية. كانت شنيني وموقع تصوير ستار وورز في قصر حدادة أبرز اللحظات. تنظيم ممتاز من البداية إلى النهاية.");
        $c3->setReviewCommentIt("Una gita perfetta. Chenini e il set di Star Wars a Ksar Hadada sono stati i momenti salienti. Molto ben organizzato dall'inizio alla fine.");

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

        $c4->setItinerarySummaryFr("Ce tour de 8 jours part de Djerba pour traverser Tataouine, Chenini et Ksar Ghilane, puis Douz, Nefta et Tozeur. Il se poursuit à travers les oasis de montagne, le train Lézard Rouge, le Chott El Jerid et les villages troglodytes de Matmata et Toujane, avant de revenir à Djerba.");
        $c4->setItinerarySummaryEn("This 8-day tour moves from Djerba through Tataouine, Chenini, and Ksar Ghilane, then on to Douz, Nefta, and Tozeur. It continues through the mountain oases, the Red Lizard train, Chott El Jerid, and the troglodyte villages of Matmata and Toujane, before returning to Djerba.");
        $c4->setItinerarySummaryAr("تنطلق هذه الجولة التي تستغرق 8 أيام من جربة عبر تطاوين وشنيني وقصر غيلان، ثم دوز ونفطة وتوزر. تتواصل عبر واحات الجبال وقطار السحلية الحمراء وشط الجريد وقريتي مطماطة وتوجان الكهفيتين، قبل العودة إلى جربة.");
        $c4->setItinerarySummaryIt("Questo tour di 8 giorni parte da Djerba attraversando Tataouine, Chenini e Ksar Ghilane, poi Douz, Nefta e Tozeur. Prosegue attraverso le oasi di montagna, il treno Lucertola Rossa, il Chott El Jerid e i villaggi trogloditici di Matmata e Toujane, prima di tornare a Djerba.");

        $c4->setItineraryFr(['Arrivée à Djerba', 'Tataouine, Chenini et Ksar Ghilane', 'Ksar Ghilane à Douz', 'Douz, Nefta et Tozeur', 'Oasis de montagne', 'Lézard Rouge et Matmata', 'Matmata, Toujane et Djerba', 'Départ']);
        $c4->setItineraryEn(['Arrival in Djerba', 'Tataouine, Chenini and Ksar Ghilane', 'Ksar Ghilane to Douz', 'Douz, Nefta and Tozeur', 'Mountain oases', 'Red Lizard train and Matmata', 'Matmata, Toujane and Djerba', 'Departure']);
        $c4->setItineraryAr(['الوصول إلى جربة', 'تطاوين وشنيني وقصر غيلان', 'قصر غيلان إلى دوز', 'دوز ونفطة وتوزر', 'واحات الجبل', 'قطار السحلية الحمراء ومطماطة', 'مطماطة وتوجان وجربة', 'المغادرة']);
        $c4->setItineraryIt(['Arrivo a Djerba', 'Tataouine, Chenini e Ksar Ghilane', 'Da Ksar Ghilane a Douz', 'Douz, Nefta e Tozeur', 'Oasi di montagna', 'Treno Lucertola Rossa e Matmata', 'Matmata, Toujane e Djerba', 'Partenza']);

        // Full original multi-sentence text from the document, used in full
        $c4->setItineraryDetailFr([
            "Bienvenue au cœur de la Tunisie ! Vous serez chaleureusement accueilli à l'aéroport de Djerba, puis transféré vers un hôtel 3* confortable où vous passerez une première nuit en demi-pension. Un moment parfait pour vous détendre et vous imprégner des premiers charmes de l'île.",
            "L'évasion commence. Après un petit déjeuner énergisant, votre aventure prend son envol. En empruntant la célèbre chaussée romaine, nous vous emmènerons à Tataouine. En chemin, nous nous arrêterons à des endroits enchanteurs, avec une visite incontournable du Ksar Hadada, un lieu mythique où ont été tournées des scènes de Star Wars. Ensuite, découvrez l'authentique marché de Tataouine avant de savourer un déjeuner traditionnel. L'après-midi sera consacré à la découverte du village berbère de Chenini, un véritable bijou troglodyte perché dans les montagnes. Enfin, cap sur Ksar Ghilane, aux portes du désert. Vous y profiterez de ses sources d'eau chaude et, pourquoi pas, d'une balade inoubliable à dos de dromadaire avant de dîner sous un ciel étoilé, au cœur de la majesté du Sahara.",
            "La porte du désert. Départ pour Douz, la porte du désert, où vous pourrez flâner dans le marché local et découvrir ses oasis. L'après-midi, optez pour une nouvelle randonnée à dos de dromadaire ou offrez-vous un moment de détente dans un hammam traditionnel (en option). Vous passerez la nuit à l'hôtel, à Douz, dans un cadre typiquement tunisien.",
            "Escapade vers les oasis secrètes. Nous partons tôt pour Nefta, en traversant des paysages spectaculaires. À Nefta, flânez dans la « corbeille de palmiers » et laissez-vous envoûter par les palmiers centenaires. Après un déjeuner savoureux, nous poursuivrons vers Tozeur, célèbre pour son architecture en briques et ses maisons chaleureuses au cœur du désert. Nuit à l'hôtel 3*.",
            "La magie des montagnes. Aujourd'hui, nous explorerons les trois magnifiques oasis de montagne : Chebika, Tamerza et Mides. Ces paysages fascinants vous couperont le souffle. L'après-midi, vous découvrirez le processus de fabrication traditionnelle de briques à Tozeur, une démonstration passionnante. Dîner et nuit à l'hôtel.",
            "Un voyage à travers le temps. Prenez place à bord du mythique Lézard Rouge, un train d'époque, et laissez-vous transporter à travers les gorges de Selja. Une pause au Chott El Jerid vous permettra d'admirer les mirages et les roses des sables, phénomène unique au monde. Après avoir visité les dunes pétrifiées de Bechri, direction Tamezret, un village berbère pittoresque, avant d'arriver à Matmata, où vous passerez la nuit dans un hôtel au confort chaleureux.",
            "Un retour aux sources. Découvrez l'incroyable architecture troglodytique de Matmata, où les habitants se sont adaptés à la chaleur en creusant leurs habitations sous terre. Continuez votre exploration avec une visite du village de Toujane, où les montagnes semblent se fondre dans les habitations. Sur le chemin du retour à Djerba, nous ferons une halte au village des potiers de Guellala, avant de vous offrir un déjeuner à Houmt Souk. Vous aurez aussi l'opportunité de rapporter un souvenir artisanal de l'île, que ce soit des tapis ou des objets d'artisanat locaux.",
            "À bientôt, la magie du désert ! Après un dernier petit déjeuner à Djerba, transfert vers l'aéroport pour votre vol de retour, le cœur rempli de souvenirs inoubliables de ce voyage au cœur du désert tunisien.",
        ]);
        $c4->setItineraryDetailEn([
            "Welcome to the heart of Tunisia! You'll be warmly welcomed at Djerba airport, then transferred to a comfortable 3-star hotel where you'll spend your first night on half-board. A perfect moment to relax and soak up the island's first charms.",
            "The escape begins. After an energizing breakfast, your adventure takes flight. Taking the famous Roman causeway, we'll bring you to Tataouine. Along the way, we'll stop at enchanting spots, with a must-see visit to Ksar Hadada, a legendary place where scenes from Star Wars were filmed. Next, discover the authentic Tataouine market before enjoying a traditional lunch. The afternoon will be devoted to exploring the Berber village of Chenini, a true troglodyte gem perched in the mountains. Finally, head to Ksar Ghilane, at the desert's edge. There you'll enjoy its hot springs and, why not, an unforgettable camel ride before dining under a starry sky, in the heart of the Sahara's majesty.",
            "The gateway to the desert. Departure for Douz, the gateway to the desert, where you can stroll through the local market and discover its oases. In the afternoon, choose another camel ride or treat yourself to a relaxing moment in a traditional hammam (optional). You'll spend the night at the hotel in Douz, in a typically Tunisian setting.",
            "Escape to secret oases. We leave early for Nefta, crossing spectacular landscapes. In Nefta, wander through the 'basket of palm trees' and let yourself be captivated by the century-old palms. After a tasty lunch, we continue to Tozeur, famous for its brick architecture and warm houses at the heart of the desert. Night at the 3-star hotel.",
            "The magic of the mountains. Today, we'll explore the three magnificent mountain oases: Chebika, Tamerza, and Mides. These fascinating landscapes will take your breath away. In the afternoon, you'll discover the traditional brick-making process in Tozeur, a fascinating demonstration. Dinner and night at the hotel.",
            "A journey through time. Board the legendary Red Lizard, a vintage train, and let yourself be carried through the Selja gorges. A stop at Chott El Jerid will let you admire the mirages and desert roses, a phenomenon unique in the world. After visiting the petrified dunes of Bechri, we head to Tamezret, a picturesque Berber village, before arriving in Matmata, where you'll spend the night in a warmly comfortable hotel.",
            "A return to the roots. Discover the incredible troglodyte architecture of Matmata, where the inhabitants adapted to the heat by digging their homes underground. Continue your exploration with a visit to the village of Toujane, where the mountains seem to blend into the dwellings. On the way back to Djerba, we'll stop at the potters' village of Guellala, before treating you to lunch in Houmt Souk. You'll also have the opportunity to bring back a handcrafted souvenir from the island, whether carpets or local craft items.",
            "See you soon, magic of the desert! After one last breakfast in Djerba, transfer to the airport for your return flight, your heart full of unforgettable memories of this journey into the Tunisian desert.",
        ]);
        $c4->setItineraryDetailAr([
            "مرحبًا بكم في قلب تونس! سيتم استقبالكم بحرارة في مطار جربة، ثم نقلكم إلى فندق مريح 3 نجوم حيث ستقضون ليلتكم الأولى بنظام نصف إقامة. لحظة مثالية للاسترخاء والانغماس في سحر الجزيرة الأول.",
            "تبدأ الهروب. بعد فطور منشط، تنطلق مغامرتكم. بسلوك الطريق الروماني الشهير، سنأخذكم إلى تطاوين. في الطريق، سنتوقف في أماكن ساحرة، مع زيارة لا بد منها لقصر حدادة، وهو موقع أسطوري تم فيه تصوير مشاهد من ستار وورز. بعدها، اكتشفوا سوق تطاوين الأصيل قبل تناول غداء تقليدي. سيُخصص بعد الظهر لاكتشاف قرية شنيني الأمازيغية، وهي جوهرة كهفية حقيقية تتربع على الجبال. أخيرًا، التوجه نحو قصر غيلان، على أبواب الصحراء. ستستمتعون هناك بينابيعها الحارة، ولم لا، بجولة لا تُنسى على ظهر الجمل قبل تناول العشاء تحت سماء مرصعة بالنجوم، في قلب عظمة الصحراء.",
            "بوابة الصحراء. الانطلاق نحو دوز، بوابة الصحراء، حيث يمكنكم التجول في السوق المحلي واكتشاف واحاتها. بعد الظهر، اختاروا جولة أخرى على ظهر الجمل أو امنحوا أنفسكم لحظة استرخاء في حمام تقليدي (اختياري). ستقضون الليلة في الفندق بدوز، في أجواء تونسية أصيلة.",
            "هروب نحو الواحات السرية. ننطلق باكرًا نحو نفطة، عبر مناظر طبيعية مذهلة. في نفطة، تجولوا في 'سلة النخيل' ودعوا أنفسكم تنبهرون بالنخيل المعمر. بعد غداء لذيذ، سنواصل نحو توزر، المشهورة بهندستها المعمارية من الطوب ومنازلها الدافئة في قلب الصحراء. ليلة في فندق 3 نجوم.",
            "سحر الجبال. اليوم، سنستكشف الواحات الجبلية الثلاث الرائعة: شبيقة وتمغزة وميدس. ستأخذ هذه المناظر الساحرة أنفاسكم. بعد الظهر، ستكتشفون طريقة صنع الطوب التقليدية في توزر، وهو عرض مثير. العشاء والمبيت في الفندق.",
            "رحلة عبر الزمن. اصعدوا على متن قطار السحلية الحمراء الأسطوري، وهو قطار قديم، ودعوا أنفسكم تنتقلون عبر أخاديد سلجة. سيتيح لكم التوقف عند شط الجريد الإعجاب بالسراب وورود الرمال، وهي ظاهرة فريدة في العالم. بعد زيارة الكثبان المتحجرة في بشري، التوجه نحو تمزرط، وهي قرية أمازيغية جميلة، قبل الوصول إلى مطماطة، حيث ستقضون الليلة في فندق دافئ ومريح.",
            "عودة إلى الجذور. اكتشفوا الهندسة الكهفية المذهلة لمطماطة، حيث تكيف السكان مع الحرارة بحفر مساكنهم تحت الأرض. واصلوا استكشافكم بزيارة قرية توجان، حيث تبدو الجبال وكأنها تندمج مع المساكن. في طريق العودة إلى جربة، سنتوقف في قرية الفخارين بقلالة، قبل تقديم غداء لكم في حومة السوق. ستتاح لكم أيضًا فرصة اقتناء تذكار حرفي من الجزيرة، سواء كان سجادًا أو منتجات حرفية محلية.",
            "إلى اللقاء، سحر الصحراء! بعد فطور أخير في جربة، النقل إلى المطار لرحلة عودتكم، وقلوبكم مليئة بذكريات لا تُنسى من هذه الرحلة في قلب الصحراء التونسية.",
        ]);
        $c4->setItineraryDetailIt([
            "Benvenuti nel cuore della Tunisia! Sarete accolti calorosamente all'aeroporto di Djerba, poi trasferiti in un confortevole hotel 3 stelle dove trascorrerete la prima notte in mezza pensione. Un momento perfetto per rilassarvi e assaporare i primi fascini dell'isola.",
            "L'evasione inizia. Dopo una colazione energizzante, la vostra avventura prende il volo. Percorrendo la famosa strada romana, vi porteremo a Tataouine. Lungo il percorso, ci fermeremo in luoghi incantevoli, con una visita imperdibile a Ksar Hadada, un luogo leggendario dove sono state girate scene di Star Wars. Poi, scoprite l'autentico mercato di Tataouine prima di gustare un pranzo tradizionale. Il pomeriggio sarà dedicato alla scoperta del villaggio berbero di Chenini, un vero gioiello trogloditico arroccato sulle montagne. Infine, rotta su Ksar Ghilane, alle porte del deserto. Qui potrete godervi le sue sorgenti termali e, perché no, un'indimenticabile passeggiata in dromedario prima di cenare sotto un cielo stellato, nel cuore della maestosità del Sahara.",
            "La porta del deserto. Partenza per Douz, la porta del deserto, dove potrete passeggiare nel mercato locale e scoprire le sue oasi. Nel pomeriggio, optate per un'altra escursione in dromedario o concedetevi un momento di relax in un hammam tradizionale (opzionale). Trascorrerete la notte in hotel a Douz, in un'ambientazione tipicamente tunisina.",
            "Fuga verso le oasi segrete. Partiamo presto per Nefta, attraversando paesaggi spettacolari. A Nefta, passeggiate nel 'cesto di palme' e lasciatevi incantare dalle palme secolari. Dopo un pranzo gustoso, proseguiremo verso Tozeur, famosa per la sua architettura in mattoni e le sue calde case nel cuore del deserto. Notte in hotel 3 stelle.",
            "La magia delle montagne. Oggi esploreremo le tre magnifiche oasi di montagna: Chebika, Tamerza e Mides. Questi paesaggi affascinanti vi toglieranno il fiato. Nel pomeriggio, scoprirete il tradizionale processo di fabbricazione dei mattoni a Tozeur, una dimostrazione appassionante. Cena e notte in hotel.",
            "Un viaggio nel tempo. Salite a bordo del leggendario Lucertola Rossa, un treno d'epoca, e lasciatevi trasportare attraverso le gole di Selja. Una sosta al Chott El Jerid vi permetterà di ammirare i miraggi e le rose del deserto, un fenomeno unico al mondo. Dopo aver visitato le dune pietrificate di Bechri, direzione Tamezret, un pittoresco villaggio berbero, prima di arrivare a Matmata, dove trascorrerete la notte in un hotel dal confort caloroso.",
            "Un ritorno alle origini. Scoprite l'incredibile architettura trogloditica di Matmata, dove gli abitanti si sono adattati al caldo scavando le loro abitazioni sottoterra. Continuate la vostra esplorazione con una visita al villaggio di Toujane, dove le montagne sembrano fondersi con le abitazioni. Sulla via del ritorno a Djerba, faremo una sosta al villaggio dei vasai di Guellala, prima di offrirvi un pranzo a Houmt Souk. Avrete anche l'opportunità di portare a casa un souvenir artigianale dell'isola, che si tratti di tappeti o oggetti di artigianato locale.",
            "A presto, magia del deserto! Dopo un'ultima colazione a Djerba, trasferimento in aeroporto per il volo di ritorno, con il cuore pieno di ricordi indimenticabili di questo viaggio nel cuore del deserto tunisino.",
        ]);

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
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608078/baroudeurs/service/details/Charm/6.jpg', 'title' => 'Charm'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607595/baroudeurs/service/details/Endless/2.jpg', 'title' => 'Endless'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605755/baroudeurs/service/details/Rose/4.jpg', 'title' => 'Rose'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559711/8_gyuz3p.jpg', 'title' => 'Golden Dunes'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608876/baroudeurs/service/details/Circuit/6.jpg', 'title' => 'Circuit'],
        ]);

        $c4->setReviewAvatar('t-7.jpg');
        $c4->setReviewName('Laura Rossi');
        $c4->setReviewCountry('Italy');
        $c4->setReviewRating(5);
        $c4->setReviewCommentFr("Huit jours incroyables à travers le sud tunisien. Le train Lézard Rouge et les villages troglodytes étaient uniques en leur genre.");
        $c4->setReviewCommentEn("Eight incredible days across southern Tunisia. The Red Lizard train and the troglodyte villages were unlike anything I've experienced.");
        $c4->setReviewCommentAr("ثمانية أيام رائعة عبر جنوب تونس. كان قطار السحلية الحمراء والقرى الكهفية تجربة لا مثيل لها.");
        $c4->setReviewCommentIt("Otto giorni incredibili nel sud della Tunisia. Il treno Lucertola Rossa e i villaggi trogloditici sono stati un'esperienza unica.");

        $manager->persist($c4);

        $manager->flush();
    }
}
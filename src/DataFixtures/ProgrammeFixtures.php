<?php

namespace App\DataFixtures;

use App\Entity\Programme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgrammeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ============ PROGRAMME 1: Circuit Désert 8 jours ============
        $p1 = new Programme();
        $p1->setTitle('Circuit 4x4 - Sahara de Douz');
        $p1->setDescription('Une aventure de 8 jours en 4x4 à travers le Sahara tunisien');
        $p1->setImage('Circuit Douz1.jpg');
        $p1->setDuree('8 jours / 7 nuits');
        $p1->setEnter('Douz, Ksar Ghilane');

        $p1->setTitleFr('Circuit Désert 8 Jours');
        $p1->setTitleEn('8-Day Desert Circuit');
        $p1->setTitleAr('رحلة الصحراء 8 أيام');
        $p1->setTitleIt('Circuito nel Deserto 8 Giorni');

        $p1->setDescriptionFr(
            "4ème jour : La caravane se déplace vers « El Mida ». Des cordons de dunes, des vallées pour rejoindre « El Mida » (gour signifie montagne). Du haut de cette petite montagne rocheuse vous aurez l'impression de dominer le Sahara !\n\n" .
            "5ème jour : Après avoir parcouru une cinquantaine de kilomètres de pistes, quel spectacle : à la porte du Grand Sud Tunisien, sur l'arête Est du Grand Erg Oriental, s'étend l'oasis de « Ksar Ghilane ». La plus méridionale des Oasis de Tunisie, elle est parcourue de séguias alimentés par une source thermale.\n\n" .
            "6ème jour : Puis, nous continuons notre circuit vers « Elwat Sbat » à quelques kilomètres, qui présente l'avantage d'être isolé, beaucoup moins couru que Ksar Ghilane et offre même une petite piscine d'eau chaude.\n\n" .
            "7ème jour : Retour en 4×4 à l'hôtel à Douz, Djerba ou à Tozeur.\n\n" .
            "8ème jour : Transfert à l'aéroport à Djerba ou à Tozeur."
        );
        $p1->setDescriptionEn(
            "Day 4: The caravan moves towards 'El Mida'. Rows of dunes, valleys to reach 'El Mida' (gour means mountain). From the top of this small rocky mountain, you will feel like you are dominating the Sahara!\n\n" .
            "Day 5: After covering about fifty kilometers of tracks, what a spectacle: at the gateway to the Great Tunisian South, on the eastern ridge of the Grand Erg Oriental, lies the oasis of 'Ksar Ghilane'. The southernmost oasis in Tunisia, it is crossed by irrigation channels fed by a thermal spring.\n\n" .
            "Day 6: We then continue our circuit towards 'Elwat Sbat', a few kilometers away, which has the advantage of being isolated, much less frequented than Ksar Ghilane, and even offers a small hot water pool.\n\n" .
            "Day 7: Return by 4x4 to the hotel in Douz, Djerba or Tozeur.\n\n" .
            "Day 8: Transfer to Djerba or Tozeur airport."
        );
        $p1->setDescriptionAr(
            "اليوم الرابع: تتحرك القافلة نحو 'الميدة'. سلاسل من الكثبان والوديان للوصول إلى 'الميدة' (كلمة 'قور' تعني الجبل). من قمة هذا الجبل الصخري الصغير، ستشعرون وكأنكم تسيطرون على الصحراء الكبرى!\n\n" .
            "اليوم الخامس: بعد قطع نحو خمسين كيلومترًا من المسالك، يا له من منظر: عند بوابة الجنوب التونسي الكبير، على الحافة الشرقية للعرق الشرقي الكبير، تمتد واحة 'قصر غيلان'. أقصى واحة جنوبية في تونس، تعبرها سواقي تغذيها ينابيع حرارية.\n\n" .
            "اليوم السادس: نواصل بعدها جولتنا نحو 'علوة سبات' على بعد بضعة كيلومترات، الذي يتميز بكونه معزولًا وأقل ازدحامًا بكثير من قصر غيلان، بل ويوفر مسبحًا صغيرًا من المياه الحارة.\n\n" .
            "اليوم السابع: العودة بسيارة الدفع الرباعي إلى الفندق بدوز أو جربة أو توزر.\n\n" .
            "اليوم الثامن: النقل إلى مطار جربة أو توزر."
        );
        $p1->setDescriptionIt(
            "Giorno 4: La carovana si sposta verso 'El Mida'. Cordoni di dune, vallate per raggiungere 'El Mida' (gour significa montagna). Dalla cima di questa piccola montagna rocciosa avrete l'impressione di dominare il Sahara!\n\n" .
            "Giorno 5: Dopo aver percorso una cinquantina di chilometri di piste, che spettacolo: alla porta del Grande Sud Tunisino, sul crinale orientale del Grande Erg Orientale, si estende l'oasi di 'Ksar Ghilane'. La più meridionale delle oasi della Tunisia, è attraversata da canali alimentati da una sorgente termale.\n\n" .
            "Giorno 6: Proseguiamo poi il nostro circuito verso 'Elwat Sbat', a pochi chilometri di distanza, che presenta il vantaggio di essere isolato, molto meno frequentato di Ksar Ghilane, e offre persino una piccola piscina di acqua calda.\n\n" .
            "Giorno 7: Ritorno in 4x4 all'hotel a Douz, Djerba o Tozeur.\n\n" .
            "Giorno 8: Trasferimento all'aeroporto di Djerba o Tozeur."
        );

        $p1->setDureeFr('8 jours / 7 nuits');
        $p1->setDureeEn('8 days / 7 nights');
        $p1->setDureeAr('8 أيام / 7 ليال');
        $p1->setDureeIt('8 giorni / 7 notti');

        $p1->setPrice('À partir de 800€');

        $p1->setShortDescriptionFr("Traversez dunes, oasis et montagnes rocheuses au cœur du Grand Sud tunisien. Une immersion totale dans le désert, en 4x4.");
        $p1->setShortDescriptionEn("Cross dunes, oases and rocky mountains at the heart of the Tunisian Great South. A full immersion in the desert, by 4x4.");
        $p1->setShortDescriptionAr("اعبر الكثبان والواحات والجبال الصخرية في قلب الجنوب التونسي الكبير. انغماس كامل في الصحراء بسيارة الدفع الرباعي.");
        $p1->setShortDescriptionIt("Attraversa dune, oasi e montagne rocciose nel cuore del Grande Sud tunisino. Un'immersione totale nel deserto, in 4x4.");

        $p1->setDestination('Douz, Ksar Ghilane, Sahara');
        $p1->setType('4x4 Desert Adventure');
        $p1->setDurationDays(8);

        $p1->setIncludedFr("✓ Alimentation\n✓ Transfert de l'aéroport à l'hôtel et de retour\n✓ Hébergement à l'hôtel à Djerba et à Douz\n✓ Matelas ou sac de couchage\n✓ Couverture\n✓ Tente\n✓ Autorisation");
        $p1->setIncludedEn("✓ Meals\n✓ Airport-to-hotel transfer and return\n✓ Hotel accommodation in Djerba and Douz\n✓ Mattress or sleeping bag\n✓ Blanket\n✓ Tent\n✓ Permit");
        $p1->setIncludedAr("✓ الطعام\n✓ النقل من المطار إلى الفندق والعودة\n✓ الإقامة في الفندق بجربة ودوز\n✓ مرتبة أو كيس نوم\n✓ بطانية\n✓ خيمة\n✓ تصريح");
        $p1->setIncludedIt("✓ Vitto\n✓ Trasferimento aeroporto-hotel e ritorno\n✓ Alloggio in hotel a Djerba e Douz\n✓ Materasso o sacco a pelo\n✓ Coperta\n✓ Tenda\n✓ Permesso");

        $p1->setExcludedFr("✗ Vols internationaux\n✗ Assurance voyage\n✗ Dépenses personnelles\n✗ Pourboires");
        $p1->setExcludedEn("✗ International flights\n✗ Travel insurance\n✗ Personal expenses\n✗ Tips");
        $p1->setExcludedAr("✗ الرحلات الجوية الدولية\n✗ تأمين السفر\n✗ النفقات الشخصية\n✗ البقشيش");
        $p1->setExcludedIt("✗ Voli internazionali\n✗ Assicurazione di viaggio\n✗ Spese personali\n✗ Mance");

        $p1->setImages([
            'Circuit Douz1.jpg',
            'Circuit Douz2.jpg',
            'Desert-Baroudeurs1.jpg',
            'Desert-Baroudeurs2.jpg',
        ]);

        $manager->persist($p1);

        // ============ PROGRAMME 2: Excursion Nuit K.Ghilane ============
        $p2 = new Programme();
        $p2->setTitle('Excursion Nuit à Ksar Ghilane');
        $p2->setDescription("Une journée entre villages berbères et nuit magique dans l'oasis de Ksar Ghilane");
        $p2->setImage('oasis.jpeg');
        $p2->setDuree('2 jours / 1 nuit');
        $p2->setEnter('Tataouine, Chenini, Ksar Ghilane, Matmata');

        $p2->setTitleFr('Excursion Nuit à Ksar Ghilane');
        $p2->setTitleEn('Ksar Ghilane Overnight Excursion');
        $p2->setTitleAr('رحلة ليلية إلى قصر غيلان');
        $p2->setTitleIt('Escursione Notturna a Ksar Ghilane');

        $p2->setDescriptionFr(
            "Jour 1 : Prise en charge à l'hôtel, trajet via la Roman Road, halte au lac salé de Chahbania, marché de Tataouine, visite du village berbère de Chenini, déjeuner traditionnel, puis direction l'oasis de Ksar Ghilane pour une baignade dans le bassin naturel et une nuit sous les étoiles du désert.\n\n" .
            "Jour 2 : Petit-déjeuner, visite de Matmata et de ses habitations troglodytes, pause thé aux amandes à Tamazret, découverte de l'hôtel Sidi Idriss (décor de Star Wars), puis visite du village berbère de Toujane avant le retour à l'hôtel."
        );
        $p2->setDescriptionEn(
            "Day 1: Hotel pickup, drive via the Roman Road, stop at the Chahbania salt lake, Tataouine market, visit to the Berber village of Chenini, traditional lunch, then on to the Ksar Ghilane oasis for a swim in the natural pool and an overnight stay under the desert stars.\n\n" .
            "Day 2: Breakfast, visit to Matmata and its troglodyte dwellings, almond tea break in Tamazret, discovery of the Sidi Idriss hotel (Star Wars set), then a visit to the Berber village of Toujane before returning to the hotel."
        );
        $p2->setDescriptionAr(
            "اليوم الأول: الانطلاق من الفندق، عبور الطريق الروماني، توقف عند بحيرة الشحبانية المالحة، سوق تطاوين، زيارة قرية شنيني الأمازيغية، غداء تقليدي، ثم التوجه إلى واحة قصر غيلان للسباحة في الحوض الطبيعي وقضاء ليلة تحت نجوم الصحراء.\n\n" .
            "اليوم الثاني: الإفطار، زيارة مطماطة ومساكنها الكهفية، استراحة شاي باللوز في تمزرط، اكتشاف فندق سيدي إدريس (موقع تصوير ستار وورز)، ثم زيارة قرية توجان الأمازيغية قبل العودة إلى الفندق."
        );
        $p2->setDescriptionIt(
            "Giorno 1: Prelievo in hotel, tragitto lungo la Roman Road, sosta al lago salato di Chahbania, mercato di Tataouine, visita al villaggio berbero di Chenini, pranzo tradizionale, poi verso l'oasi di Ksar Ghilane per un bagno nella piscina naturale e una notte sotto le stelle del deserto.\n\n" .
            "Giorno 2: Colazione, visita a Matmata e alle sue abitazioni trogloditiche, pausa tè alle mandorle a Tamazret, scoperta dell'hotel Sidi Idriss (set di Star Wars), poi visita al villaggio berbero di Toujane prima del ritorno in hotel."
        );

        $p2->setDureeFr('2 jours / 1 nuit');
        $p2->setDureeEn('2 days / 1 night');
        $p2->setDureeAr('يومان / ليلة واحدة');
        $p2->setDureeIt('2 giorni / 1 notte');

        $p2->setPrice(null);

        $p2->setShortDescriptionFr("Villages berbères, marché local et baignade dans l'oasis, avant une nuit inoubliable sous les étoiles du Sahara.");
        $p2->setShortDescriptionEn("Berber villages, local market and a swim in the oasis, before an unforgettable night under the Sahara stars.");
        $p2->setShortDescriptionAr("قرى أمازيغية وسوق محلي وسباحة في الواحة، قبل ليلة لا تُنسى تحت نجوم الصحراء.");
        $p2->setShortDescriptionIt("Villaggi berberi, mercato locale e un bagno nell'oasi, prima di una notte indimenticabile sotto le stelle del Sahara.");

        $p2->setDestination('Tataouine, Ksar Ghilane, Matmata');
        $p2->setType('Excursion');
        $p2->setDurationDays(2);

        $p2->setIncludedFr("✓ Transport climatisé\n✓ Guide local\n✓ Déjeuner traditionnel\n✓ Hébergement 1 nuit\n✓ Entrées sites visités");
        $p2->setIncludedEn("✓ Air-conditioned transport\n✓ Local guide\n✓ Traditional lunch\n✓ 1 night accommodation\n✓ Site entrance fees");
        $p2->setIncludedAr("✓ نقل مكيف\n✓ مرشد محلي\n✓ غداء تقليدي\n✓ إقامة ليلة واحدة\n✓ رسوم دخول المواقع");
        $p2->setIncludedIt("✓ Trasporto con aria condizionata\n✓ Guida locale\n✓ Pranzo tradizionale\n✓ Pernottamento 1 notte\n✓ Ingressi ai siti visitati");

        $p2->setExcludedFr("✗ Boissons\n✗ Activités optionnelles (quad, dromadaire)\n✗ Pourboires");
        $p2->setExcludedEn("✗ Drinks\n✗ Optional activities (quad, camel ride)\n✗ Tips");
        $p2->setExcludedAr("✗ المشروبات\n✗ الأنشطة الاختيارية (دراجة رباعية، ركوب الجمل)\n✗ البقشيش");
        $p2->setExcludedIt("✗ Bevande\n✗ Attività opzionali (quad, dromedario)\n✗ Mance");

        $p2->setImages(['oasis.jpeg', 'sahra.jpeg']);

        $manager->persist($p2);

        // ============ PROGRAMME 3: Excursion Tataouine (Cloudinary image) ============
        $p3 = new Programme();
        $p3->setTitle('Excursion à Tataouine');
        $p3->setDescription('Une journée de découverte culturelle entre marché, villages troglodytes et décor de Star Wars');
        $p3->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788605389/baroudeurs/service/Tataouine.jpg');
        $p3->setDuree('1 jour');
        $p3->setEnter('Tataouine, Chenini, Ksar Hadada');

        $p3->setTitleFr('Excursion à Tataouine');
        $p3->setTitleEn('Tataouine Excursion');
        $p3->setTitleAr('رحلة إلى تطاوين');
        $p3->setTitleIt('Escursione a Tataouine');

        $p3->setDescriptionFr(
            "Départ matinal de l'hôtel, traversée de la Roman Road, pause au lac salé de Chahbania, exploration du marché de Tataouine, visite guidée du village troglodyte de Chenini, déjeuner berbère traditionnel, puis découverte du ksar Hadada, célèbre décor du film Star Wars, avant le retour à l'hôtel."
        );
        $p3->setDescriptionEn(
            "Early morning departure from the hotel, crossing the Roman Road, stop at the Chahbania salt lake, exploring the Tataouine market, guided visit of the troglodyte village of Chenini, traditional Berber lunch, then discovery of Ksar Hadada, a famous Star Wars film set, before returning to the hotel."
        );
        $p3->setDescriptionAr(
            "انطلاق صباحي من الفندق، عبور الطريق الروماني، توقف عند بحيرة الشحبانية المالحة، استكشاف سوق تطاوين، زيارة مرشدة لقرية شنيني الكهفية، غداء أمازيغي تقليدي، ثم اكتشاف قصر حدادة، الموقع الشهير لتصوير ستار وورز، قبل العودة إلى الفندق."
        );
        $p3->setDescriptionIt(
            "Partenza mattutina dall'hotel, attraversamento della Roman Road, sosta al lago salato di Chahbania, esplorazione del mercato di Tataouine, visita guidata al villaggio trogloditico di Chenini, pranzo berbero tradizionale, poi scoperta di Ksar Hadada, famoso set del film Star Wars, prima del ritorno in hotel."
        );

        $p3->setDureeFr('1 jour');
        $p3->setDureeEn('1 day');
        $p3->setDureeAr('يوم واحد');
        $p3->setDureeIt('1 giorno');

        $p3->setPrice(null);

        $p3->setShortDescriptionFr("Marché local, village troglodyte de Chenini et décor de Star Wars au ksar Hadada, en une journée riche en découvertes.");
        $p3->setShortDescriptionEn("Local market, the troglodyte village of Chenini and the Star Wars set at Ksar Hadada, all in one day of discovery.");
        $p3->setShortDescriptionAr("سوق محلي وقرية شنيني الكهفية وموقع تصوير ستار وورز في قصر حدادة، في يوم واحد مليء بالاكتشافات.");
        $p3->setShortDescriptionIt("Mercato locale, il villaggio trogloditico di Chenini e il set di Star Wars a Ksar Hadada, tutto in un giorno di scoperte.");

        $p3->setDestination('Tataouine, Chenini');
        $p3->setType('Excursion');
        $p3->setDurationDays(1);

        $p3->setIncludedFr("✓ Transport climatisé\n✓ Guide local\n✓ Déjeuner berbère traditionnel\n✓ Entrées sites visités");
        $p3->setIncludedEn("✓ Air-conditioned transport\n✓ Local guide\n✓ Traditional Berber lunch\n✓ Site entrance fees");
        $p3->setIncludedAr("✓ نقل مكيف\n✓ مرشد محلي\n✓ غداء أمازيغي تقليدي\n✓ رسوم دخول المواقع");
        $p3->setIncludedIt("✓ Trasporto con aria condizionata\n✓ Guida locale\n✓ Pranzo berbero tradizionale\n✓ Ingressi ai siti visitati");

        $p3->setExcludedFr("✗ Boissons\n✗ Pourboires");
        $p3->setExcludedEn("✗ Drinks\n✗ Tips");
        $p3->setExcludedAr("✗ المشروبات\n✗ البقشيش");
        $p3->setExcludedIt("✗ Bevande\n✗ Mance");

        $p3->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/v1788605389/baroudeurs/service/Tataouine.jpg']);

        $manager->persist($p3);

        // ============ PROGRAMME 4: Mirage du Désert ============
        $p4 = new Programme();
        $p4->setTitle('Mirage du Désert');
        $p4->setDescription('Une aventure inoubliable de 8 jours / 7 nuits à travers le sud tunisien');
        $p4->setImage('Desert Mirage 1.jpg');
        $p4->setDuree('8 jours / 7 nuits');
        $p4->setEnter('Djerba, Tataouine, Ksar Ghilane, Douz, Tozeur, Matmata');

        $p4->setTitleFr('Mirage du Désert');
        $p4->setTitleEn('Desert Mirage');
        $p4->setTitleAr('سراب الصحراء');
        $p4->setTitleIt('Miraggio del Deserto');

        $p4->setDescriptionFr(
            "Jour 1 : Arrivée à Djerba, transfert à l'hôtel.\n\n" .
            "Jour 2 : Djerba - Tataouine - Chenini - Ksar Ghilane, via la chaussée romaine, visite du Ksar Hadada (décor Star Wars), marché de Tataouine, village berbère de Chenini, puis Ksar Ghilane pour ses sources chaudes.\n\n" .
            "Jour 3 : Ksar Ghilane – Douz, marché local et oasis.\n\n" .
            "Jour 4 : Douz – Nefta – Tozeur, découverte des palmeraies et de l'architecture en briques.\n\n" .
            "Jour 5 : Oasis de montagne (Chebika, Tamerza, Mides) et démonstration de fabrication de briques.\n\n" .
            "Jour 6 : Le Lézard Rouge, Chott El Jerid, Tamezret, Matmata.\n\n" .
            "Jour 7 : Matmata, Toujane, village des potiers de Guellala, retour à Djerba.\n\n" .
            "Jour 8 : Transfert aéroport et départ."
        );
        $p4->setDescriptionEn(
            "Day 1: Arrival in Djerba, hotel transfer.\n\n" .
            "Day 2: Djerba - Tataouine - Chenini - Ksar Ghilane, via the Roman causeway, visit to Ksar Hadada (Star Wars set), Tataouine market, Berber village of Chenini, then Ksar Ghilane for its hot springs.\n\n" .
            "Day 3: Ksar Ghilane – Douz, local market and oasis.\n\n" .
            "Day 4: Douz – Nefta – Tozeur, discovering palm groves and brick architecture.\n\n" .
            "Day 5: Mountain oases (Chebika, Tamerza, Mides) and a brick-making demonstration.\n\n" .
            "Day 6: The Red Lizard train, Chott El Jerid, Tamezret, Matmata.\n\n" .
            "Day 7: Matmata, Toujane, the potters' village of Guellala, return to Djerba.\n\n" .
            "Day 8: Airport transfer and departure."
        );
        $p4->setDescriptionAr(
            "اليوم 1: الوصول إلى جربة، النقل إلى الفندق.\n\n" .
            "اليوم 2: جربة - تطاوين - شنيني - قصر غيلان، عبر الطريق الروماني، زيارة قصر حدادة (موقع ستار وورز)، سوق تطاوين، قرية شنيني الأمازيغية، ثم قصر غيلان لينابيعه الحارة.\n\n" .
            "اليوم 3: قصر غيلان – دوز، سوق محلي وواحة.\n\n" .
            "اليوم 4: دوز – نفطة – توزر، اكتشاف بساتين النخيل وهندسة الطوب.\n\n" .
            "اليوم 5: واحات الجبل (شبيقة، تمغزة، ميدس) وعرض صناعة الطوب.\n\n" .
            "اليوم 6: قطار السحلية الحمراء، شط الجريد، تمزرط، مطماطة.\n\n" .
            "اليوم 7: مطماطة، توجان، قرية الفخارين بقلالة، العودة إلى جربة.\n\n" .
            "اليوم 8: النقل إلى المطار والمغادرة."
        );
        $p4->setDescriptionIt(
            "Giorno 1: Arrivo a Djerba, trasferimento in hotel.\n\n" .
            "Giorno 2: Djerba - Tataouine - Chenini - Ksar Ghilane, via la strada romana, visita a Ksar Hadada (set di Star Wars), mercato di Tataouine, villaggio berbero di Chenini, poi Ksar Ghilane per le sue sorgenti termali.\n\n" .
            "Giorno 3: Ksar Ghilane – Douz, mercato locale e oasi.\n\n" .
            "Giorno 4: Douz – Nefta – Tozeur, alla scoperta delle palmete e dell'architettura in mattoni.\n\n" .
            "Giorno 5: Oasi di montagna (Chebika, Tamerza, Mides) e dimostrazione di fabbricazione di mattoni.\n\n" .
            "Giorno 6: Il treno Lucertola Rossa, Chott El Jerid, Tamezret, Matmata.\n\n" .
            "Giorno 7: Matmata, Toujane, il villaggio dei vasai di Guellala, ritorno a Djerba.\n\n" .
            "Giorno 8: Trasferimento in aeroporto e partenza."
        );

        $p4->setDureeFr('8 jours / 7 nuits');
        $p4->setDureeEn('8 days / 7 nights');
        $p4->setDureeAr('8 أيام / 7 ليال');
        $p4->setDureeIt('8 giorni / 7 notti');

        $p4->setPrice(null);

        $p4->setShortDescriptionFr("Un tour complet du sud tunisien : dunes, oasis, villages troglodytes et le mythique train Lézard Rouge.");
        $p4->setShortDescriptionEn("A complete tour of southern Tunisia: dunes, oases, troglodyte villages and the legendary Red Lizard train.");
        $p4->setShortDescriptionAr("جولة كاملة في جنوب تونس: كثبان وواحات وقرى كهفية وقطار السحلية الحمراء الأسطوري.");
        $p4->setShortDescriptionIt("Un tour completo del sud della Tunisia: dune, oasi, villaggi trogloditici e il leggendario treno Lucertola Rossa.");

        $p4->setDestination('Djerba, Douz, Tozeur, Matmata');
        $p4->setType('Circuit Complet');
        $p4->setDurationDays(8);

        $p4->setIncludedFr("✓ Pension complète\n✓ Hébergement en hôtels 3*\n✓ Visites guidées\n✓ Transports confortables");
        $p4->setIncludedEn("✓ Full board\n✓ 3-star hotel accommodation\n✓ Guided tours\n✓ Comfortable transport");
        $p4->setIncludedAr("✓ إقامة كاملة\n✓ الإقامة في فنادق 3 نجوم\n✓ جولات مرشدة\n✓ نقل مريح");
        $p4->setIncludedIt("✓ Pensione completa\n✓ Alloggio in hotel 3 stelle\n✓ Visite guidate\n✓ Trasporti confortevoli");

        $p4->setExcludedFr("✗ Boissons aux repas\n✗ Pourboires");
        $p4->setExcludedEn("✗ Drinks with meals\n✗ Tips");
        $p4->setExcludedAr("✗ المشروبات مع الوجبات\n✗ البقشيش");
        $p4->setExcludedIt("✗ Bevande ai pasti\n✗ Mance");

        $p4->setImages(['Desert Mirage 1.jpg', 'Desert Mirage 2.jpg', 'Desert Mirage 3.jpg']);

        $manager->persist($p4);

        // ============ EXCURSION 1: Appel du désert dromadaire (Cloudinary, compressed) ============
        $e1 = new Programme();
        $e1->setTitle('Appel du Désert - Dromadaire');
        $e1->setDescription("Balade à dos de dromadaire au cœur du désert tunisien");
        $e1->setImage('https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789040783/baroudeurs/excursions/kuw674phwztv921qnwzv.jpg');
        $e1->setDuree('1 jour');
        $e1->setEnter('Douz');
        $e1->setTitleFr('Appel du Désert - Dromadaire');
        $e1->setTitleEn('Call of the Desert - Camel Ride');
        $e1->setTitleAr('نداء الصحراء - ركوب الجمل');
        $e1->setTitleIt('Richiamo del Deserto - Dromedario');
        $e1->setDescriptionFr('Une balade à dos de dromadaire pour ressentir le rythme du désert et son silence.');
        $e1->setDescriptionEn('A camel ride to feel the rhythm of the desert and its silence.');
        $e1->setDescriptionAr('نزهة على ظهر الجمل للشعور بإيقاع الصحراء وصمتها.');
        $e1->setDescriptionIt('Una passeggiata in dromedario per sentire il ritmo del deserto e il suo silenzio.');
        $e1->setDureeFr('1 jour');
        $e1->setDureeEn('1 day');
        $e1->setDureeAr('يوم واحد');
        $e1->setDureeIt('1 giorno');
        $e1->setPrice(null);
        $e1->setShortDescriptionFr("Une immersion douce dans les dunes, portée par le pas tranquille du dromadaire.");
        $e1->setShortDescriptionEn("A gentle immersion in the dunes, carried by the calm pace of the camel.");
        $e1->setShortDescriptionAr("انغماس هادئ في الكثبان الرملية، على وقع خطى الجمل الهادئة.");
        $e1->setShortDescriptionIt("Un'immersione dolce tra le dune, portata dal passo tranquillo del dromedario.");
        $e1->setDestination('Douz');
        $e1->setType('Excursion Vedette');
        $e1->setDurationDays(1);
        $e1->setIncludedFr("✓ Guide chamelier\n✓ Dromadaire\n✓ Assistance");
        $e1->setIncludedEn("✓ Camel guide\n✓ Camel\n✓ Assistance");
        $e1->setIncludedAr("✓ مرشد الجمال\n✓ الجمل\n✓ المساعدة");
        $e1->setIncludedIt("✓ Guida cammelliere\n✓ Dromedario\n✓ Assistenza");
        $e1->setExcludedFr("✗ Repas\n✗ Boissons");
        $e1->setExcludedEn("✗ Meals\n✗ Drinks");
        $e1->setExcludedAr("✗ الوجبات\n✗ المشروبات");
        $e1->setExcludedIt("✗ Pasti\n✗ Bevande");
        $e1->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789040783/baroudeurs/excursions/kuw674phwztv921qnwzv.jpg']);
        $manager->persist($e1);

        // ============ EXCURSION 2: BAROUDEURS DE DESERT 15JR DROMADAIRE (Cloudinary, compressed) ============
        $e2 = new Programme();
        $e2->setTitle('Baroudeurs de Désert - 15 Jours Dromadaire');
        $e2->setDescription("Une grande traversée du désert de 15 jours à dos de dromadaire");
        $e2->setImage('https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789039833/baroudeurs/excursions/tmsxxbazvkthqj1mkxkm.jpg');
        $e2->setDuree('15 jours / 14 nuits');
        $e2->setEnter('Douz, Sahara');
        $e2->setTitleFr('Baroudeurs de Désert - 15 Jours Dromadaire');
        $e2->setTitleEn('Desert Baroudeurs - 15-Day Camel Trek');
        $e2->setTitleAr('بارودور الصحراء - 15 يومًا على الجمل');
        $e2->setTitleIt('Baroudeurs del Deserto - 15 Giorni in Dromedario');
        $e2->setDescriptionFr("Une grande traversée à dos de dromadaire, au plus profond du Sahara tunisien, loin de toute civilisation.");
        $e2->setDescriptionEn("A great camel crossing deep into the Tunisian Sahara, far from all civilization.");
        $e2->setDescriptionAr("عبور كبير على ظهر الجمل في أعماق الصحراء التونسية، بعيدًا عن كل حضارة.");
        $e2->setDescriptionIt("Un grande attraversamento in dromedario nel profondo del Sahara tunisino, lontano da ogni civiltà.");
        $e2->setDureeFr('15 jours / 14 nuits');
        $e2->setDureeEn('15 days / 14 nights');
        $e2->setDureeAr('15 يومًا / 14 ليلة');
        $e2->setDureeIt('15 giorni / 14 notti');
        $e2->setPrice(null);
        $e2->setShortDescriptionFr("La grande aventure du baroudeur : 15 jours de traversée à dos de dromadaire au cœur du Sahara.");
        $e2->setShortDescriptionEn("The ultimate adventure: 15 days crossing the Sahara by camel.");
        $e2->setShortDescriptionAr("مغامرة البارودور الكبرى: 15 يومًا من العبور على ظهر الجمل في قلب الصحراء.");
        $e2->setShortDescriptionIt("La grande avventura: 15 giorni di attraversamento del Sahara in dromedario.");
        $e2->setDestination('Douz, Sahara');
        $e2->setType('Excursion Vedette');
        $e2->setDurationDays(15);
        $e2->setIncludedFr("✓ Guide chamelier\n✓ Dromadaires\n✓ Alimentation\n✓ Tentes et couchage");
        $e2->setIncludedEn("✓ Camel guide\n✓ Camels\n✓ Meals\n✓ Tents and bedding");
        $e2->setIncludedAr("✓ مرشد الجمال\n✓ الجمال\n✓ الطعام\n✓ الخيام والفراش");
        $e2->setIncludedIt("✓ Guida cammelliere\n✓ Dromedari\n✓ Vitto\n✓ Tende e biancheria");
        $e2->setExcludedFr("✗ Vols internationaux\n✗ Pourboires");
        $e2->setExcludedEn("✗ International flights\n✗ Tips");
        $e2->setExcludedAr("✗ الرحلات الجوية الدولية\n✗ البقشيش");
        $e2->setExcludedIt("✗ Voli internazionali\n✗ Mance");
        $e2->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789039833/baroudeurs/excursions/tmsxxbazvkthqj1mkxkm.jpg']);
        $manager->persist($e2);

        // ============ EXCURSION 3: Charme du désert 2jrs dromadaire (Cloudinary, compressed) ============
        $e3 = new Programme();
        $e3->setTitle('Charme du Désert - 2 Jours Dromadaire');
        $e3->setDescription("2 jours de balade à dos de dromadaire et bivouac sous les étoiles");
        $e3->setImage('https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789039841/baroudeurs/excursions/haawxvspuowtvz8qfbis.jpg');
        $e3->setDuree('2 jours / 1 nuit');
        $e3->setEnter('Douz, Sahara');
        $e3->setTitleFr('Charme du Désert - 2 Jours Dromadaire');
        $e3->setTitleEn('Desert Charm - 2-Day Camel Trek');
        $e3->setTitleAr('سحر الصحراء - يومان على الجمل');
        $e3->setTitleIt('Fascino del Deserto - 2 Giorni in Dromedario');
        $e3->setDescriptionFr("Une escapade de 2 jours à dos de dromadaire, avec bivouac et nuit sous les étoiles du désert.");
        $e3->setDescriptionEn("A 2-day camel escape, with bivouac and a night under the desert stars.");
        $e3->setDescriptionAr("هروب لمدة يومين على ظهر الجمل، مع مخيم وليلة تحت نجوم الصحراء.");
        $e3->setDescriptionIt("Una fuga di 2 giorni in dromedario, con bivacco e una notte sotto le stelle del deserto.");
        $e3->setDureeFr('2 jours / 1 nuit');
        $e3->setDureeEn('2 days / 1 night');
        $e3->setDureeAr('يومان / ليلة واحدة');
        $e3->setDureeIt('2 giorni / 1 notte');
        $e3->setPrice(null);
        $e3->setShortDescriptionFr("Une escapade courte mais intense : dromadaire, bivouac et ciel étoilé du Sahara.");
        $e3->setShortDescriptionEn("A short but intense getaway: camel, bivouac, and starry Sahara sky.");
        $e3->setShortDescriptionAr("هروب قصير لكنه مكثف: جمل، مخيم، وسماء مليئة بالنجوم في الصحراء.");
        $e3->setShortDescriptionIt("Una fuga breve ma intensa: dromedario, bivacco e cielo stellato del Sahara.");
        $e3->setDestination('Douz, Sahara');
        $e3->setType('Excursion Vedette');
        $e3->setDurationDays(2);
        $e3->setIncludedFr("✓ Guide chamelier\n✓ Dromadaire\n✓ Bivouac\n✓ Repas");
        $e3->setIncludedEn("✓ Camel guide\n✓ Camel\n✓ Bivouac\n✓ Meals");
        $e3->setIncludedAr("✓ مرشد الجمال\n✓ الجمل\n✓ المخيم\n✓ الوجبات");
        $e3->setIncludedIt("✓ Guida cammelliere\n✓ Dromedario\n✓ Bivacco\n✓ Pasti");
        $e3->setExcludedFr("✗ Boissons\n✗ Pourboires");
        $e3->setExcludedEn("✗ Drinks\n✗ Tips");
        $e3->setExcludedAr("✗ المشروبات\n✗ البقشيش");
        $e3->setExcludedIt("✗ Bevande\n✗ Mance");
        $e3->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789039841/baroudeurs/excursions/haawxvspuowtvz8qfbis.jpg']);
        $manager->persist($e3);

        // ============ EXCURSION 4: Désert Infini 8JRS DROM (unchanged) ============
        $e4 = new Programme();
        $e4->setTitle('Désert Infini - 8 Jours Dromadaire');
        $e4->setDescription("8 jours de traversée à dos de dromadaire dans l'infini du désert tunisien");
        $e4->setImage('https://res.cloudinary.com/dy13axswo/image/upload/v1788608782/baroudeurs/service/details/Circuit/4.jpg');
        $e4->setDuree('8 jours / 7 nuits');
        $e4->setEnter('Douz, Sahara');
        $e4->setTitleFr('Désert Infini - 8 Jours Dromadaire');
        $e4->setTitleEn('Endless Desert - 8-Day Camel Trek');
        $e4->setTitleAr('الصحراء اللانهائية - 8 أيام على الجمل');
        $e4->setTitleIt('Deserto Infinito - 8 Giorni in Dromedario');
        $e4->setDescriptionFr("8 jours à dos de dromadaire au cœur d'un désert qui semble ne jamais finir.");
        $e4->setDescriptionEn("8 days by camel through a desert that seems to never end.");
        $e4->setDescriptionAr("8 أيام على ظهر الجمل في صحراء تبدو بلا نهاية.");
        $e4->setDescriptionIt("8 giorni in dromedario in un deserto che sembra non finire mai.");
        $e4->setDureeFr('8 jours / 7 nuits');
        $e4->setDureeEn('8 days / 7 nights');
        $e4->setDureeAr('8 أيام / 7 ليال');
        $e4->setDureeIt('8 giorni / 7 notti');
        $e4->setPrice(null);
        $e4->setShortDescriptionFr("Une traversée de 8 jours au rythme du dromadaire, dans l'immensité silencieuse du Sahara.");
        $e4->setShortDescriptionEn("An 8-day crossing at the camel's pace, through the silent immensity of the Sahara.");
        $e4->setShortDescriptionAr("عبور لمدة 8 أيام على وتيرة الجمل، في اتساع الصحراء الصامت.");
        $e4->setShortDescriptionIt("Un attraversamento di 8 giorni al ritmo del dromedario, nell'immensità silenziosa del Sahara.");
        $e4->setDestination('Douz, Sahara');
        $e4->setType('Excursion Vedette');
        $e4->setDurationDays(8);
        $e4->setIncludedFr("✓ Guide chamelier\n✓ Dromadaires\n✓ Alimentation\n✓ Tentes et couchage");
        $e4->setIncludedEn("✓ Camel guide\n✓ Camels\n✓ Meals\n✓ Tents and bedding");
        $e4->setIncludedAr("✓ مرشد الجمال\n✓ الجمال\n✓ الطعام\n✓ الخيام والفراش");
        $e4->setIncludedIt("✓ Guida cammelliere\n✓ Dromedari\n✓ Vitto\n✓ Tende e biancheria");
        $e4->setExcludedFr("✗ Vols internationaux\n✗ Pourboires");
        $e4->setExcludedEn("✗ International flights\n✗ Tips");
        $e4->setExcludedAr("✗ الرحلات الجوية الدولية\n✗ البقشيش");
        $e4->setExcludedIt("✗ Voli internazionali\n✗ Mance");
        $e4->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/v1788608782/baroudeurs/service/details/Circuit/4.jpg']);
        $manager->persist($e4);

        // ============ EXCURSION 5: Rose de Sables 8jrs drom (Cloudinary, compressed) ============
        $e5 = new Programme();
        $e5->setTitle('Rose de Sables - 8 Jours Dromadaire');
        $e5->setDescription("8 jours de traversée à dos de dromadaire à la découverte des roses des sables");
        $e5->setImage('https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789040800/baroudeurs/excursions/tydi5hs3wo5w81gqnuus.jpg');
        $e5->setDuree('8 jours / 7 nuits');
        $e5->setEnter('Douz, Chott El Jerid');
        $e5->setTitleFr('Rose de Sables - 8 Jours Dromadaire');
        $e5->setTitleEn('Desert Rose - 8-Day Camel Trek');
        $e5->setTitleAr('وردة الرمال - 8 أيام على الجمل');
        $e5->setTitleIt('Rosa del Deserto - 8 Giorni in Dromedario');
        $e5->setDescriptionFr("8 jours à dos de dromadaire, entre dunes dorées et roses des sables au bord du Chott El Jerid.");
        $e5->setDescriptionEn("8 days by camel, between golden dunes and desert roses at the edge of Chott El Jerid.");
        $e5->setDescriptionAr("8 أيام على ظهر الجمل، بين الكثبان الذهبية وورود الرمال على حافة شط الجريد.");
        $e5->setDescriptionIt("8 giorni in dromedario, tra dune dorate e rose del deserto ai bordi dello Chott El Jerid.");
        $e5->setDureeFr('8 jours / 7 nuits');
        $e5->setDureeEn('8 days / 7 nights');
        $e5->setDureeAr('8 أيام / 7 ليال');
        $e5->setDureeIt('8 giorni / 7 notti');
        $e5->setPrice(null);
        $e5->setShortDescriptionFr("Un voyage de 8 jours à la rencontre des dunes dorées et des célèbres roses des sables.");
        $e5->setShortDescriptionEn("An 8-day journey to discover golden dunes and the famous desert roses.");
        $e5->setShortDescriptionAr("رحلة لمدة 8 أيام لاكتشاف الكثبان الذهبية وورود الرمال الشهيرة.");
        $e5->setShortDescriptionIt("Un viaggio di 8 giorni alla scoperta di dune dorate e delle famose rose del deserto.");
        $e5->setDestination('Douz, Chott El Jerid');
        $e5->setType('Excursion Vedette');
        $e5->setDurationDays(8);
        $e5->setIncludedFr("✓ Guide chamelier\n✓ Dromadaires\n✓ Alimentation\n✓ Tentes et couchage");
        $e5->setIncludedEn("✓ Camel guide\n✓ Camels\n✓ Meals\n✓ Tents and bedding");
        $e5->setIncludedAr("✓ مرشد الجمال\n✓ الجمال\n✓ الطعام\n✓ الخيام والفراش");
        $e5->setIncludedIt("✓ Guida cammelliere\n✓ Dromedari\n✓ Vitto\n✓ Tende e biancheria");
        $e5->setExcludedFr("✗ Vols internationaux\n✗ Pourboires");
        $e5->setExcludedEn("✗ International flights\n✗ Tips");
        $e5->setExcludedAr("✗ الرحلات الجوية الدولية\n✗ البقشيش");
        $e5->setExcludedIt("✗ Voli internazionali\n✗ Mance");
        $e5->setImages(['https://res.cloudinary.com/dy13axswo/image/upload/f_auto,q_auto/v1789040800/baroudeurs/excursions/tydi5hs3wo5w81gqnuus.jpg']);
        $manager->persist($e5);

        $manager->flush();
    }
}
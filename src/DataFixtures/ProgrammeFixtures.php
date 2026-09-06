<?php

namespace App\DataFixtures;

use App\Entity\Programme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgrammeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $programme = new Programme();
        
        // Basic fields
        $programme->setTitle('Circuit 4x4 - Sahara de Douz');
        $programme->setDescription('Une aventure de 8 jours en 4x4 à travers le Sahara tunisien');
        $programme->setImage('desert-adventure.jpg');
        $programme->setDuree('8 jours / 7 nuits');
        $programme->setEnter('Douz, Ksar Ghilane');
        
        // Multilingual titles
        $programme->setTitleFr('Circuit 4x4 - Sahara de Douz');
        $programme->setTitleEn('4x4 Circuit - Douz Sahara');
        $programme->setTitleAr('رحلة 4x4 - صحراء دوز');
        $programme->setTitleIt('Circuito 4x4 - Sahara di Douz');
        
        // Multilingual descriptions
        $programme->setDescriptionFr(
            "4ème jour : La caravane se déplace vers « El Mida ». Des cordons de dunes, des vallées pour rejoindre « El Mida » (gour signifie montagne). Du haut de cette petite montagne rocheuse vous aurez l'impression de dominer le Sahara !\n\n" .
            "5ème jour : Après avoir parcouru une cinquantaine de kilomètres de pistes, quel spectacle : à la porte du Grand Sud Tunisien, sur l'arête Est du Grand Erg Oriental, s'étend l'oasis de « Ksar Ghilane ». La plus méridionale des Oasis de Tunisie, elle est parcourue de séguias alimentés par une source thermale.\n\n" .
            "6ème jour : Puis, nous continuons notre circuit vers « Elwat Sbat » à quelques kilomètres, qui présente l'avantage d'être isolé, beaucoup moins couru que Ksar Ghilane et offre même une petite piscine d'eau chaude.\n\n" .
            "7ème jour : Retour en 4×4 à l'hôtel à Douz, Djerba ou à Tozeur.\n\n" .
            "8ème jour : Transfert à l'aéroport à Djerba ou à Tozeur."
        );
        
        $programme->setDescriptionEn(
            "Day 4: The caravan moves towards 'El Mida'. Rows of dunes, valleys to reach 'El Mida' (gour means mountain). From the top of this small rocky mountain, you will feel like you are dominating the Sahara!\n\n" .
            "Day 5: After covering about fifty kilometers of tracks, what a spectacle: at the gateway to the Great Tunisian South, on the eastern ridge of the Grand Erg Oriental, lies the oasis of 'Ksar Ghilane'. The southernmost oasis in Tunisia, it is crossed by irrigation channels fed by a thermal spring.\n\n" .
            "Day 6: We then continue our circuit towards 'Elwat Sbat', a few kilometers away, which has the advantage of being isolated, much less frequented than Ksar Ghilane, and even offers a small hot water pool.\n\n" .
            "Day 7: Return by 4x4 to the hotel in Douz, Djerba or Tozeur.\n\n" .
            "Day 8: Transfer to Djerba or Tozeur airport."
        );
        
        $programme->setDescriptionAr(
            "اليوم الرابع: تتحرك القافلة نحو 'الميدة'. سلاسل من الكثبان والوديان للوصول إلى 'الميدة' (كلمة 'قور' تعني الجبل). من قمة هذا الجبل الصخري الصغير، ستشعرون وكأنكم تسيطرون على الصحراء الكبرى!\n\n" .
            "اليوم الخامس: بعد قطع نحو خمسين كيلومترًا من المسالك، يا له من منظر: عند بوابة الجنوب التونسي الكبير، على الحافة الشرقية للعرق الشرقي الكبير، تمتد واحة 'قصر غيلان'. أقصى واحة جنوبية في تونس، تعبرها سواقي تغذيها ينابيع حرارية.\n\n" .
            "اليوم السادس: نواصل بعدها جولتنا نحو 'علوة سبات' على بعد بضعة كيلومترات، الذي يتميز بكونه معزولًا وأقل ازدحامًا بكثير من قصر غيلان، بل ويوفر مسبحًا صغيرًا من المياه الحارة.\n\n" .
            "اليوم السابع: العودة بسيارة الدفع الرباعي إلى الفندق بدوز أو جربة أو توزر.\n\n" .
            "اليوم الثامن: النقل إلى مطار جربة أو توزر."
        );
        
        $programme->setDescriptionIt(
            "Giorno 4: La carovana si sposta verso 'El Mida'. Cordoni di dune, vallate per raggiungere 'El Mida' (gour significa montagna). Dalla cima di questa piccola montagna rocciosa avrete l'impressione di dominare il Sahara!\n\n" .
            "Giorno 5: Dopo aver percorso una cinquantina di chilometri di piste, che spettacolo: alla porta del Grande Sud Tunisino, sul crinale orientale del Grande Erg Orientale, si estende l'oasi di 'Ksar Ghilane'. La più meridionale delle oasi della Tunisia, è attraversata da canali alimentati da una sorgente termale.\n\n" .
            "Giorno 6: Proseguiamo poi il nostro circuito verso 'Elwat Sbat', a pochi chilometri di distanza, che presenta il vantaggio di essere isolato, molto meno frequentato di Ksar Ghilane, e offre persino una piccola piscina di acqua calda.\n\n" .
            "Giorno 7: Ritorno in 4x4 all'hotel a Douz, Djerba o Tozeur.\n\n" .
            "Giorno 8: Trasferimento all'aeroporto di Djerba o Tozeur."
        );
        
        // Duration in different languages
        $programme->setDureeFr('8 jours / 7 nuits');
        $programme->setDureeEn('8 days / 7 nights');
        $programme->setDureeAr('8 أيام / 7 ليال');
        $programme->setDureeIt('8 giorni / 7 notti');
        
        // Price
        $programme->setPrice('À partir de 800€');
        
        // Short descriptions
        $programme->setShortDescriptionFr('Partez pour une aventure inoubliable de 8 jours à travers le Sahara tunisien en 4x4');
        $programme->setShortDescriptionEn('Embark on an unforgettable 8-day adventure through the Tunisian Sahara in a 4x4');
        $programme->setShortDescriptionAr('انطلق في مغامرة لا تُنسى لمدة 8 أيام عبر الصحراء التونسية بسيارة الدفع الرباعي');
        $programme->setShortDescriptionIt('Parti per un\'avventura indimenticabile di 8 giorni attraverso il Sahara tunisino in 4x4');
        
        // Other fields
        $programme->setDestination('Douz, Ksar Ghilane, Sahara');
        $programme->setType('4x4 Desert Adventure');
        $programme->setDurationDays(8);
        
        // Included services (what's included)
        $programme->setIncludedFr("✓ Alimentation\n✓ Transfert de l'aéroport à l'hôtel et de retour\n✓ Hébergement à l'hôtel à Djerba et à Douz\n✓ Matelas ou sac de couchage\n✓ Couverture\n✓ Tente\n✓ Autorisation");
        $programme->setIncludedEn("✓ Meals\n✓ Airport-to-hotel transfer and return\n✓ Hotel accommodation in Djerba and Douz\n✓ Mattress or sleeping bag\n✓ Blanket\n✓ Tent\n✓ Permit");
        $programme->setIncludedAr("✓ الطعام\n✓ النقل من المطار إلى الفندق والعودة\n✓ الإقامة في الفندق بجربة ودوز\n✓ مرتبة أو كيس نوم\n✓ بطانية\n✓ خيمة\n✓ تصريح");
        $programme->setIncludedIt("✓ Vitto\n✓ Trasferimento aeroporto-hotel e ritorno\n✓ Alloggio in hotel a Djerba e Douz\n✓ Materasso o sacco a pelo\n✓ Coperta\n✓ Tenda\n✓ Permesso");
        
        // Excluded services
        $programme->setExcludedFr("✗ Vols internationaux\n✗ Assurance voyage\n✗ Dépenses personnelles\n✗ Pourboires");
        $programme->setExcludedEn("✗ International flights\n✗ Travel insurance\n✗ Personal expenses\n✗ Tips");
        $programme->setExcludedAr("✗ الرحلات الجوية الدولية\n✗ تأمين السفر\n✗ النفقات الشخصية\n✗ البقشيش");
        $programme->setExcludedIt("✗ Voli internazionali\n✗ Assicurazione di viaggio\n✗ Spese personali\n✗ Mance");
        
        // Gallery images
        $programme->setImages([
            'Desert-Baroudeurs1.jpg',
            'Desert-Baroudeurs2.jpg',
            'Desert-Baroudeurs3.avif',
            'Desert-Baroudeurs4.jpg',
            'Desert-Charm1.jpg',
            'Desert-Charm2.jpg',
            'Desert-Charm3.jpg',
            'Desert-Charm4.jpg',
            'Call Desert1.webp',
            'Call Desert2.jpg',
            'Call Desert3.jpg',
            'Call Desert4.jpg'
        ]);
        
        $manager->persist($programme);
        $manager->flush();
    }
}
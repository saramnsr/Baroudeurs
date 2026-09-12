<?php

namespace App\DataFixtures;

use App\Entity\Excursion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExcursionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ============ EXCURSION 1: Appel du Désert (3 jours / 2 nuits) ============
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
        $e1->setPosition(1);

        $e1->setIntroFr("Appel du désert : 3 jours / 2 nuits – Une immersion dans les dunes dorées du Sahara.");
        $e1->setIntroEn("Call of the Desert: 3 days / 2 nights – An immersion in the golden dunes of the Sahara.");
        $e1->setIntroAr("نداء الصحراء: 3 أيام / ليلتان – انغماس في الكثبان الذهبية للصحراء الكبرى.");
        $e1->setIntroIt("Richiamo del Deserto: 3 giorni / 2 notti – Un'immersione nelle dune dorate del Sahara.");

        $e1->setFullDescriptionFr("Un séjour de 3 jours et 2 nuits à dos de dromadaire, de Douz à Benwia puis Leegtaaya, avant de revenir à Douz. Chaque étape combine marche dans les dunes dorées, repas pris en plein désert, et nuits sous tente bédouine au son du silence du Sahara.");
        $e1->setFullDescriptionEn("A 3-day, 2-night camel trek from Douz to Benwia and then Leegtaaya, before returning to Douz. Each stage combines walking through golden dunes, meals taken in the open desert, and nights under a Bedouin tent amid the silence of the Sahara.");
        $e1->setFullDescriptionAr("رحلة لمدة 3 أيام وليلتين على ظهر الجمل، من دوز إلى بنويا ثم ليقطاية، قبل العودة إلى دوز. تجمع كل مرحلة بين المشي في الكثبان الذهبية وتناول الوجبات في قلب الصحراء والمبيت تحت خيمة بدوية وسط صمت الصحراء الكبرى.");
        $e1->setFullDescriptionIt("Un viaggio di 3 giorni e 2 notti in dromedario da Douz a Benwia e poi a Leegtaaya, prima di tornare a Douz. Ogni tappa unisce camminate tra le dune dorate, pasti consumati nel deserto aperto e notti sotto la tenda beduina nel silenzio del Sahara.");

        $e1->setItinerarySummaryFr("Ce circuit de 3 jours relie Douz à Benwia puis Leegtaaya, avant de revenir à Douz. Chaque jour offre une marche à dos de dromadaire à travers les dunes dorées, des repas pris en plein désert et des nuits sous tente bédouine.");
        $e1->setItinerarySummaryEn("This 3-day circuit links Douz to Benwia and then Leegtaaya, before returning to Douz. Each day offers a camel trek through golden dunes, meals in the open desert, and nights under a Bedouin tent.");
        $e1->setItinerarySummaryAr("تربط هذه الرحلة التي تستغرق 3 أيام بين دوز وبنويا ثم ليقطاية، قبل العودة إلى دوز. يوفر كل يوم رحلة على ظهر الجمل عبر الكثبان الذهبية ووجبات في قلب الصحراء ومبيتًا تحت خيمة بدوية.");
        $e1->setItinerarySummaryIt("Questo circuito di 3 giorni collega Douz a Benwia e poi a Leegtaaya, prima di tornare a Douz. Ogni giorno offre una camminata in dromedario tra le dune dorate, pasti nel deserto aperto e notti sotto la tenda beduina.");

        $e1->setItineraryFr(['Douz - Benwia', 'Benwia - Leegtaaya', 'Leegtaaya - Douz']);
        $e1->setItineraryEn(['Douz - Benwia', 'Benwia - Leegtaaya', 'Leegtaaya - Douz']);
        $e1->setItineraryAr(['دوز - بنويا', 'بنويا - ليقطاية', 'ليقطاية - دوز']);
        $e1->setItineraryIt(['Douz - Benwia', 'Benwia - Leegtaaya', 'Leegtaaya - Douz']);

        $e1->setItineraryDetailFr([
            "À votre arrivée à Douz, après un délicieux petit déjeuner, vous commencerez votre aventure saharienne en direction de Benwia, un lieu isolé et préservé du désert. Vous traverserez des paysages à couper le souffle, où les dunes dorées se mêlent à l'horizon infini. Le déjeuner sera pris au cœur des dunes, offrant une vue splendide sur la vastitude du Sahara. Le soir venu, vous installerez votre bivouac sous les étoiles et dégusterez un dîner traditionnel préparé par les bédouins. Nuit sous tente bédouine, en parfaite harmonie avec la tranquillité du désert.",
            "Réveil à l'aube pour profiter d'un lever du soleil spectaculaire sur les dunes du Sahara. Après un petit déjeuner chaleureux, vous prendrez la direction de Leegtaaya, un endroit magnifique et encore sauvage, où la beauté des paysages vous laissera sans voix. Le déjeuner sera à nouveau pris en plein désert, entre dunes et silence. En soirée, dîner autour du feu et nuit sous tente bédouine, une nouvelle occasion de vous immerger dans l'authenticité de la vie nomade.",
            "Tôt le matin, vous serez réveillé par un lever de soleil magique sur le désert, un moment unique à capturer. Après le petit déjeuner, vous entamerez votre retour vers Douz, avec un dernier déjeuner dans le calme des dunes. Ce sera une fin mémorable pour cette aventure, avant de retourner à Douz pour conclure cette évasion au cœur du Sahara.",
        ]);
        $e1->setItineraryDetailEn([
            "Upon arrival in Douz, after a delicious breakfast, you will begin your Saharan adventure heading towards Benwia, an isolated and unspoiled desert location. You will cross breathtaking landscapes where golden dunes blend into the infinite horizon. Lunch will be enjoyed in the heart of the dunes, offering a splendid view over the vastness of the Sahara. In the evening, you will set up your bivouac under the stars and enjoy a traditional dinner prepared by the Bedouins. Night under a Bedouin tent, in perfect harmony with the tranquility of the desert.",
            "Wake up at dawn to enjoy a spectacular sunrise over the dunes of the Sahara. After a warm breakfast, you will head towards Leegtaaya, a magnificent and still-wild place, where the beauty of the landscapes will leave you speechless. Lunch will once again be enjoyed in the open desert, among dunes and silence. In the evening, dinner around the fire and a night under a Bedouin tent, another opportunity to immerse yourself in the authenticity of nomadic life.",
            "Early in the morning, you will be woken by a magical sunrise over the desert, a unique moment to capture. After breakfast, you will begin your return to Douz, with a final lunch in the calm of the dunes. This will be a memorable end to this adventure, before returning to Douz to conclude this escape into the heart of the Sahara.",
        ]);
        $e1->setItineraryDetailAr([
            "عند وصولكم إلى دوز، وبعد فطور شهي، ستبدأون مغامرتكم الصحراوية باتجاه بنويا، وهو موقع صحراوي معزول وبكر. ستعبرون مناظر طبيعية خلابة حيث تمتزج الكثبان الذهبية بالأفق اللامتناهي. سيُقدَّم الغداء في قلب الكثبان، مع منظر رائع على اتساع الصحراء الكبرى. مساءً، ستنصبون مخيمكم تحت النجوم وتتذوقون عشاءً تقليديًا يعده البدو. المبيت تحت خيمة بدوية، في انسجام تام مع هدوء الصحراء.",
            "الاستيقاظ عند الفجر للاستمتاع بشروق شمس رائع فوق كثبان الصحراء الكبرى. بعد فطور دافئ، ستتوجهون نحو ليقطاية، وهو مكان جميل وما زال بريًا، حيث سيترككم جمال المناظر الطبيعية بلا كلام. سيُقدَّم الغداء مجددًا في قلب الصحراء، بين الكثبان والصمت. مساءً، عشاء حول النار ومبيت تحت خيمة بدوية، فرصة أخرى للانغماس في أصالة الحياة البدوية.",
            "في الصباح الباكر، ستوقظكم شروق شمس ساحر فوق الصحراء، لحظة فريدة تستحق التقاطها. بعد الفطور، ستبدأون رحلة العودة إلى دوز، مع غداء أخير في هدوء الكثبان. ستكون هذه نهاية لا تُنسى لهذه المغامرة، قبل العودة إلى دوز لإنهاء هذا الهروب في قلب الصحراء الكبرى.",
        ]);
        $e1->setItineraryDetailIt([
            "Al vostro arrivo a Douz, dopo una deliziosa colazione, inizierete la vostra avventura sahariana in direzione di Benwia, un luogo isolato e incontaminato del deserto. Attraverserete paesaggi mozzafiato dove le dune dorate si fondono con l'orizzonte infinito. Il pranzo sarà consumato nel cuore delle dune, offrendo una vista splendida sull'immensità del Sahara. La sera, allestirete il vostro bivacco sotto le stelle e gusterete una cena tradizionale preparata dai beduini. Notte sotto la tenda beduina, in perfetta armonia con la tranquillità del deserto.",
            "Sveglia all'alba per godere di un'alba spettacolare sulle dune del Sahara. Dopo una calorosa colazione, vi dirigerete verso Leegtaaya, un luogo magnifico e ancora selvaggio, dove la bellezza dei paesaggi vi lascerà senza parole. Il pranzo sarà nuovamente consumato nel deserto aperto, tra dune e silenzio. La sera, cena intorno al fuoco e notte sotto la tenda beduina, un'altra occasione per immergervi nell'autenticità della vita nomade.",
            "Al mattino presto, sarete svegliati da un'alba magica sul deserto, un momento unico da catturare. Dopo la colazione, inizierete il vostro ritorno verso Douz, con un ultimo pranzo nella calma delle dune. Sarà una fine memorabile per questa avventura, prima di tornare a Douz per concludere questa fuga nel cuore del Sahara.",
        ]);

        $e1->setIncludedFr(['Pension complète durant toute l\'escapade', 'Hébergement en bivouac sous tente bédouine', 'Repas typiques préparés par les bédouins']);
        $e1->setIncludedEn(['Full board throughout the trip', 'Bedouin tent bivouac accommodation', 'Traditional meals prepared by the Bedouins']);
        $e1->setIncludedAr(['إقامة كاملة طوال الرحلة', 'الإقامة في مخيم تحت خيمة بدوية', 'وجبات تقليدية يعدها البدو']);
        $e1->setIncludedIt(['Pensione completa durante tutto il viaggio', 'Alloggio in bivacco sotto tenda beduina', 'Pasti tradizionali preparati dai beduini']);
        $e1->setIncludedIcons(['tent-1', 'cottage', 'eat']);

        $e1->setExcludedFr(['Pourboires']);
        $e1->setExcludedEn(['Tips']);
        $e1->setExcludedAr(['البقشيش']);
        $e1->setExcludedIt(['Mance']);
        $e1->setExcludedIcons(['draw-check-mark']);

        $e1->setMealsBreakfastFr('Pain de sable, fromage, confiture, café, lait, thé');
        $e1->setMealsBreakfastEn('Sand bread, cheese, jam, coffee, milk, tea');
        $e1->setMealsBreakfastAr('خبز الرمل، جبن، مربى، قهوة، حليب، شاي');
        $e1->setMealsBreakfastIt('Pane di sabbia, formaggio, marmellata, caffè, latte, tè');

        $e1->setMealsLunchFr('Pain de sable, salade verte, fruits de saison, thé');
        $e1->setMealsLunchEn('Sand bread, green salad, seasonal fruit, tea');
        $e1->setMealsLunchAr('خبز الرمل، سلطة خضراء، فواكه موسمية، شاي');
        $e1->setMealsLunchIt('Pane di sabbia, insalata verde, frutta di stagione, tè');

        $e1->setMealsDinnerFr('Repas traditionnels du désert (chorba, couscous, dessert, thé)');
        $e1->setMealsDinnerEn('Traditional desert meals (chorba, couscous, dessert, tea)');
        $e1->setMealsDinnerAr('وجبات صحراوية تقليدية (شوربة، كسكسي، حلوى، شاي)');
        $e1->setMealsDinnerIt('Pasti tradizionali del deserto (chorba, couscous, dessert, tè)');

        $e1->setClosingFr("Ce séjour de 3 jours est l'idéal pour ceux qui veulent plonger au cœur du Sahara en toute simplicité et tranquillité. Une immersion parfaite dans les paysages mythiques du désert tunisien, avec des repas authentiques et des nuits à la belle étoile.");
        $e1->setClosingEn("This 3-day stay is ideal for those who want to dive into the heart of the Sahara in complete simplicity and tranquility. A perfect immersion in the mythical landscapes of the Tunisian desert, with authentic meals and nights under the stars.");
        $e1->setClosingAr("تُعد هذه الإقامة لمدة 3 أيام مثالية لمن يرغب في الانغماس في قلب الصحراء الكبرى ببساطة وهدوء تامين. انغماس مثالي في المناظر الطبيعية الأسطورية للصحراء التونسية، مع وجبات أصيلة وليالٍ تحت النجوم.");
        $e1->setClosingIt("Questo soggiorno di 3 giorni è ideale per chi desidera immergersi nel cuore del Sahara in totale semplicità e tranquillità. Un'immersione perfetta nei paesaggi mitici del deserto tunisino, con pasti autentici e notti sotto le stelle.");

        $e1->setReviewAvatar('t-2.jpg');
        $e1->setReviewName('Marie Dubois');
        $e1->setReviewCountry('France');
        $e1->setReviewRating(5);
        $e1->setReviewCommentFr("Trois jours parfaits pour découvrir le Sahara. Les nuits sous tente bédouine et les couchers de soleil sur les dunes resteront gravés dans ma mémoire.");
        $e1->setReviewCommentEn("Three perfect days to discover the Sahara. The nights under the Bedouin tent and the sunsets over the dunes will stay etched in my memory.");
        $e1->setReviewCommentAr("ثلاثة أيام مثالية لاكتشاف الصحراء الكبرى. ستبقى الليالي تحت الخيمة البدوية وغروب الشمس فوق الكثبان محفورة في ذاكرتي.");
        $e1->setReviewCommentIt("Tre giorni perfetti per scoprire il Sahara. Le notti sotto la tenda beduina e i tramonti sulle dune resteranno impressi nella mia memoria.");

        $e1->setGalleryImages([
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559711/8_gyuz3p.jpg', 'title' => 'Desert Outskirts'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559477/7_mcl3tr.jpg', 'title' => 'Sahara Trails'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788560647/6_k3qr6o.jpg', 'title' => 'Golden Horizon'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605761/baroudeurs/service/details/Rose/5.jpg', 'title' => 'Rose'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607759/baroudeurs/service/details/Endless/5.jpg', 'title' => 'Endless'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788609239/baroudeurs/service/details/Baroudeurs/4.jpg', 'title' => 'Baroudeurs'],
        ]);

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
        $e2->setPosition(2);

        $e2->setIntroFr("Baroudeurs de Désert : 15 jours / 14 nuits – Un voyage inoubliable au cœur du Sahara tunisien.");
        $e2->setIntroEn("Desert Baroudeurs: 15 days / 14 nights – An unforgettable journey into the heart of the Tunisian Sahara.");
        $e2->setIntroAr("بارودور الصحراء: 15 يومًا / 14 ليلة – رحلة لا تُنسى في قلب الصحراء التونسية الكبرى.");
        $e2->setIntroIt("Baroudeurs del Deserto: 15 giorni / 14 notti – Un viaggio indimenticabile nel cuore del Sahara tunisino.");

        $e2->setFullDescriptionFr("Un grand voyage de 15 jours à dos de dromadaire, de Bir Abdallah à El Mellaha, en passant par de nombreux sites isolés du désert. Chaque jour amène son lot de nouveaux paysages, de puits cachés et de montagnes de sable, avant un retour progressif vers Djerba ou Tozeur.");
        $e2->setFullDescriptionEn("A great 15-day camel journey from Bir Abdallah to El Mellaha, passing through numerous isolated desert sites. Each day brings new landscapes, hidden wells, and sand mountains, before a gradual return to Djerba or Tozeur.");
        $e2->setFullDescriptionAr("رحلة كبيرة لمدة 15 يومًا على ظهر الجمل، من بئر عبد الله إلى الملاحة، مرورًا بالعديد من المواقع الصحراوية المعزولة. يجلب كل يوم مناظر طبيعية جديدة وآبارًا مخفية وجبال رمل، قبل العودة التدريجية إلى جربة أو توزر.");
        $e2->setFullDescriptionIt("Un grande viaggio di 15 giorni in dromedario da Bir Abdallah a El Mellaha, attraversando numerosi siti isolati del deserto. Ogni giorno porta nuovi paesaggi, pozzi nascosti e montagne di sabbia, prima di un ritorno graduale a Djerba o Tozeur.");

        $e2->setItinerarySummaryFr("Ce périple de 15 jours relie Bir Abdallah à El Mellaha à travers une quinzaine de sites isolés du désert : Joua Moussa, Tembaine, Rebig Hammami, Trefissa, Lahwidhat et bien d'autres. Chaque étape combine marche à dos de dromadaire, découverte de puits et montagnes de sable, et nuits sous tente bédouine, avant le retour vers Djerba ou Tozeur.");
        $e2->setItinerarySummaryEn("This 15-day journey links Bir Abdallah to El Mellaha through around fifteen isolated desert sites: Joua Moussa, Tembaine, Rebig Hammami, Trefissa, Lahwidhat and many more. Each stage combines camel trekking, discovering wells and sand mountains, and nights under Bedouin tents, before returning to Djerba or Tozeur.");
        $e2->setItinerarySummaryAr("تربط هذه الرحلة التي تستغرق 15 يومًا بين بئر عبد الله والملاحة عبر نحو خمسة عشر موقعًا صحراويًا معزولاً: جوا موسى وتمباين وربيق حمامي وتريفيسا ولاهويضات وغيرها الكثير. تجمع كل مرحلة بين المشي على ظهر الجمل واكتشاف الآبار وجبال الرمل والمبيت تحت خيام بدوية، قبل العودة إلى جربة أو توزر.");
        $e2->setItinerarySummaryIt("Questo viaggio di 15 giorni collega Bir Abdallah a El Mellaha attraverso una quindicina di siti isolati del deserto: Joua Moussa, Tembaine, Rebig Hammami, Trefissa, Lahwidhat e molti altri. Ogni tappa unisce trekking in dromedario, scoperta di pozzi e montagne di sabbia, e notti sotto tende beduine, prima di tornare a Djerba o Tozeur.");

        $e2->setItineraryFr(['Djerba/Tozeur - Bir Abdallah', 'Bir Abdallah - Joua Moussa', 'Joua Moussa - Tembaine', 'Tembaine - Rebig Hammami', 'Rebig Hammami - Trefissa', 'Trefissa - Lahwidhat', 'Lahwidhat - Dakanis Sghar', 'Dakanis Sghar - Gour Kleb', 'Gour Kleb - El Mida', 'El Mida - Garat Abderrahim', 'Garat Abderrahim - Dhraa Chiaba', 'Dhraa Chiaba - Bir El Haj', 'Bir El Haj - El Mellaha', 'El Mellaha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Aéroport']);
        $e2->setItineraryEn(['Djerba/Tozeur - Bir Abdallah', 'Bir Abdallah - Joua Moussa', 'Joua Moussa - Tembaine', 'Tembaine - Rebig Hammami', 'Rebig Hammami - Trefissa', 'Trefissa - Lahwidhat', 'Lahwidhat - Dakanis Sghar', 'Dakanis Sghar - Gour Kleb', 'Gour Kleb - El Mida', 'El Mida - Garat Abderrahim', 'Garat Abderrahim - Dhraa Chiaba', 'Dhraa Chiaba - Bir El Haj', 'Bir El Haj - El Mellaha', 'El Mellaha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Airport']);
        $e2->setItineraryAr(['جربة/توزر - بئر عبد الله', 'بئر عبد الله - جوا موسى', 'جوا موسى - تمباين', 'تمباين - ربيق حمامي', 'ربيق حمامي - تريفيسا', 'تريفيسا - لاهويضات', 'لاهويضات - دكانيس صغار', 'دكانيس صغار - قور كلاب', 'قور كلاب - الميدة', 'الميدة - قارة عبد الرحيم', 'قارة عبد الرحيم - ضراع شعبة', 'ضراع شعبة - بئر الحاج', 'بئر الحاج - الملاحة', 'الملاحة - دوز - جربة/توزر', 'جربة/توزر - المطار']);
        $e2->setItineraryIt(['Djerba/Tozeur - Bir Abdallah', 'Bir Abdallah - Joua Moussa', 'Joua Moussa - Tembaine', 'Tembaine - Rebig Hammami', 'Rebig Hammami - Trefissa', 'Trefissa - Lahwidhat', 'Lahwidhat - Dakanis Sghar', 'Dakanis Sghar - Gour Kleb', 'Gour Kleb - El Mida', 'El Mida - Garat Abderrahim', 'Garat Abderrahim - Dhraa Chiaba', 'Dhraa Chiaba - Bir El Haj', 'Bir El Haj - El Mellaha', 'El Mellaha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Aeroporto']);

        $e2->setItineraryDetailFr([
            "Dès votre arrivée à l'aéroport de Djerba ou Tozeur, notre équipe vous accueille chaleureusement et vous accompagne vers le bivouac d'El Bir Abdallah. Après un premier contact avec les chameliers, vous vous installerez dans un cadre authentique, où le calme du désert vous enveloppe. Le dîner, préparé par les bédouins, sera l'occasion de découvrir les saveurs locales sous les étoiles. Nuit sous tente bédouine.",
            "Après un petit déjeuner traditionnel avec du pain de sable tout juste sorti du feu, vous vous enfoncerez au cœur du désert, traversant les dunes majestueuses en direction de Joua Moussa. Le déjeuner sera pris au milieu des sables, dans un cadre idyllique. La soirée se terminera avec un dîner au bivouac et une nuit sous la tente bédouine, bercée par les murmures du vent dans les dunes.",
            "Après un petit déjeuner au bivouac, vous continuerez votre expédition vers Tembaine, une montagne au milieu des dunes. Le paysage à couper le souffle vous accompagnera tout au long de la journée, avec un déjeuner dans les paysages fascinants du désert. Dîner et nuit sous tente bédouine.",
            "Réveil matinal pour admirer le lever du soleil sur l'immensité du désert. Après un petit déjeuner aux saveurs locales, vous prendrez la direction de Rebig Hammami, en traversant un paysage de dunes dorées. Vous déjeunerez dans cet endroit magique avant de repartir vers votre bivouac pour une soirée traditionnelle sous les étoiles. Nuit sous la tente.",
            "Après un réveil au cœur du désert, vous partirez en direction de Trefissa, un endroit magique entouré de dunes. Le déjeuner se déroulera dans cet environnement hors du temps, et le dîner préparé par les bédouins sera une nouvelle occasion de goûter aux saveurs authentiques du désert. Nuit sous la tente bédouine.",
            "Après un petit déjeuner savoureux, départ pour Lahwidhat, où vous découvrirez une source d'eau chaude en plein cœur du désert. Un déjeuner au milieu des dunes vous permettra de savourer cette aventure unique. Dîner et nuit sous tente bédouine.",
            "Ce matin, vous partirez pour Dakanis Sghar, une montagne de sable au panorama impressionnant. Le paysage qui vous entoure est à couper le souffle, parfait pour une pause photo et un déjeuner au cœur du désert. Le soir, dîner au bivouac et nuit sous tente.",
            "Réveil au lever du soleil pour prendre la route vers Gour Kleb, une autre montagne ensablée. Ce sera une journée de calme et de beauté, avec un déjeuner en pleine nature. Dîner au bivouac, nuit sous la tente bédouine.",
            "Direction El Mida, un autre site unique du désert, où les montagnes de sable et les paysages se transforment au fil de la journée. Vous déjeunerez en plein désert, un moment rare pour profiter pleinement de l'ambiance sereine. Le dîner sous les étoiles et la nuit sous la tente viendront clore cette journée de pure aventure.",
            "Réveil matinal pour admirer le lever du soleil sur Garat Abderrahim, une montagne ensablée aux formes étonnantes. Après le déjeuner, vous passerez une autre soirée magique au bivouac, bercée par le vent du désert. Nuit sous tente bédouine.",
            "Après un petit déjeuner savoureux, départ pour Dhraa Chiaba, un lieu reculé où le désert révèle toute sa splendeur. Le déjeuner dans ce cadre exceptionnel sera une occasion de se ressourcer. Dîner au bivouac et nuit sous tente.",
            "En matinée, départ pour Bir El Haj, un puits d'eau caché dans les dunes. Le désert vous livre ici ses secrets, entre silence et splendeur naturelle. Le déjeuner sera pris dans ce cadre isolé, loin du monde. Dîner et nuit sous tente.",
            "Après un bon petit déjeuner, direction El Mellaha, en traversant de belles dunes. Ce sera une journée de contemplation et de tranquillité, avec un déjeuner en pleine nature. Dîner et nuit sous la tente, toujours sous le ciel étoilé.",
            "Réveil aux premières lueurs de l'aube, puis départ pour Douz, la porte du désert. Après un déjeuner en plein désert, vous rejoindrez Djerba ou Tozeur pour un dîner bien mérité à l'hôtel et une nuit de repos.",
            "Après un dernier petit déjeuner, vous serez transféré à l'aéroport pour votre vol de retour, emportant avec vous des souvenirs inoubliables du Sahara.",
        ]);
        $e2->setItineraryDetailEn([
            "As soon as you arrive at Djerba or Tozeur airport, our team welcomes you warmly and takes you to the El Bir Abdallah bivouac. After a first meeting with the camel guides, you'll settle into an authentic setting, wrapped in the calm of the desert. Dinner, prepared by the Bedouins, will be a chance to discover local flavors under the stars. Night under a Bedouin tent.",
            "After a traditional breakfast with sand bread fresh from the fire, you'll head deep into the desert, crossing majestic dunes towards Joua Moussa. Lunch will be enjoyed amid the sands, in an idyllic setting. The evening will end with dinner at the bivouac and a night under the Bedouin tent, lulled by the whispers of the wind in the dunes.",
            "After breakfast at the bivouac, you'll continue your expedition towards Tembaine, a mountain amid the dunes. The breathtaking scenery will accompany you throughout the day, with lunch amid the fascinating desert landscapes. Dinner and night under a Bedouin tent.",
            "Early wake-up to admire the sunrise over the vastness of the desert. After a breakfast of local flavors, you'll head towards Rebig Hammami, crossing a landscape of golden dunes. You'll have lunch in this magical place before heading back to your bivouac for a traditional evening under the stars. Night under the tent.",
            "After waking up in the heart of the desert, you'll head towards Trefissa, a magical place surrounded by dunes. Lunch will take place in this timeless environment, and dinner prepared by the Bedouins will be another chance to taste the authentic flavors of the desert. Night under a Bedouin tent.",
            "After a tasty breakfast, departure for Lahwidhat, where you'll discover a hot spring in the heart of the desert. Lunch amid the dunes will let you savor this unique adventure. Dinner and night under a Bedouin tent.",
            "This morning, you'll head to Dakanis Sghar, a sand mountain with an impressive panorama. The scenery around you is breathtaking, perfect for a photo stop and lunch in the heart of the desert. In the evening, dinner at the bivouac and night under the tent.",
            "Wake up at sunrise to hit the road towards Gour Kleb, another sand-covered mountain. It will be a day of calm and beauty, with lunch in nature. Dinner at the bivouac, night under the Bedouin tent.",
            "Onward to El Mida, another unique desert site, where the sand mountains and landscapes transform over the course of the day. You'll have lunch in the open desert, a rare moment to fully enjoy the serene atmosphere. Dinner under the stars and the night under the tent will close this day of pure adventure.",
            "Early wake-up to admire the sunrise over Garat Abderrahim, a sand-covered mountain with astonishing shapes. After lunch, you'll spend another magical evening at the bivouac, lulled by the desert wind. Night under a Bedouin tent.",
            "After a tasty breakfast, departure for Dhraa Chiaba, a remote place where the desert reveals all its splendor. Lunch in this exceptional setting will be a chance to recharge. Dinner at the bivouac and night under the tent.",
            "In the morning, departure for Bir El Haj, a well hidden in the dunes. Here the desert reveals its secrets, between silence and natural splendor. Lunch will be taken in this isolated setting, far from the world. Dinner and night under the tent.",
            "After a good breakfast, onward to El Mellaha, crossing beautiful dunes. It will be a day of contemplation and tranquility, with lunch in nature. Dinner and night under the tent, always beneath the starry sky.",
            "Wake up at the first light of dawn, then departure for Douz, the gateway to the desert. After lunch in the open desert, you'll reach Djerba or Tozeur for a well-deserved dinner at the hotel and a restful night.",
            "After one last breakfast, you'll be transferred to the airport for your return flight, taking with you unforgettable memories of the Sahara.",
        ]);
        $e2->setItineraryDetailAr([
            "بمجرد وصولكم إلى مطار جربة أو توزر، يستقبلكم فريقنا بحرارة ويرافقكم إلى مخيم بئر عبد الله. بعد أول لقاء مع الجمالة، ستستقرون في أجواء أصيلة يلفكم فيها هدوء الصحراء. سيكون العشاء، الذي يعده البدو، فرصة لاكتشاف النكهات المحلية تحت النجوم. المبيت تحت خيمة بدوية.",
            "بعد فطور تقليدي بخبز الرمل الطازج المخبوز على النار، ستتوغلون في قلب الصحراء، عابرين الكثبان الشامخة نحو جوا موسى. سيُقدَّم الغداء وسط الرمال، في أجواء مثالية. تنتهي الأمسية بعشاء في المخيم ومبيت تحت الخيمة البدوية، مع همسات الريح بين الكثبان.",
            "بعد فطور في المخيم، ستواصلون رحلتكم نحو تمباين، وهو جبل وسط الكثبان. سترافقكم المناظر الطبيعية الخلابة طوال اليوم، مع غداء في مناظر الصحراء الساحرة. عشاء ومبيت تحت خيمة بدوية.",
            "استيقاظ مبكر للاستمتاع بشروق الشمس فوق اتساع الصحراء. بعد فطور بنكهات محلية، ستتوجهون نحو ربيق حمامي، عابرين مناظر من الكثبان الذهبية. ستتناولون الغداء في هذا المكان الساحر قبل العودة إلى مخيمكم لأمسية تقليدية تحت النجوم. المبيت تحت الخيمة.",
            "بعد استيقاظ في قلب الصحراء، ستتوجهون نحو تريفيسا، وهو مكان ساحر محاط بالكثبان. سيكون الغداء في هذه الأجواء الخالدة، وسيكون العشاء الذي يعده البدو فرصة أخرى لتذوق نكهات الصحراء الأصيلة. المبيت تحت خيمة بدوية.",
            "بعد فطور شهي، الانطلاق نحو لاهويضات، حيث ستكتشفون ينبوعًا حارًا في قلب الصحراء. سيتيح لكم الغداء وسط الكثبان الاستمتاع بهذه المغامرة الفريدة. عشاء ومبيت تحت خيمة بدوية.",
            "هذا الصباح، ستتوجهون نحو دكانيس صغار، وهو جبل رملي ذو منظر بانورامي مذهل. المناظر المحيطة بكم خلابة، مثالية لوقفة تصوير وغداء في قلب الصحراء. مساءً، عشاء في المخيم ومبيت تحت الخيمة.",
            "الاستيقاظ عند شروق الشمس لسلوك الطريق نحو قور كلاب، وهو جبل رملي آخر. سيكون يومًا من الهدوء والجمال، مع غداء في الطبيعة. عشاء في المخيم، مبيت تحت خيمة بدوية.",
            "التوجه نحو الميدة، وهو موقع صحراوي فريد آخر، حيث تتحول جبال الرمل والمناظر الطبيعية على مدار اليوم. ستتناولون الغداء في قلب الصحراء، لحظة نادرة للاستمتاع الكامل بالأجواء الهادئة. سيختتم العشاء تحت النجوم والمبيت تحت الخيمة هذا اليوم من المغامرة الخالصة.",
            "استيقاظ مبكر للاستمتاع بشروق الشمس فوق قارة عبد الرحيم، وهو جبل رملي ذو أشكال مدهشة. بعد الغداء، ستقضون أمسية ساحرة أخرى في المخيم، مع نسمات رياح الصحراء. المبيت تحت خيمة بدوية.",
            "بعد فطور شهي، الانطلاق نحو ضراع شعبة، وهو مكان نائي حيث تكشف الصحراء عن كل روعتها. سيكون الغداء في هذه الأجواء الاستثنائية فرصة لاستعادة النشاط. عشاء في المخيم ومبيت تحت الخيمة.",
            "صباحًا، الانطلاق نحو بئر الحاج، وهو بئر مخفي بين الكثبان. تكشف الصحراء هنا عن أسرارها، بين الصمت والروعة الطبيعية. سيُقدَّم الغداء في هذه الأجواء المعزولة، بعيدًا عن العالم. عشاء ومبيت تحت الخيمة.",
            "بعد فطور جيد، التوجه نحو الملاحة، عبر كثبان جميلة. سيكون يومًا للتأمل والهدوء، مع غداء في الطبيعة. عشاء ومبيت تحت الخيمة، دائمًا تحت سماء مرصعة بالنجوم.",
            "الاستيقاظ مع أولى بشائر الفجر، ثم الانطلاق نحو دوز، بوابة الصحراء. بعد غداء في قلب الصحراء، ستصلون إلى جربة أو توزر لتناول عشاء تستحقونه في الفندق ومبيت مريح.",
            "بعد فطور أخير، سيتم نقلكم إلى المطار لرحلة عودتكم، حاملين معكم ذكريات لا تُنسى من الصحراء الكبرى.",
        ]);
        $e2->setItineraryDetailIt([
            "Non appena arrivate all'aeroporto di Djerba o Tozeur, il nostro team vi accoglie calorosamente e vi accompagna al bivacco di El Bir Abdallah. Dopo un primo incontro con i cammellieri, vi sistemerete in un ambiente autentico, avvolti dalla calma del deserto. La cena, preparata dai beduini, sarà l'occasione per scoprire i sapori locali sotto le stelle. Notte sotto la tenda beduina.",
            "Dopo una colazione tradizionale con pane di sabbia appena sfornato, vi addentrerete nel cuore del deserto, attraversando dune maestose verso Joua Moussa. Il pranzo sarà consumato tra le sabbie, in un ambiente idilliaco. La serata si concluderà con una cena al bivacco e una notte sotto la tenda beduina, cullati dai sussurri del vento tra le dune.",
            "Dopo la colazione al bivacco, proseguirete la vostra spedizione verso Tembaine, una montagna in mezzo alle dune. Il paesaggio mozzafiato vi accompagnerà per tutta la giornata, con il pranzo tra gli affascinanti paesaggi del deserto. Cena e notte sotto la tenda beduina.",
            "Sveglia mattutina per ammirare l'alba sull'immensità del deserto. Dopo una colazione dai sapori locali, vi dirigerete verso Rebig Hammami, attraversando un paesaggio di dune dorate. Pranzerete in questo luogo magico prima di tornare al vostro bivacco per una serata tradizionale sotto le stelle. Notte sotto la tenda.",
            "Dopo un risveglio nel cuore del deserto, vi dirigerete verso Trefissa, un luogo magico circondato da dune. Il pranzo si svolgerà in questo ambiente senza tempo, e la cena preparata dai beduini sarà un'altra occasione per assaporare i gusti autentici del deserto. Notte sotto la tenda beduina.",
            "Dopo una gustosa colazione, partenza per Lahwidhat, dove scoprirete una sorgente termale nel cuore del deserto. Un pranzo tra le dune vi permetterà di assaporare questa avventura unica. Cena e notte sotto la tenda beduina.",
            "Questa mattina, vi dirigerete verso Dakanis Sghar, una montagna di sabbia dal panorama impressionante. Il paesaggio che vi circonda è mozzafiato, perfetto per una sosta fotografica e un pranzo nel cuore del deserto. La sera, cena al bivacco e notte sotto la tenda.",
            "Sveglia all'alba per mettersi in viaggio verso Gour Kleb, un'altra montagna sabbiosa. Sarà una giornata di calma e bellezza, con il pranzo nella natura. Cena al bivacco, notte sotto la tenda beduina.",
            "Direzione El Mida, un altro sito unico del deserto, dove le montagne di sabbia e i paesaggi si trasformano nel corso della giornata. Pranzerete nel deserto aperto, un momento raro per godere appieno dell'atmosfera serena. La cena sotto le stelle e la notte sotto la tenda concluderanno questa giornata di pura avventura.",
            "Sveglia mattutina per ammirare l'alba su Garat Abderrahim, una montagna sabbiosa dalle forme sorprendenti. Dopo il pranzo, trascorrerete un'altra serata magica al bivacco, cullati dal vento del deserto. Notte sotto la tenda beduina.",
            "Dopo una gustosa colazione, partenza per Dhraa Chiaba, un luogo remoto dove il deserto rivela tutto il suo splendore. Il pranzo in questo ambiente eccezionale sarà un'occasione per ricaricarsi. Cena al bivacco e notte sotto la tenda.",
            "Al mattino, partenza per Bir El Haj, un pozzo nascosto tra le dune. Qui il deserto vi svela i suoi segreti, tra silenzio e splendore naturale. Il pranzo sarà consumato in questo ambiente isolato, lontano dal mondo. Cena e notte sotto la tenda.",
            "Dopo una buona colazione, direzione El Mellaha, attraversando belle dune. Sarà una giornata di contemplazione e tranquillità, con il pranzo nella natura. Cena e notte sotto la tenda, sempre sotto il cielo stellato.",
            "Sveglia ai primi bagliori dell'alba, poi partenza per Douz, la porta del deserto. Dopo il pranzo nel deserto aperto, raggiungerete Djerba o Tozeur per una cena meritata in hotel e una notte di riposo.",
            "Dopo un'ultima colazione, sarete trasferiti in aeroporto per il volo di ritorno, portando con voi ricordi indimenticabili del Sahara.",
        ]);

        $e2->setIncludedFr(['Pension complète tout au long du séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners typiques préparés par des bédouins', 'Transports et assistance durant tout le séjour']);
        $e2->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional dinners prepared by the Bedouins', 'Transport and assistance throughout the stay']);
        $e2->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات تقليدية يعدها البدو', 'النقل والمساعدة طوال فترة الإقامة']);
        $e2->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene tradizionali preparate dai beduini', 'Trasporti e assistenza per tutto il soggiorno']);
        $e2->setIncludedIcons(['eat', 'tent-1', 'campfire', 'van']);

        $e2->setExcludedFr(['Boissons dans les hôtels et restaurants', 'Pourboires']);
        $e2->setExcludedEn(['Drinks in hotels and restaurants', 'Tips']);
        $e2->setExcludedAr(['المشروبات في الفنادق والمطاعم', 'البقشيش']);
        $e2->setExcludedIt(['Bevande in hotel e ristoranti', 'Mance']);
        $e2->setExcludedIcons(['pot', 'draw-check-mark']);

        $e2->setMealsBreakfastFr('Pain de sable, fromage, confiture, café, lait, thé');
        $e2->setMealsBreakfastEn('Sand bread, cheese, jam, coffee, milk, tea');
        $e2->setMealsBreakfastAr('خبز الرمل، جبن، مربى، قهوة، حليب، شاي');
        $e2->setMealsBreakfastIt('Pane di sabbia, formaggio, marmellata, caffè, latte, tè');

        $e2->setMealsLunchFr('Pain de sable, salade verte, fruits de la saison, thé');
        $e2->setMealsLunchEn('Sand bread, green salad, seasonal fruit, tea');
        $e2->setMealsLunchAr('خبز الرمل، سلطة خضراء، فواكه موسمية، شاي');
        $e2->setMealsLunchIt('Pane di sabbia, insalata verde, frutta di stagione, tè');

        $e2->setMealsDinnerFr('Plats traditionnels (chorba, couscous, dessert, thé)');
        $e2->setMealsDinnerEn('Traditional dishes (chorba, couscous, dessert, tea)');
        $e2->setMealsDinnerAr('أطباق تقليدية (شوربة، كسكسي، حلوى، شاي)');
        $e2->setMealsDinnerIt('Piatti tradizionali (chorba, couscous, dessert, tè)');

        $e2->setClosingFr("Ce voyage est fait pour ceux qui rêvent de s'évader totalement et de vivre l'immensité du désert tunisien à son apogée. Un périple authentique, où chaque journée vous emmène un peu plus loin dans la magie du Sahara. Au-delà des paysages époustouflants, vous plongerez dans une expérience humaine et spirituelle unique, loin de la civilisation. Préparez-vous à vivre l'aventure d'une vie !");
        $e2->setClosingEn("This journey is made for those who dream of escaping completely and experiencing the immensity of the Tunisian desert at its peak. An authentic journey, where each day takes you a little further into the magic of the Sahara. Beyond the breathtaking landscapes, you will dive into a unique human and spiritual experience, far from civilization. Get ready to live the adventure of a lifetime!");
        $e2->setClosingAr("هذه الرحلة مخصصة لمن يحلم بالهروب التام وعيش اتساع الصحراء التونسية في أوجها. رحلة أصيلة، حيث يأخذكم كل يوم إلى أبعد قليلاً في سحر الصحراء الكبرى. وبعيدًا عن المناظر الطبيعية الخلابة، ستنغمسون في تجربة إنسانية وروحية فريدة، بعيدًا عن الحضارة. استعدوا لعيش مغامرة العمر!");
        $e2->setClosingIt("Questo viaggio è fatto per chi sogna di evadere completamente e vivere l'immensità del deserto tunisino al suo apice. Un percorso autentico, dove ogni giorno vi porta un po' più lontano nella magia del Sahara. Oltre ai paesaggi mozzafiato, vi immergerete in un'esperienza umana e spirituale unica, lontano dalla civiltà. Preparatevi a vivere l'avventura di una vita!");

        $e2->setReviewAvatar('t-4.jpg');
        $e2->setReviewName('Hans Weber');
        $e2->setReviewCountry('Germany');
        $e2->setReviewRating(5);
        $e2->setReviewCommentFr("Quinze jours qui ont changé ma perception du désert. Chaque site avait sa propre magie, et les chameliers étaient d'une gentillesse incroyable.");
        $e2->setReviewCommentEn("Fifteen days that changed my perception of the desert. Every site had its own magic, and the camel guides were incredibly kind.");
        $e2->setReviewCommentAr("خمسة عشر يومًا غيّرت نظرتي إلى الصحراء. كان لكل موقع سحره الخاص، وكان الجمالة لطفاء بشكل لا يصدق.");
        $e2->setReviewCommentIt("Quindici giorni che hanno cambiato la mia percezione del deserto. Ogni sito aveva la sua magia, e i cammellieri erano incredibilmente gentili.");

        $e2->setGalleryImages([
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608967/baroudeurs/service/details/Baroudeurs/2.jpg', 'title' => 'Baroudeurs'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608874/baroudeurs/service/details/Circuit/5.jpg', 'title' => 'Circuit'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607904/baroudeurs/service/details/Charm/1.jpg', 'title' => 'Charm'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607644/baroudeurs/service/details/Endless/3.jpg', 'title' => 'Endless'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606078/baroudeurs/service/details/Mirage/5.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605752/baroudeurs/service/details/Rose/3.jpg', 'title' => 'Rose'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605761/baroudeurs/service/details/Rose/5.jpg', 'title' => 'Rose'],
        ]);

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
        $e3->setPosition(3);

        $e3->setIntroFr("Charme du désert : 2 jours / 1 nuit – Une escapade magique au cœur du Sahara.");
        $e3->setIntroEn("Desert Charm: 2 days / 1 night – A magical getaway in the heart of the Sahara.");
        $e3->setIntroAr("سحر الصحراء: يومان / ليلة واحدة – رحلة ساحرة في قلب الصحراء الكبرى.");
        $e3->setIntroIt("Fascino del Deserto: 2 giorni / 1 notte – Una fuga magica nel cuore del Sahara.");

        $e3->setFullDescriptionFr("Une escapade de 2 jours et 1 nuit de Douz à Dhirat Aicha et retour, idéale pour une immersion rapide dans le désert. Repas en pleine nature, dîner autour du feu et nuit sous tente bédouine composent cette parenthèse hors du temps.");
        $e3->setFullDescriptionEn("A 2-day, 1-night getaway from Douz to Dhirat Aicha and back, ideal for a quick immersion in the desert. Meals in the open air, a dinner around the fire, and a night under a Bedouin tent make up this timeless break.");
        $e3->setFullDescriptionAr("رحلة لمدة يومين وليلة واحدة من دوز إلى ذراع عيشة والعودة، مثالية لانغماس سريع في الصحراء. تتكون هذه الاستراحة الخالدة من وجبات في الطبيعة وعشاء حول النار ومبيت تحت خيمة بدوية.");
        $e3->setFullDescriptionIt("Una fuga di 2 giorni e 1 notte da Douz a Dhirat Aicha e ritorno, ideale per un'immersione rapida nel deserto. Pasti all'aperto, una cena intorno al fuoco e una notte sotto la tenda beduina compongono questa pausa senza tempo.");

        $e3->setItinerarySummaryFr("Ce court séjour relie Douz à Dhirat Aicha, avec une nuit sous tente bédouine et un retour à Douz le lendemain. Idéal pour ceux qui cherchent une immersion rapide dans le désert tunisien.");
        $e3->setItinerarySummaryEn("This short stay links Douz to Dhirat Aicha, with a night under a Bedouin tent and a return to Douz the next day. Ideal for those seeking a quick immersion in the Tunisian desert.");
        $e3->setItinerarySummaryAr("تربط هذه الإقامة القصيرة بين دوز وذراع عيشة، مع مبيت تحت خيمة بدوية والعودة إلى دوز في اليوم التالي. مثالية لمن يبحث عن انغماس سريع في الصحراء التونسية.");
        $e3->setItinerarySummaryIt("Questo breve soggiorno collega Douz a Dhirat Aicha, con una notte sotto la tenda beduina e il ritorno a Douz il giorno successivo. Ideale per chi cerca un'immersione rapida nel deserto tunisino.");

        $e3->setItineraryFr(['Douz - Dhirat Aicha', 'Dhirat Aicha - Douz']);
        $e3->setItineraryEn(['Douz - Dhirat Aicha', 'Dhirat Aicha - Douz']);
        $e3->setItineraryAr(['دوز - ذراع عيشة', 'ذراع عيشة - دوز']);
        $e3->setItineraryIt(['Douz - Dhirat Aicha', 'Dhirat Aicha - Douz']);

        $e3->setItineraryDetailFr([
            "Dès votre arrivée à Douz, un petit déjeuner savoureux vous attend, préparé avec soin pour bien commencer la journée. Ensuite, votre aventure dans le désert commence avec un trajet vers Dhirat Aicha, un lieu de tranquillité absolue au cœur des dunes dorées. Le déjeuner se déroulera en pleine nature, offrant une vue à couper le souffle sur les paysages désertiques. En soirée, vous profiterez d'un dîner traditionnel autour du feu, avant de passer la nuit dans le confort de votre bivouac sous les étoiles, dans une ambiance authentique. Nuit sous tente bédouine.",
            "Réveil aux premières lueurs du matin, pour assister à un lever de soleil spectaculaire sur l'immensité du désert. Après un petit déjeuner au bivouac, vous reprendrez la route vers Douz, la \"porte du désert\". Le déjeuner se déroulera à nouveau en pleine nature, dans ce décor unique de dunes infinies. Après cette dernière étape, vous serez transféré à Douz pour la fin de cette escapade inoubliable.",
        ]);
        $e3->setItineraryDetailEn([
            "Upon arrival in Douz, a tasty breakfast awaits you, carefully prepared to start the day well. Then your desert adventure begins with a drive to Dhirat Aicha, a place of absolute tranquility in the heart of the golden dunes. Lunch will take place in the open air, offering a breathtaking view of the desert landscapes. In the evening, you'll enjoy a traditional dinner around the fire, before spending the night in the comfort of your bivouac under the stars, in an authentic atmosphere. Night under a Bedouin tent.",
            "Wake up at first light to witness a spectacular sunrise over the vastness of the desert. After breakfast at the bivouac, you'll head back towards Douz, the \"gateway to the desert\". Lunch will once again take place in the open air, in this unique setting of endless dunes. After this final stage, you'll be transferred to Douz for the end of this unforgettable getaway.",
        ]);
        $e3->setItineraryDetailAr([
            "عند وصولكم إلى دوز، ينتظركم فطور شهي، أُعد بعناية لبدء اليوم على أحسن وجه. بعدها، تبدأ مغامرتكم الصحراوية برحلة نحو ذراع عيشة، وهو مكان هادئ تمامًا في قلب الكثبان الذهبية. سيُقدَّم الغداء في الطبيعة، مع منظر خلاب على المناظر الصحراوية. مساءً، ستستمتعون بعشاء تقليدي حول النار، قبل قضاء الليلة في راحة مخيمكم تحت النجوم، في أجواء أصيلة. المبيت تحت خيمة بدوية.",
            "الاستيقاظ عند أولى بشائر الصباح، لمشاهدة شروق شمس رائع فوق اتساع الصحراء. بعد فطور في المخيم، ستعودون على الطريق نحو دوز، \"بوابة الصحراء\". سيُقدَّم الغداء مجددًا في الطبيعة، في هذا الديكور الفريد من الكثبان اللانهائية. بعد هذه المرحلة الأخيرة، سيتم نقلكم إلى دوز لإنهاء هذه الرحلة التي لا تُنسى.",
        ]);
        $e3->setItineraryDetailIt([
            "Al vostro arrivo a Douz, vi aspetta una gustosa colazione, preparata con cura per iniziare bene la giornata. Poi la vostra avventura nel deserto inizia con un tragitto verso Dhirat Aicha, un luogo di assoluta tranquillità nel cuore delle dune dorate. Il pranzo si svolgerà all'aperto, offrendo una vista mozzafiato sui paesaggi desertici. La sera, gusterete una cena tradizionale intorno al fuoco, prima di trascorrere la notte nel comfort del vostro bivacco sotto le stelle, in un'atmosfera autentica. Notte sotto la tenda beduina.",
            "Sveglia ai primi bagliori del mattino, per assistere a un'alba spettacolare sull'immensità del deserto. Dopo la colazione al bivacco, riprenderete la strada verso Douz, la \"porta del deserto\". Il pranzo si svolgerà di nuovo all'aperto, in questo scenario unico di dune infinite. Dopo quest'ultima tappa, sarete trasferiti a Douz per la fine di questa fuga indimenticabile.",
        ]);

        $e3->setIncludedFr(['Pension complète durant tout le séjour', 'Hébergement en bivouac sous tente bédouine', 'Repas typiques préparés par les bédouins']);
        $e3->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional meals prepared by the Bedouins']);
        $e3->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'وجبات تقليدية يعدها البدو']);
        $e3->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Pasti tradizionali preparati dai beduini']);
        $e3->setIncludedIcons(['tent-1', 'cottage', 'eat']);

        $e3->setExcludedFr(['Pourboires']);
        $e3->setExcludedEn(['Tips']);
        $e3->setExcludedAr(['البقشيش']);
        $e3->setExcludedIt(['Mance']);
        $e3->setExcludedIcons(['draw-check-mark']);

        $e3->setMealsBreakfastFr('Pain de sable, fromage, confiture, café, lait, thé');
        $e3->setMealsBreakfastEn('Sand bread, cheese, jam, coffee, milk, tea');
        $e3->setMealsBreakfastAr('خبز الرمل، جبن، مربى، قهوة، حليب، شاي');
        $e3->setMealsBreakfastIt('Pane di sabbia, formaggio, marmellata, caffè, latte, tè');

        $e3->setMealsLunchFr('Pain de sable, salade verte, fruits de saison, thé');
        $e3->setMealsLunchEn('Sand bread, green salad, seasonal fruit, tea');
        $e3->setMealsLunchAr('خبز الرمل، سلطة خضراء، فواكه موسمية، شاي');
        $e3->setMealsLunchIt('Pane di sabbia, insalata verde, frutta di stagione, tè');

        $e3->setMealsDinnerFr('Repas typiques du désert (chorba, couscous, dessert, thé)');
        $e3->setMealsDinnerEn('Traditional desert meals (chorba, couscous, dessert, tea)');
        $e3->setMealsDinnerAr('وجبات صحراوية تقليدية (شوربة، كسكسي، حلوى، شاي)');
        $e3->setMealsDinnerIt('Pasti tipici del deserto (chorba, couscous, dessert, tè)');

        $e3->setClosingFr("Un séjour court mais intense, idéal pour ceux qui cherchent à s'évader et à découvrir la magie du désert tunisien en toute simplicité. Une immersion dans un monde où le temps semble s'arrêter, un moment parfait pour se ressourcer et se reconnecter avec la nature.");
        $e3->setClosingEn("A short but intense stay, ideal for those looking to escape and discover the magic of the Tunisian desert in complete simplicity. An immersion in a world where time seems to stand still, a perfect moment to recharge and reconnect with nature.");
        $e3->setClosingAr("إقامة قصيرة لكن مكثفة، مثالية لمن يبحث عن الهروب واكتشاف سحر الصحراء التونسية ببساطة تامة. انغماس في عالم يبدو فيه الزمن متوقفًا، لحظة مثالية لاستعادة النشاط وإعادة التواصل مع الطبيعة.");
        $e3->setClosingIt("Un soggiorno breve ma intenso, ideale per chi cerca di evadere e scoprire la magia del deserto tunisino in tutta semplicità. Un'immersione in un mondo dove il tempo sembra fermarsi, un momento perfetto per ricaricarsi e riconnettersi con la natura.");

        $e3->setReviewAvatar('t-6.jpg');
        $e3->setReviewName('Elena Popescu');
        $e3->setReviewCountry('Romania');
        $e3->setReviewRating(4);
        $e3->setReviewCommentFr("Deux jours parfaits pour un premier contact avec le désert. Le lever de soleil sur les dunes était à couper le souffle.");
        $e3->setReviewCommentEn("Two perfect days for a first contact with the desert. The sunrise over the dunes was breathtaking.");
        $e3->setReviewCommentAr("يومان مثاليان للتعرف على الصحراء لأول مرة. كان شروق الشمس فوق الكثبان خلابًا.");
        $e3->setReviewCommentIt("Due giorni perfetti per un primo contatto con il deserto. L'alba sulle dune era mozzafiato.");

        $e3->setGalleryImages([
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788560663/1_xloiai.jpg', 'title' => 'Desert Path'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559522/7_axyvup.jpg', 'title' => 'Dune Whispers'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606531/baroudeurs/service/details/Temba%C3%AFne/4.jpg', 'title' => 'Tembaïne'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606117/baroudeurs/service/details/Temba%C3%AFne/1.jpg', 'title' => 'Tembaïne'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607767/baroudeurs/service/details/Endless/6.jpg', 'title' => 'Endless'],
        ]);

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
        $e4->setPosition(4);

        $e4->setIntroFr("Désert Infini : 8 jours / 7 nuits – Aventure et sérénité au cœur du Sahara tunisien.");
        $e4->setIntroEn("Endless Desert: 8 days / 7 nights – Adventure and serenity in the heart of the Tunisian Sahara.");
        $e4->setIntroAr("الصحراء اللانهائية: 8 أيام / 7 ليال – مغامرة وسكينة في قلب الصحراء التونسية.");
        $e4->setIntroIt("Deserto Infinito: 8 giorni / 7 notti – Avventura e serenità nel cuore del Sahara tunisino.");

        $e4->setFullDescriptionFr("Un voyage de 8 jours à dos de dromadaire, de Djerba ou Tozeur jusqu'à El Mellaha, Le Meezil, Bir El Haj, Hgif El Boum, Dakhla et enfin l'oasis mythique de Ksar Ghilane. Chaque étape combine marche dans les dunes, bivouacs sous tente bédouine et repas préparés par les bédouins, avant un retour progressif vers Djerba ou Tozeur.");
        $e4->setFullDescriptionEn("An 8-day camel journey from Djerba or Tozeur to El Mellaha, Le Meezil, Bir El Haj, Hgif El Boum, Dakhla, and finally the mythical oasis of Ksar Ghilane. Each stage combines walking through the dunes, bivouacs under Bedouin tents, and meals prepared by the Bedouins, before a gradual return to Djerba or Tozeur.");
        $e4->setFullDescriptionAr("رحلة لمدة 8 أيام على ظهر الجمل، من جربة أو توزر إلى الملاحة والميزيل وبئر الحاج وحقيف البوم والدخلة وأخيرًا واحة قصر غيلان الأسطورية. تجمع كل مرحلة بين المشي في الكثبان والمبيت في مخيمات تحت خيام بدوية ووجبات يعدها البدو، قبل العودة التدريجية إلى جربة أو توزر.");
        $e4->setFullDescriptionIt("Un viaggio di 8 giorni in dromedario, da Djerba o Tozeur a El Mellaha, Le Meezil, Bir El Haj, Hgif El Boum, Dakhla e infine l'oasi mitica di Ksar Ghilane. Ogni tappa unisce camminate tra le dune, bivacchi sotto tende beduine e pasti preparati dai beduini, prima di un ritorno graduale a Djerba o Tozeur.");

        $e4->setItinerarySummaryFr("Ce circuit de 8 jours relie Djerba ou Tozeur à El Mellaha, puis Le Meezil, Bir El Haj, Hgif El Boum, Dakhla et Ksar Ghilane, avant de repartir. Chaque jour combine trek à dos de dromadaire, découverte de puits et d'oasis, et nuits sous tente bédouine.");
        $e4->setItinerarySummaryEn("This 8-day circuit links Djerba or Tozeur to El Mellaha, then Le Meezil, Bir El Haj, Hgif El Boum, Dakhla, and Ksar Ghilane, before heading back. Each day combines camel trekking, discovering wells and oases, and nights under a Bedouin tent.");
        $e4->setItinerarySummaryAr("تربط هذه الرحلة التي تستغرق 8 أيام بين جربة أو توزر والملاحة، ثم الميزيل وبئر الحاج وحقيف البوم والدخلة وقصر غيلان، قبل العودة. يجمع كل يوم بين رحلة على ظهر الجمل واكتشاف الآبار والواحات ومبيت تحت خيمة بدوية.");
        $e4->setItinerarySummaryIt("Questo circuito di 8 giorni collega Djerba o Tozeur a El Mellaha, poi Le Meezil, Bir El Haj, Hgif El Boum, Dakhla e Ksar Ghilane, prima di tornare. Ogni giorno unisce trekking in dromedario, scoperta di pozzi e oasi, e notti sotto la tenda beduina.");

        $e4->setItineraryFr(['Djerba/Tozeur - Douz - El Mellaha', 'El Mellaha - Le Meezil', 'Le Meezil - Bir El Haj', 'Bir El Haj - Hgif El Boum', 'Hgif El Boum - Dakhla', 'Dakhla - Ksar Ghilane', 'Ksar Ghilane - Djerba/Tozeur', 'Djerba/Tozeur - Aéroport']);
        $e4->setItineraryEn(['Djerba/Tozeur - Douz - El Mellaha', 'El Mellaha - Le Meezil', 'Le Meezil - Bir El Haj', 'Bir El Haj - Hgif El Boum', 'Hgif El Boum - Dakhla', 'Dakhla - Ksar Ghilane', 'Ksar Ghilane - Djerba/Tozeur', 'Djerba/Tozeur - Airport']);
        $e4->setItineraryAr(['جربة/توزر - دوز - الملاحة', 'الملاحة - الميزيل', 'الميزيل - بئر الحاج', 'بئر الحاج - حقيف البوم', 'حقيف البوم - الدخلة', 'الدخلة - قصر غيلان', 'قصر غيلان - جربة/توزر', 'جربة/توزر - المطار']);
        $e4->setItineraryIt(['Djerba/Tozeur - Douz - El Mellaha', 'El Mellaha - Le Meezil', 'Le Meezil - Bir El Haj', 'Bir El Haj - Hgif El Boum', 'Hgif El Boum - Dakhla', 'Dakhla - Ksar Ghilane', 'Ksar Ghilane - Djerba/Tozeur', 'Djerba/Tozeur - Aeroporto']);

        $e4->setItineraryDetailFr([
            "À votre arrivée à l'aéroport de Djerba ou Tozeur, un accueil chaleureux vous attend avant un transfert vers El Mellaha, en passant par Douz, la célèbre porte du désert. Vous aurez votre premier contact avec l'univers des chameliers, avant de vous installer dans votre bivouac. Dîner au coin du feu, sous un ciel étoilé, et nuit dans une tente bédouine, pour une expérience authentique au cœur du Sahara.",
            "Après un petit déjeuner savoureux, vous partez pour Le Meezil, en traversant les magnifiques dunes de sable qui ondulent à perte de vue. Le déjeuner sera pris en plein désert, un moment unique pour savourer la tranquillité du lieu. Le soir, un dîner traditionnel préparé par les bédouins vous attend avant une nouvelle nuit sous les étoiles dans votre bivouac.",
            "Le matin, après une nuit réparatrice sous un ciel sans nuages, vous prendrez la route de Bir El Haj, un lieu secret où se cache un puits d'eau au cœur du désert. Le déjeuner sera pris au milieu des dunes, dans un paysage spectaculaire. Après cette journée de dépaysement total, dîner sous les étoiles et nuit dans votre bivouac.",
            "Réveillez-vous tôt pour observer l'un des plus beaux levers de soleil du monde. Ensuite, vous partirez vers Hgif El Boum, un autre lieu magique aux paysages de dunes sans fin. Vous déjeunerez en plein désert, avant de vous installer pour la nuit dans un bivouac confortable sous la tente bédouine, avec un dîner aux saveurs locales.",
            "Petit déjeuner au bivouac, puis départ vers Dakhla, un endroit où les dunes se mêlent à l'horizon. Profitez d'un déjeuner dans ce décor à couper le souffle, avant de continuer à explorer ce monde infini de sable et de silence. Le soir, dîner et nuit sous la tente bédouine, une expérience purement saharienne.",
            "Ce matin, après le petit déjeuner, vous partirez en direction de Ksar Ghilane, une oasis mythique aux sources d'eau chaude. Ce lieu, qui marque la limite entre le monde romain et les tribus bédouines du désert, est un symbole fort de l'histoire de la région. Déjeuner dans cet environnement magnifique, puis retour au bivouac pour un dîner traditionnel préparé par les bédouins. Nuit sous la tente bédouine.",
            "Réveillez-vous tôt pour un dernier moment magique dans le désert, avec une baignade relaxante dans les sources d'eau chaude de Ksar Ghilane. Après un déjeuner tranquille, vous repartirez vers Djerba ou Tozeur. Vous serez transféré à votre hôtel pour un dîner et une nuit bien méritée, après cette aventure hors du commun.",
            "Après un dernier petit déjeuner, transfert à l'aéroport pour votre vol de retour, la tête pleine de souvenirs inoubliables et d'images gravées dans votre mémoire.",
        ]);
        $e4->setItineraryDetailEn([
            "Upon arrival at Djerba or Tozeur airport, a warm welcome awaits you before a transfer to El Mellaha, passing through Douz, the famous gateway to the desert. You'll have your first contact with the world of camel guides before settling into your bivouac. Dinner by the fire, under a starry sky, and a night in a Bedouin tent, for an authentic experience in the heart of the Sahara.",
            "After a tasty breakfast, you'll head to Le Meezil, crossing magnificent sand dunes that ripple as far as the eye can see. Lunch will be taken in the open desert, a unique moment to savor the tranquility of the place. In the evening, a traditional dinner prepared by the Bedouins awaits before another night under the stars in your bivouac.",
            "In the morning, after a restorative night under a cloudless sky, you'll head to Bir El Haj, a secret place where a water well hides in the heart of the desert. Lunch will be taken amid the dunes, in a spectacular landscape. After this day of total escape, dinner under the stars and a night in your bivouac.",
            "Wake up early to observe one of the world's most beautiful sunrises. Then you'll head towards Hgif El Boum, another magical place with endless dune landscapes. You'll have lunch in the open desert, before settling in for the night in a comfortable bivouac under the Bedouin tent, with a dinner of local flavors.",
            "Breakfast at the bivouac, then departure towards Dakhla, a place where the dunes merge with the horizon. Enjoy lunch in this breathtaking setting, before continuing to explore this infinite world of sand and silence. In the evening, dinner and night under the Bedouin tent, a purely Saharan experience.",
            "This morning, after breakfast, you'll head towards Ksar Ghilane, a mythical oasis with hot springs. This place, which marks the boundary between the Roman world and the desert Bedouin tribes, is a strong symbol of the region's history. Lunch in this magnificent setting, then back to the bivouac for a traditional dinner prepared by the Bedouins. Night under the Bedouin tent.",
            "Wake up early for one last magical moment in the desert, with a relaxing swim in the hot springs of Ksar Ghilane. After a quiet lunch, you'll head back towards Djerba or Tozeur. You'll be transferred to your hotel for a well-deserved dinner and night, after this extraordinary adventure.",
            "After one last breakfast, transfer to the airport for your return flight, your head full of unforgettable memories and images etched in your mind.",
        ]);
        $e4->setItineraryDetailAr([
            "عند وصولكم إلى مطار جربة أو توزر، يترقبكم استقبال حار قبل النقل إلى الملاحة، مرورًا بدوز، بوابة الصحراء الشهيرة. سيكون لكم أول لقاء مع عالم الجمالة، قبل الاستقرار في مخيمكم. عشاء بجانب النار، تحت سماء مرصعة بالنجوم، ومبيت في خيمة بدوية، لتجربة أصيلة في قلب الصحراء الكبرى.",
            "بعد فطور شهي، ستتوجهون نحو الميزيل، عابرين كثبانًا رملية رائعة تتموج على مد البصر. سيُقدَّم الغداء في قلب الصحراء، لحظة فريدة للاستمتاع بهدوء المكان. مساءً، ينتظركم عشاء تقليدي يعده البدو قبل ليلة أخرى تحت النجوم في مخيمكم.",
            "في الصباح، بعد ليلة من الراحة تحت سماء صافية، ستتوجهون نحو بئر الحاج، وهو مكان سري يخفي بئر ماء في قلب الصحراء. سيُقدَّم الغداء وسط الكثبان، في منظر طبيعي مذهل. بعد يوم من الابتعاد الكامل، عشاء تحت النجوم ومبيت في مخيمكم.",
            "استيقظوا مبكرًا لمشاهدة أحد أجمل شروق الشمس في العالم. بعدها، ستتوجهون نحو حقيف البوم، وهو مكان ساحر آخر بمناظر كثبان لا نهاية لها. ستتناولون الغداء في قلب الصحراء، قبل الاستقرار لليلة في مخيم مريح تحت الخيمة البدوية، مع عشاء بنكهات محلية.",
            "فطور في المخيم، ثم الانطلاق نحو الدخلة، وهو مكان تمتزج فيه الكثبان بالأفق. استمتعوا بغداء في هذا المشهد الخلاب، قبل مواصلة استكشاف هذا العالم اللانهائي من الرمال والصمت. مساءً، عشاء ومبيت تحت الخيمة البدوية، تجربة صحراوية خالصة.",
            "هذا الصباح، بعد الفطور، ستتوجهون نحو قصر غيلان، وهي واحة أسطورية بينابيع مياه حارة. هذا المكان، الذي يمثل الحد الفاصل بين العالم الروماني وقبائل البدو الصحراوية، رمز قوي لتاريخ المنطقة. غداء في هذه الأجواء الرائعة، ثم العودة إلى المخيم لتناول عشاء تقليدي يعده البدو. المبيت تحت خيمة بدوية.",
            "استيقظوا مبكرًا للاستمتاع بلحظة سحرية أخيرة في الصحراء، مع سباحة مريحة في الينابيع الحارة لقصر غيلان. بعد غداء هادئ، ستتوجهون نحو جربة أو توزر. سيتم نقلكم إلى فندقكم لتناول عشاء ومبيت تستحقونهما، بعد هذه المغامرة الاستثنائية.",
            "بعد فطور أخير، النقل إلى المطار لرحلة عودتكم، برأس مليء بذكريات لا تُنسى وصور محفورة في ذاكرتكم.",
        ]);
        $e4->setItineraryDetailIt([
            "Al vostro arrivo all'aeroporto di Djerba o Tozeur, vi attende una calorosa accoglienza prima di un trasferimento a El Mellaha, passando per Douz, la famosa porta del deserto. Avrete il vostro primo contatto con il mondo dei cammellieri, prima di sistemarvi nel vostro bivacco. Cena accanto al fuoco, sotto un cielo stellato, e notte in una tenda beduina, per un'esperienza autentica nel cuore del Sahara.",
            "Dopo una gustosa colazione, partirete per Le Meezil, attraversando magnifiche dune di sabbia che ondeggiano a perdita d'occhio. Il pranzo sarà consumato nel deserto aperto, un momento unico per assaporare la tranquillità del luogo. La sera, vi attende una cena tradizionale preparata dai beduini prima di un'altra notte sotto le stelle nel vostro bivacco.",
            "Al mattino, dopo una notte ristoratrice sotto un cielo senza nuvole, vi dirigerete verso Bir El Haj, un luogo segreto dove si nasconde un pozzo d'acqua nel cuore del deserto. Il pranzo sarà consumato tra le dune, in un paesaggio spettacolare. Dopo questa giornata di totale evasione, cena sotto le stelle e notte nel vostro bivacco.",
            "Svegliatevi presto per osservare una delle più belle albe al mondo. Poi vi dirigerete verso Hgif El Boum, un altro luogo magico dai paesaggi di dune senza fine. Pranzerete nel deserto aperto, prima di sistemarvi per la notte in un comodo bivacco sotto la tenda beduina, con una cena dai sapori locali.",
            "Colazione al bivacco, poi partenza verso Dakhla, un luogo dove le dune si fondono con l'orizzonte. Godetevi un pranzo in questo scenario mozzafiato, prima di continuare a esplorare questo mondo infinito di sabbia e silenzio. La sera, cena e notte sotto la tenda beduina, un'esperienza puramente sahariana.",
            "Questa mattina, dopo la colazione, vi dirigerete verso Ksar Ghilane, un'oasi mitica con sorgenti termali. Questo luogo, che segna il confine tra il mondo romano e le tribù beduine del deserto, è un forte simbolo della storia della regione. Pranzo in questo magnifico ambiente, poi ritorno al bivacco per una cena tradizionale preparata dai beduini. Notte sotto la tenda beduina.",
            "Svegliatevi presto per un ultimo momento magico nel deserto, con un bagno rilassante nelle sorgenti termali di Ksar Ghilane. Dopo un pranzo tranquillo, ripartirete verso Djerba o Tozeur. Sarete trasferiti al vostro hotel per una cena e una notte meritate, dopo questa straordinaria avventura.",
            "Dopo un'ultima colazione, trasferimento in aeroporto per il volo di ritorno, con la testa piena di ricordi indimenticabili e immagini impresse nella memoria.",
        ]);

        $e4->setIncludedFr(['Pension complète durant tout le séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners traditionnels préparés par des bédouins (chorba, couscous, etc.)', 'Transports et assistance tout au long de votre voyage']);
        $e4->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Traditional dinners prepared by the Bedouins (chorba, couscous, etc.)', 'Transport and assistance throughout your trip']);
        $e4->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات تقليدية يعدها البدو (شوربة، كسكسي، إلخ)', 'النقل والمساعدة طوال رحلتكم']);
        $e4->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene tradizionali preparate dai beduini (chorba, couscous, ecc.)', 'Trasporti e assistenza per tutto il vostro viaggio']);
        $e4->setIncludedIcons(['eat', 'tent-1', 'campfire', 'van']);

        $e4->setExcludedFr(['Boissons dans les hôtels et restaurants', 'Pourboires']);
        $e4->setExcludedEn(['Drinks in hotels and restaurants', 'Tips']);
        $e4->setExcludedAr(['المشروبات في الفنادق والمطاعم', 'البقشيش']);
        $e4->setExcludedIt(['Bevande in hotel e ristoranti', 'Mance']);
        $e4->setExcludedIcons(['pot', 'draw-check-mark']);

        $e4->setMealsBreakfastFr('Pain de sable, fromage, confiture, café, lait, thé');
        $e4->setMealsBreakfastEn('Sand bread, cheese, jam, coffee, milk, tea');
        $e4->setMealsBreakfastAr('خبز الرمل، جبن، مربى، قهوة، حليب، شاي');
        $e4->setMealsBreakfastIt('Pane di sabbia, formaggio, marmellata, caffè, latte, tè');

        $e4->setMealsLunchFr('Pain de sable, salade verte, fruits de la saison, thé');
        $e4->setMealsLunchEn('Sand bread, green salad, seasonal fruit, tea');
        $e4->setMealsLunchAr('خبز الرمل، سلطة خضراء، فواكه موسمية، شاي');
        $e4->setMealsLunchIt('Pane di sabbia, insalata verde, frutta di stagione, tè');

        $e4->setMealsDinnerFr('Plat traditionnel de la région (chorba, couscous, dessert, thé)');
        $e4->setMealsDinnerEn('Traditional regional dish (chorba, couscous, dessert, tea)');
        $e4->setMealsDinnerAr('طبق تقليدي من المنطقة (شوربة، كسكسي، حلوى، شاي)');
        $e4->setMealsDinnerIt('Piatto tradizionale della regione (chorba, couscous, dessert, tè)');

        $e4->setClosingFr("Venez vivre l'expérience ultime au cœur du désert tunisien, un voyage où chaque instant vous rapprochera un peu plus de la nature pure et du silence majestueux des dunes. Une aventure à la fois authentique, apaisante et pleine de découvertes, pour un dépaysement total.");
        $e4->setClosingEn("Come experience the ultimate journey in the heart of the Tunisian desert, a trip where every moment brings you a little closer to pure nature and the majestic silence of the dunes. An adventure that is both authentic, soothing, and full of discoveries, for a total change of scenery.");
        $e4->setClosingAr("تعالوا لعيش التجربة المثلى في قلب الصحراء التونسية، رحلة تقربكم في كل لحظة أكثر من الطبيعة الخالصة والصمت المهيب للكثبان. مغامرة أصيلة ومهدئة ومليئة بالاكتشافات، لتغيير كامل في الأجواء.");
        $e4->setClosingIt("Venite a vivere l'esperienza definitiva nel cuore del deserto tunisino, un viaggio in cui ogni momento vi avvicina un po' di più alla natura pura e al silenzio maestoso delle dune. Un'avventura al tempo stesso autentica, rilassante e piena di scoperte, per un cambio di scenario totale.");

        $e4->setReviewAvatar('t-8.jpg');
        $e4->setReviewName('Carlos Mendez');
        $e4->setReviewCountry('Spain');
        $e4->setReviewRating(5);
        $e4->setReviewCommentFr("Huit jours magiques. Se baigner dans les sources chaudes de Ksar Ghilane après une semaine de trek à dos de dromadaire était inoubliable.");
        $e4->setReviewCommentEn("Eight magical days. Swimming in the hot springs of Ksar Ghilane after a week of camel trekking was unforgettable.");
        $e4->setReviewCommentAr("ثمانية أيام سحرية. كانت السباحة في الينابيع الحارة لقصر غيلان بعد أسبوع من الرحلة على ظهر الجمل تجربة لا تُنسى.");
        $e4->setReviewCommentIt("Otto giorni magici. Fare il bagno nelle sorgenti termali di Ksar Ghilane dopo una settimana di trekking in dromedario è stato indimenticabile.");

        $e4->setGalleryImages([
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788607759/baroudeurs/service/details/Endless/5.jpg', 'title' => 'Endless'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606830/baroudeurs/service/Call%20of%20the%20Desert.jpg', 'title' => 'Call of the Desert'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606088/baroudeurs/service/details/Mirage/7.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559494/2_tjxcd9.jpg', 'title' => 'Desert Silence'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788608078/baroudeurs/service/details/Charm/6.jpg', 'title' => 'Charm'],
        ]);

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
        $e5->setPosition(5);

        $e5->setIntroFr("Rose de Sables : 8 jours / 7 nuits – À la découverte du désert tunisien.");
        $e5->setIntroEn("Desert Rose: 8 days / 7 nights – Discovering the Tunisian desert.");
        $e5->setIntroAr("وردة الرمال: 8 أيام / 7 ليال – اكتشاف الصحراء التونسية.");
        $e5->setIntroIt("Rosa del Deserto: 8 giorni / 7 notti – Alla scoperta del deserto tunisino.");

        $e5->setFullDescriptionFr("Un périple de 8 jours à dos de dromadaire, de Djerba ou Tozeur à El Bidha, Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour et Dhirat Aicha, à la recherche des célèbres roses de sable. Chaque jour est ponctué de rencontres avec les chameliers, de repas préparés au feu de bois et de nuits sous tente bédouine.");
        $e5->setFullDescriptionEn("An 8-day camel journey from Djerba or Tozeur to El Bidha, Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour, and Dhirat Aicha, in search of the famous desert roses. Each day is punctuated by encounters with camel guides, meals prepared over a wood fire, and nights under a Bedouin tent.");
        $e5->setFullDescriptionAr("رحلة لمدة 8 أيام على ظهر الجمل، من جربة أو توزر إلى البيضاء وأم هندة والخلطية وبئر الغار وعين منصور وذراع عيشة، بحثًا عن ورود الرمال الشهيرة. يتخلل كل يوم لقاءات مع الجمالة ووجبات تُعد على نار الحطب ومبيت تحت خيمة بدوية.");
        $e5->setFullDescriptionIt("Un percorso di 8 giorni in dromedario, da Djerba o Tozeur a El Bidha, Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour e Dhirat Aicha, alla ricerca delle famose rose del deserto. Ogni giorno è scandito da incontri con i cammellieri, pasti preparati sul fuoco di legna e notti sotto la tenda beduina.");

        $e5->setItinerarySummaryFr("Ce circuit de 8 jours relie Djerba ou Tozeur à El Bidha, puis Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour et Dhirat Aicha, à la recherche des roses de sable. Chaque jour combine trek à dos de dromadaire, rencontres avec les chameliers et nuits sous tente bédouine.");
        $e5->setItinerarySummaryEn("This 8-day circuit links Djerba or Tozeur to El Bidha, then Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour, and Dhirat Aicha, in search of desert roses. Each day combines camel trekking, encounters with camel guides, and nights under a Bedouin tent.");
        $e5->setItinerarySummaryAr("تربط هذه الرحلة التي تستغرق 8 أيام بين جربة أو توزر والبيضاء، ثم أم هندة والخلطية وبئر الغار وعين منصور وذراع عيشة، بحثًا عن ورود الرمال. يجمع كل يوم بين رحلة على ظهر الجمل ولقاءات مع الجمالة ومبيت تحت خيمة بدوية.");
        $e5->setItinerarySummaryIt("Questo circuito di 8 giorni collega Djerba o Tozeur a El Bidha, poi Om Hinda, El Khaltaya, Bir El Ghar, Ain Mansour e Dhirat Aicha, alla ricerca delle rose del deserto. Ogni giorno unisce trekking in dromedario, incontri con i cammellieri e notti sotto la tenda beduina.");

        $e5->setItineraryFr(['Djerba/Tozeur - El Bidha', 'El Bidha - Om Hinda', 'Om Hinda - El Khaltaya', 'El Khaltaya - Bir El Ghar', 'Bir El Ghar - Ain Mansour', 'Ain Mansour - Dhirat Aicha', 'Dhirat Aicha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Aéroport']);
        $e5->setItineraryEn(['Djerba/Tozeur - El Bidha', 'El Bidha - Om Hinda', 'Om Hinda - El Khaltaya', 'El Khaltaya - Bir El Ghar', 'Bir El Ghar - Ain Mansour', 'Ain Mansour - Dhirat Aicha', 'Dhirat Aicha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Airport']);
        $e5->setItineraryAr(['جربة/توزر - البيضاء', 'البيضاء - أم هندة', 'أم هندة - الخلطية', 'الخلطية - بئر الغار', 'بئر الغار - عين منصور', 'عين منصور - ذراع عيشة', 'ذراع عيشة - دوز - جربة/توزر', 'جربة/توزر - المطار']);
        $e5->setItineraryIt(['Djerba/Tozeur - El Bidha', 'El Bidha - Om Hinda', 'Om Hinda - El Khaltaya', 'El Khaltaya - Bir El Ghar', 'Bir El Ghar - Ain Mansour', 'Ain Mansour - Dhirat Aicha', 'Dhirat Aicha - Douz - Djerba/Tozeur', 'Djerba/Tozeur - Aeroporto']);

        $e5->setItineraryDetailFr([
            "Dès votre arrivée à l'aéroport de Djerba ou Tozeur, un accueil chaleureux vous attend avant un transfert vers le bivouac d'El Bidha. Là, vous ferez connaissance avec vos chameliers et vous vous immergerez dans l'ambiance authentique du désert. Le soir venu, un dîner traditionnel vous sera servi autour du feu, sous un ciel étoilé, dans un bivouac typique où vous passerez la nuit sous une tente bédouine.",
            "Après un petit déjeuner copieux, vous prendrez la direction d'Om Hinda, où vous partagerez un repas convivial à l'ombre des palmiers sauvages. Vous visiterez également un marabout et découvrirez un village ensablé, témoin du passage du temps. Le soir, un dîner traditionnel et une nouvelle nuit dans le calme du désert vous attendent sous les étoiles.",
            "Ce matin, après un petit déjeuner réconfortant, vous partirez en direction d'El Khaltaya. Une nouvelle journée s'annonce à dos de dromadaire, où vous aurez l'occasion de chercher les célèbres roses de sable, ces formations minérales rares et fascinantes. Le repas du midi sera préparé au feu de bois, et la soirée se terminera par un dîner sous les étoiles, avant de passer une nouvelle nuit sous la tente bédouine.",
            "Après un petit déjeuner au bivouac, vous partirez vers Bir El Ghar, un puits d'eau au cœur du désert, en traversant le majestueux Chott Hajria. Ce trajet sera l'occasion de chercher à nouveau les roses de sable tout en vous émerveillant devant les paysages à couper le souffle des dunes dorées. Le déjeuner sera pris dans ce cadre idyllique, avant de repartir pour une soirée tranquille et un dîner sous la tente.",
            "Réveillez-vous au rythme du désert et, après un petit déjeuner simple mais délicieux, vous reprendrez la route en direction d'Ain Mansour. Vous passerez la journée à admirer les paysages fascinants du désert tout en avançant à dos de dromadaire. Ce soir, un nouveau dîner traditionnel vous attend, pour une soirée paisible sous le ciel étoilé.",
            "Petit déjeuner matinal avec du pain de sable fraîchement cuit, puis départ pour Dhirat Aicha. Accompagné de vos chameliers et cuisiniers locaux, vous traverserez des dunes majestueuses, à la recherche de nouveaux horizons. Le déjeuner sera servi dans ce cadre grandiose avant de continuer votre chemin vers Dhirat Aicha, un lieu où le silence et la beauté du désert vous couperont le souffle. Dîner et nuit au bivouac, sous la tente bédouine.",
            "Réveillez-vous tôt pour admirer l'un des plus beaux levers de soleil que vous n'avez jamais vus. Après un délicieux petit déjeuner, vous ferez route vers Djerba ou Tozeur, en passant par Douz, la porte du désert. Vous serez transféré à votre hôtel pour un dîner bien mérité et une nuit reposante.",
            "Après un dernier petit déjeuner, transfert à l'aéroport pour prendre votre vol de retour, la tête pleine de souvenirs inoubliables et le cœur empli de la magie du désert tunisien.",
        ]);
        $e5->setItineraryDetailEn([
            "As soon as you arrive at Djerba or Tozeur airport, a warm welcome awaits you before a transfer to the El Bidha bivouac. There, you'll meet your camel guides and immerse yourself in the authentic atmosphere of the desert. In the evening, a traditional dinner will be served around the fire, under a starry sky, in a typical bivouac where you'll spend the night under a Bedouin tent.",
            "After a hearty breakfast, you'll head towards Om Hinda, where you'll share a convivial meal in the shade of wild palm trees. You'll also visit a marabout and discover a sand-covered village, a witness to the passage of time. In the evening, a traditional dinner and another night in the calm of the desert await you under the stars.",
            "This morning, after a comforting breakfast, you'll head towards El Khaltaya. A new day awaits on camelback, where you'll have the chance to search for the famous desert roses, these rare and fascinating mineral formations. Lunch will be prepared over a wood fire, and the evening will end with dinner under the stars, before spending another night under the Bedouin tent.",
            "After breakfast at the bivouac, you'll head towards Bir El Ghar, a water well in the heart of the desert, crossing the majestic Chott Hajria. This journey will be an opportunity to search for desert roses again while marveling at the breathtaking landscapes of golden dunes. Lunch will be taken in this idyllic setting, before setting off for a quiet evening and dinner under the tent.",
            "Wake up to the rhythm of the desert and, after a simple but delicious breakfast, you'll hit the road again towards Ain Mansour. You'll spend the day admiring the fascinating desert landscapes while advancing on camelback. Tonight, another traditional dinner awaits you, for a peaceful evening under the starry sky.",
            "Early breakfast with freshly baked sand bread, then departure for Dhirat Aicha. Accompanied by your camel guides and local cooks, you'll cross majestic dunes, in search of new horizons. Lunch will be served in this grand setting before continuing your way towards Dhirat Aicha, a place where the silence and beauty of the desert will take your breath away. Dinner and night at the bivouac, under the Bedouin tent.",
            "Wake up early to admire one of the most beautiful sunrises you've ever seen. After a delicious breakfast, you'll head towards Djerba or Tozeur, passing through Douz, the gateway to the desert. You'll be transferred to your hotel for a well-deserved dinner and a restful night.",
            "After one last breakfast, transfer to the airport to take your return flight, your head full of unforgettable memories and your heart filled with the magic of the Tunisian desert.",
        ]);
        $e5->setItineraryDetailAr([
            "بمجرد وصولكم إلى مطار جربة أو توزر، يترقبكم استقبال حار قبل النقل إلى مخيم البيضاء. هناك، ستتعرفون على الجمالة وتنغمسون في الأجواء الأصيلة للصحراء. مساءً، سيُقدَّم عشاء تقليدي حول النار، تحت سماء مرصعة بالنجوم، في مخيم نموذجي حيث ستقضون الليلة تحت خيمة بدوية.",
            "بعد فطور دسم، ستتوجهون نحو أم هندة، حيث ستتشاركون وجبة ودية في ظل نخيل بري. ستزورون أيضًا مرابطًا وتكتشفون قرية مغطاة بالرمال، شاهدة على مرور الزمن. مساءً، ينتظركم عشاء تقليدي وليلة أخرى في هدوء الصحراء تحت النجوم.",
            "هذا الصباح، بعد فطور مريح، ستتوجهون نحو الخلطية. يوم جديد ينتظركم على ظهر الجمل، حيث ستتاح لكم الفرصة للبحث عن ورود الرمال الشهيرة، وهي تكوينات معدنية نادرة وساحرة. سيُحضَّر غداء الظهيرة على نار الحطب، وتنتهي الأمسية بعشاء تحت النجوم، قبل قضاء ليلة أخرى تحت الخيمة البدوية.",
            "بعد فطور في المخيم، ستتوجهون نحو بئر الغار، وهو بئر ماء في قلب الصحراء، عابرين شط حجرية المهيب. ستكون هذه الرحلة فرصة للبحث مجددًا عن ورود الرمال بينما تنبهرون بالمناظر الخلابة للكثبان الذهبية. سيُقدَّم الغداء في هذا المشهد المثالي، قبل الانطلاق لأمسية هادئة وعشاء تحت الخيمة.",
            "استيقظوا على إيقاع الصحراء، وبعد فطور بسيط لكنه لذيذ، ستعودون إلى الطريق نحو عين منصور. ستقضون اليوم في الإعجاب بالمناظر الصحراوية الساحرة أثناء التقدم على ظهر الجمل. الليلة، ينتظركم عشاء تقليدي آخر، لأمسية هادئة تحت سماء مرصعة بالنجوم.",
            "فطور صباحي بخبز الرمل الطازج، ثم الانطلاق نحو ذراع عيشة. برفقة الجمالة والطهاة المحليين، ستعبرون كثبانًا شامخة، بحثًا عن آفاق جديدة. سيُقدَّم الغداء في هذا المشهد المهيب قبل مواصلة الطريق نحو ذراع عيشة، وهو مكان سيأخذ صمت وجمال الصحراء فيه أنفاسكم. عشاء ومبيت في المخيم، تحت الخيمة البدوية.",
            "استيقظوا مبكرًا للإعجاب بأحد أجمل شروق الشمس الذي رأيتموه على الإطلاق. بعد فطور لذيذ، ستسلكون الطريق نحو جربة أو توزر، مرورًا بدوز، بوابة الصحراء. سيتم نقلكم إلى فندقكم لتناول عشاء تستحقونه ومبيت مريح.",
            "بعد فطور أخير، النقل إلى المطار لأخذ رحلة عودتكم، برأس مليء بذكريات لا تُنسى وقلب مفعم بسحر الصحراء التونسية.",
        ]);
        $e5->setItineraryDetailIt([
            "Non appena arrivate all'aeroporto di Djerba o Tozeur, vi attende una calorosa accoglienza prima di un trasferimento al bivacco di El Bidha. Lì, farete conoscenza con i vostri cammellieri e vi immergerete nell'atmosfera autentica del deserto. La sera, vi sarà servita una cena tradizionale intorno al fuoco, sotto un cielo stellato, in un tipico bivacco dove trascorrerete la notte sotto una tenda beduina.",
            "Dopo un'abbondante colazione, vi dirigerete verso Om Hinda, dove condividerete un pasto conviviale all'ombra di palme selvatiche. Visiterete anche un marabutto e scoprirete un villaggio sabbioso, testimone del passare del tempo. La sera, vi attendono una cena tradizionale e un'altra notte nella calma del deserto sotto le stelle.",
            "Questa mattina, dopo una colazione confortante, vi dirigerete verso El Khaltaya. Vi attende una nuova giornata in dromedario, dove avrete l'occasione di cercare le famose rose del deserto, queste rare e affascinanti formazioni minerali. Il pasto di mezzogiorno sarà preparato sul fuoco di legna, e la serata si concluderà con una cena sotto le stelle, prima di trascorrere un'altra notte sotto la tenda beduina.",
            "Dopo la colazione al bivacco, vi dirigerete verso Bir El Ghar, un pozzo d'acqua nel cuore del deserto, attraversando il maestoso Chott Hajria. Questo tragitto sarà l'occasione per cercare di nuovo le rose del deserto mentre vi meraviglierete davanti ai paesaggi mozzafiato delle dune dorate. Il pranzo sarà consumato in questo ambiente idilliaco, prima di ripartire per una serata tranquilla e una cena sotto la tenda.",
            "Svegliatevi al ritmo del deserto e, dopo una colazione semplice ma deliziosa, riprenderete la strada verso Ain Mansour. Trascorrerete la giornata ad ammirare gli affascinanti paesaggi del deserto avanzando in dromedario. Questa sera, vi attende un'altra cena tradizionale, per una serata pacifica sotto il cielo stellato.",
            "Colazione mattutina con pane di sabbia appena cotto, poi partenza per Dhirat Aicha. Accompagnati dai vostri cammellieri e cuochi locali, attraverserete dune maestose, alla ricerca di nuovi orizzonti. Il pranzo sarà servito in questo ambiente grandioso prima di continuare il vostro cammino verso Dhirat Aicha, un luogo dove il silenzio e la bellezza del deserto vi toglieranno il fiato. Cena e notte al bivacco, sotto la tenda beduina.",
            "Svegliatevi presto per ammirare una delle più belle albe che abbiate mai visto. Dopo una deliziosa colazione, vi dirigerete verso Djerba o Tozeur, passando per Douz, la porta del deserto. Sarete trasferiti al vostro hotel per una cena meritata e una notte riposante.",
            "Dopo un'ultima colazione, trasferimento in aeroporto per prendere il volo di ritorno, con la testa piena di ricordi indimenticabili e il cuore colmo della magia del deserto tunisino.",
        ]);

        $e5->setIncludedFr(['Pension complète tout au long du séjour', 'Hébergement en bivouac sous tente bédouine', 'Dîners préparés par des bédouins, avec des plats traditionnels (chorba, couscous, etc.)', 'Transports et assistance tout au long du voyage']);
        $e5->setIncludedEn(['Full board throughout the stay', 'Bedouin tent bivouac accommodation', 'Dinners prepared by the Bedouins, with traditional dishes (chorba, couscous, etc.)', 'Transport and assistance throughout the trip']);
        $e5->setIncludedAr(['إقامة كاملة طوال فترة الإقامة', 'الإقامة في مخيم تحت خيمة بدوية', 'عشاءات يعدها البدو، بأطباق تقليدية (شوربة، كسكسي، إلخ)', 'النقل والمساعدة طوال الرحلة']);
        $e5->setIncludedIt(['Pensione completa per tutto il soggiorno', 'Alloggio in bivacco sotto tenda beduina', 'Cene preparate dai beduini, con piatti tradizionali (chorba, couscous, ecc.)', 'Trasporti e assistenza per tutto il viaggio']);
        $e5->setIncludedIcons(['eat', 'tent-1', 'campfire', 'van']);

        $e5->setExcludedFr(['Boissons dans les hôtels et restaurants', 'Pourboires']);
        $e5->setExcludedEn(['Drinks in hotels and restaurants', 'Tips']);
        $e5->setExcludedAr(['المشروبات في الفنادق والمطاعم', 'البقشيش']);
        $e5->setExcludedIt(['Bevande in hotel e ristoranti', 'Mance']);
        $e5->setExcludedIcons(['pot', 'draw-check-mark']);

        $e5->setMealsBreakfastFr('Pain de sable, fromage, confiture, café, lait, thé');
        $e5->setMealsBreakfastEn('Sand bread, cheese, jam, coffee, milk, tea');
        $e5->setMealsBreakfastAr('خبز الرمل، جبن، مربى، قهوة، حليب، شاي');
        $e5->setMealsBreakfastIt('Pane di sabbia, formaggio, marmellata, caffè, latte, tè');

        $e5->setMealsLunchFr('Pain de sable, salade verte, fruits de la saison, thé');
        $e5->setMealsLunchEn('Sand bread, green salad, seasonal fruit, tea');
        $e5->setMealsLunchAr('خبز الرمل، سلطة خضراء، فواكه موسمية، شاي');
        $e5->setMealsLunchIt('Pane di sabbia, insalata verde, frutta di stagione, tè');

        $e5->setMealsDinnerFr('Plat traditionnel de la région préparé par les bédouins (chorba, couscous, dessert, thé)');
        $e5->setMealsDinnerEn('Traditional regional dish prepared by the Bedouins (chorba, couscous, dessert, tea)');
        $e5->setMealsDinnerAr('طبق تقليدي من المنطقة يعده البدو (شوربة، كسكسي، حلوى، شاي)');
        $e5->setMealsDinnerIt('Piatto tradizionale della regione preparato dai beduini (chorba, couscous, dessert, tè)');

        $e5->setClosingFr("Cette aventure au cœur du désert tunisien vous plonge dans un univers authentique et fascinant, entre le silence du désert, les rencontres avec les chameliers et la découverte des traditions bédouines. Parfait pour ceux qui cherchent à se ressourcer loin de l'agitation du quotidien, tout en vivant une expérience unique.");
        $e5->setClosingEn("This adventure in the heart of the Tunisian desert immerses you in an authentic and fascinating world, between the silence of the desert, encounters with camel guides, and the discovery of Bedouin traditions. Perfect for those looking to recharge far from the hustle and bustle of daily life, while living a unique experience.");
        $e5->setClosingAr("تُغرقكم هذه المغامرة في قلب الصحراء التونسية في عالم أصيل وساحر، بين صمت الصحراء ولقاءات الجمالة واكتشاف تقاليد البدو. مثالية لمن يبحث عن استعادة النشاط بعيدًا عن صخب الحياة اليومية، مع عيش تجربة فريدة.");
        $e5->setClosingIt("Questa avventura nel cuore del deserto tunisino vi immerge in un mondo autentico e affascinante, tra il silenzio del deserto, gli incontri con i cammellieri e la scoperta delle tradizioni beduine. Perfetta per chi cerca di ricaricarsi lontano dal trambusto quotidiano, vivendo un'esperienza unica.");

        $e5->setReviewAvatar('t-9.jpg');
        $e5->setReviewName('Anna Kowalski');
        $e5->setReviewCountry('Poland');
        $e5->setReviewRating(5);
        $e5->setReviewCommentFr("Trouver ma première rose de sable a été un moment magique. Une aventure authentique du début à la fin, avec des chameliers extraordinaires.");
        $e5->setReviewCommentEn("Finding my first desert rose was a magical moment. An authentic adventure from start to finish, with extraordinary camel guides.");
        $e5->setReviewCommentAr("كان العثور على أول وردة رمل لي لحظة سحرية. مغامرة أصيلة من البداية إلى النهاية، مع جمالة استثنائيين.");
        $e5->setReviewCommentIt("Trovare la mia prima rosa del deserto è stato un momento magico. Un'avventura autentica dall'inizio alla fine, con cammellieri straordinari.");

        $e5->setGalleryImages([
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605854/baroudeurs/service/details/Mirage/2.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605799/baroudeurs/service/details/Mirage/1.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788606072/baroudeurs/service/details/Mirage/4.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605763/baroudeurs/service/Mirage.jpg', 'title' => 'Mirage'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788560813/1_k85ekq.jpg', 'title' => 'Desert Wanderer'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788559477/7_mcl3tr.jpg', 'title' => 'Sand Journey'],
            ['url' => 'https://res.cloudinary.com/dy13axswo/image/upload/v1788605419/baroudeurs/service/Desert%20Rose.jpg', 'title' => 'Desert Rose'],
        ]);

        $manager->persist($e5);

        $manager->flush();
    }
}
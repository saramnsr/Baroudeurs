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
        $c1->setIcons(['fas fa-car-side', 'fas fa-campground', 'fas fa-utensils', 'fas fa-water']);
        $c1->setPosition(2);
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
        $c2->setIcons(['fas fa-user-friends', 'fas fa-store', 'fas fa-moon']);
        $c2->setPosition(3);
        $manager->persist($c2);

        // ============ CIRCUIT 3: Excursion à Tataouine ============
        $c3 = new Circuit();
        $c3->setImage('Circuits/excursion Tatouine.jpg');
        $c3->setTitleFr('Excursion d\'une Journée à Tataouine');
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
        $c3->setIcons(['fas fa-road', 'fas fa-store', 'fas fa-film']);
        $c3->setPosition(1);
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
        $c4->setIcons(['fas fa-hotel', 'fas fa-train', 'fas fa-route']);
        $c4->setPosition(4);
        $manager->persist($c4);

        $manager->flush();
    }
}
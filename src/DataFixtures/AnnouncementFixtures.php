<?php

namespace App\DataFixtures;

use App\Entity\Announcement;
use App\Repository\BreederRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnnouncementFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private BreederRepository $breederRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $announcements = [
            ['Malinois 3 mois', 'Magnifique chiots chihuahua d’une portée de 4 chiot : 1 femme et 3 mâles Ils sont nées le 30 janvier 2022 donc disponible vers le 30 mars. Ils évoluent au sein de notre famille avec des enfants et d’autres animaux. Ils seront vendus pucer et vacciner avec un certificat de bonne santé du vétérinaire ainsi qu’un kit de démarrage alimentaire et sera inscrit au livre des origines.', '2090-01-01 12:00:00'],
            ['Labrador 6 mois', 'Magnifique chiots chihuahua d’une portée de 3 chiot : 1 femme et 2 mâles Ils sont nées le 7 janvier 2022 donc disponible vers le 7 mars. Ils évoluent au sein de notre famille avec des enfants et d’autres animaux. Ils seront vendus pucer et vacciner avec un certificat de bonne santé du vétérinaire ainsi qu’un kit de démarrage alimentaire.', '2040-01-01 12:00:00'],
            ['Staffy 7 mois', 'Elevage du Moulin de Bonneval, superbe Elevage familial à dimension professionnelle en Installation Classée Pour la Protection de l’Environnement agrée par la Préfecture de Haute Loire (rare en élevage canin).', '2030-01-01 12:00:00'],
            ['American Bully XXL 27 ans', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', '2070-01-01 12:00:00'],
            ['Berger allemand 0 mois', 'Les bébés partent après avoir été sociabilisés pendant de nombreuses semaines, ayant évolués dans un premier temps dans des parcs naissances puis découvertes. Chiots pucés, vaccinés, vermifugés, attestation de bonne santé du vétérinaire et kit chiot.', '2090-01-01 12:00:00'],
            ['Berger australien 4 mois', 'Nos chiots sont vendus identifiés, vaccinés, vermifugés, inscrit au LOF avec certificat de naissance et carnet de santé. Un certificat de bonne santé établi par notre vétérinaire vous sera également fourni au départ du chiot.', '2050-01-01 12:00:00'],
            ['Rottweiler 1 an', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', '2024-01-01 12:00:00'],
            ['Caniche 2 mois', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', '2040-01-01 12:00:00'],
            ['Dobberman 8 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2023-01-01 12:00:00'],
            ['Kangal 11 mois', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', '2029-01-01 12:00:00'],
            ['Bulldog 13 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2025-01-01 12:00:00'],
            ['Schpits 14 mois', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', '2070-01-01 12:00:00'],
            ['Boxer 16 mois', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', '2028-01-01 12:00:00'],
            ['Dalmatien 10 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2026-01-01 12:00:00'],
            ['Terreneuve 9 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2021-01-01 12:00:00'],
            ['Patou 7 mois', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', '2034-01-01 12:00:00'],
            ['Husky 10 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2078-01-01 12:00:00'],
            ['Berger Belge 18 mois', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', '2098-01-01 12:00:00'],
            ['Beaggle 20 mois', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', '2076-01-01 12:00:00'],
            ['Berger blanc 22 mois', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', '2056-01-01 12:00:00']
        ];

        $breeders = $this->breederRepository->findAll();

        foreach ($announcements as list($title, $infos, $date)) {
            $announcement = new Announcement();
            $announcement->setTitle($title);
            $announcement->setInfos($infos);
            $announcement->setLink("https://www.google.fr");
            $announcement->setDateAnnouncement(new DateTime($date));

            $nb = mt_rand(0, count($breeders) - 1);
            $announcement->setUsers($breeders[$nb]);


            $manager->persist($announcement);
        }


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BreederFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Dog;
use App\Repository\RaceRepository;
use App\Repository\RequestRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DogFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @var RaceRepository 
     */
    protected $raceRepository;
    protected $requestRepository;

    public function __construct(RaceRepository $raceRepository, RequestRepository $requestRepository)
    {
        $this->raceRepository = $raceRepository;
        $this->requestRepository = $requestRepository;
    }

    public function load(ObjectManager $manager): void
    {

        $dogs = [
            ['Snoopy', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Magnifique chiots chihuahua d’une portée de 4 chiot : 1 femme et 3 mâles Ils sont nées le 30 janvier 2022 donc disponible vers le 30 mars. Ils évoluent au sein de notre famille avec des enfants et d’autres animaux. Ils seront vendus pucer et vacciner avec un certificat de bonne santé du vétérinaire ainsi qu’un kit de démarrage alimentaire et sera inscrit au livre des origines.', 1, 0],
            ['Sam', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Magnifique chiots chihuahua d’une portée de 3 chiot : 1 femme et 2 mâles Ils sont nées le 7 janvier 2022 donc disponible vers le 7 mars. Ils évoluent au sein de notre famille avec des enfants et d’autres animaux. Ils seront vendus pucer et vacciner avec un certificat de bonne santé du vétérinaire ainsi qu’un kit de démarrage alimentaire.', 0, 1],
            ['Aaron', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Elevage du Moulin de Bonneval, superbe Elevage familial à dimension professionnelle en Installation Classée Pour la Protection de l’Environnement agrée par la Préfecture de Haute Loire (rare en élevage canin).', 0, 1],
            ['Ulysse', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', 0, 1],
            ['Romeo', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Les bébés partent après avoir été sociabilisés pendant de nombreuses semaines, ayant évolués dans un premier temps dans des parcs naissances puis découvertes. Chiots pucés, vaccinés, vermifugés, attestation de bonne santé du vétérinaire et kit chiot.', 1, 1],
            ['Puppy', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Nos chiots sont vendus identifiés, vaccinés, vermifugés, inscrit au LOF avec certificat de naissance et carnet de santé. Un certificat de bonne santé établi par notre vétérinaire vous sera également fourni au départ du chiot.', 0, 0],
            ['Ange', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', 0, 1],
            ['Apollon', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', 1, 1],
            ['Uddi', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 1, 0],
            ['Noisette', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', 0, 1],
            ['Ping', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 1, 0],
            ['Saxo', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', 0, 1],
            ['Reglisse', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', 0, 0],
            ['Api', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 0, 0],
            ['Baloo', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 0, 0],
            ['Belle', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', 1, 1],
            ['Titan', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 1, 1],
            ['Barack', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Chiot disponible. Il est très curieux, très affectueux, il a une vraie personnalité ! Il est identifié, primo vacciné, mais il est possible de choisir son nom .. Il est inscrit au LOF. Il a ses 2 testicules. Il peut rejoindre sa famille dès à présent. Chiot issu de parents radiographiés ED-0 / HD-A. Exempt de Myélopathie Dégénérative.', 0, 1],
            ['Carra', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'A réserver superbes chiots bulldog anglais couleurs exotiques. 1 mâle chocolat tricolore et 1 femelle merle silver. Nés le 15/01. Ils seront identifiés par puce électronique, primo vaccinés et un certificat de bonne santé établi par le vétérinaire sera remis au moment de leur départ. Nos petits sont élevés en famille et sont sociabilisés dès le plus jeune âge.', 0, 1],
            ['Lady', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Ces chiennes sont issues de lignées de travail, elles recherchent le contact, sont équilibrées, affectueuses, bien sociabilisées. Elles sont aussi dynamiques et dotées du caractère affirmé du Malinois, avec de très bonnes aptitudes à l’apprentissage (éducation, dressage à un travail, pratique sportive: ring…) Elles ont bénéficié de plusieurs séances d’éducation à la marche en laisse, leur éducation se poursuit tant qu’elles sont à l’élevage.', 0, 1]
        ];

        $race = $this->raceRepository->findAll();
        $request = $this->announcementRepository->findAll();

        foreach ($dogs as list($name, $background, $description, $isTolerant, $isLof)) {
            $dog = new Dog();
            $dog->setName($name);
            $dog->setBackground($background);
            $dog->setDescription($description);
            $dog->setIsTolerant($isTolerant);
            $dog->setIsLOF($isLof);

            $randomNumber = mt_rand(0, count($race) - 1);
            $dog->addRace($race[$randomNumber]);

            $randomNumber = mt_rand(0, count($request) - 1);
            $dog->addRequest($request[$randomNumber]);


            $manager->persist($dog);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RaceFixtures::class,
        ];
    }
}

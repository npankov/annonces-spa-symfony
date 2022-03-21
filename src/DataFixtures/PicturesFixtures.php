<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use App\Repository\DogRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PicturesFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private DogRepository $dogRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {

        $pictures = [
            ['chien mignon', 'description', 'https://images.pexels.com/photos/1287830/pexels-photo-1287830.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien gentil', 'description', 'https://images.pexels.com/photos/2253275/pexels-photo-2253275.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chein amusant', 'description', 'https://images.pexels.com/photos/933498/pexels-photo-933498.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien magnifique', 'description', 'https://images.pexels.com/photos/2623968/pexels-photo-2623968.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien joli', 'description', 'https://images.pexels.com/photos/97082/weimaraner-puppy-dog-snout-97082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien attachant', 'description', 'https://images.pexels.com/photos/4668425/pexels-photo-4668425.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien aimant', 'description', 'https://images.pexels.com/photos/3009441/pexels-photo-3009441.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien adorable', 'description', 'https://images.pexels.com/photos/1851164/pexels-photo-1851164.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien joueur', 'description', 'https://images.pexels.com/photos/2248516/pexels-photo-2248516.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien blagueur', 'description', 'https://images.pexels.com/photos/1904105/pexels-photo-1904105.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien touchant', 'description', 'https://images.pexels.com/photos/1287830/pexels-photo-1287830.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien mauvais', 'description', 'https://images.pexels.com/photos/2253275/pexels-photo-2253275.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chein cruel', 'description', 'https://images.pexels.com/photos/933498/pexels-photo-933498.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien pas très propre', 'description', 'https://images.pexels.com/photos/2623968/pexels-photo-2623968.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien qui mord', 'description', 'https://images.pexels.com/photos/97082/weimaraner-puppy-dog-snout-97082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien qui pète fort', 'description', 'https://images.pexels.com/photos/825947/pexels-photo-825947.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien joyeux', 'description', 'https://images.pexels.com/photos/3361746/pexels-photo-3361746.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien amoureux', 'description', 'https://images.pexels.com/photos/895259/pexels-photo-895259.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien voyou', 'description', 'https://images.pexels.com/photos/895259/pexels-photo-895259.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien volleur', 'description', 'https://images.pexels.com/photos/1390784/pexels-photo-1390784.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien gros mangeur', 'description', 'https://images.pexels.com/photos/1294062/pexels-photo-1294062.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chein obèse', 'description', 'https://images.pexels.com/photos/803766/pexels-photo-803766.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien anorexique', 'description', 'https://images.pexels.com/photos/2252316/pexels-photo-2252316.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien joli', 'description', 'https://images.pexels.com/photos/3198013/pexels-photo-3198013.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien attachant', 'description', 'https://images.pexels.com/photos/1906153/pexels-photo-1906153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien aimant', 'description', 'https://images.pexels.com/photos/1139794/pexels-photo-1139794.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien adorable', 'description', 'https://images.pexels.com/photos/1954515/pexels-photo-1954515.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien joueur', 'description', 'https://images.pexels.com/photos/1954515/pexels-photo-1954515.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'],
            ['chien blagueur', 'description', 'https://images.pexels.com/photos/1458925/pexels-photo-1458925.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260']
        ];

        $dogs = $this->dogRepository->findAll();

        foreach ($pictures as list($title, $description, $link)) {
            $picture = new Picture();
            $picture->setTitle($title);
            $picture->setDescription($description);
            $picture->setLink($link);

            $nb = mt_rand(0, count($dogs) - 1);
            $picture->setDog($dogs[$nb]);

            $manager->persist($picture);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DogFixtures::class,
        ];
    }
}

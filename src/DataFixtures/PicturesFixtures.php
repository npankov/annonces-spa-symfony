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
            ['chien mignon', 'description', 'https://www.pexels.com/fr-fr/photo/jack-russell-terrier-blanc-et-brun-adulte-1287830/'],
            ['chien gentil', 'description', 'https://www.pexels.com/fr-fr/photo/chien-bronze-a-poil-court-2253275/'],
            ['chein amusant', 'description', 'https://www.pexels.com/fr-fr/photo/dalmatien-assis-surface-blanche-933498/'],
            ['chien magnifique', 'description', 'https://www.pexels.com/fr-fr/photo/shih-tzu-assis-sur-le-sol-2623968/'],
            ['chien joli', 'description', 'https://www.pexels.com/fr-fr/photo/chien-moyen-a-poil-court-noir-sur-le-sol-97082/'],
            ['chien attachant', 'description', 'https://www.pexels.com/fr-fr/photo/photo-de-chien-blanc-assis-sur-un-canape-4668425/'],
            ['chien aimant', 'description', 'https://www.pexels.com/fr-fr/photo/photo-mise-au-point-selective-d-un-chiot-blanc-et-noir-a-poil-court-assis-sur-un-banc-3009441/'],
            ['chien adorable', 'description', 'https://www.pexels.com/fr-fr/photo/chiot-husky-siberien-noir-et-blanc-sur-terrain-d-herbe-brune-3726314/'],
            ['chien joueur', 'description', 'https://www.pexels.com/fr-fr/photo/chien-sur-lit-pour-animaux-de-compagnie-2248516/'],
            ['chien blagueur', 'description', 'https://www.pexels.com/fr-fr/photo/personne-touchant-chiot-brun-1904105/'],
            ['chien touchant', 'description', 'https://www.pexels.com/fr-fr/photo/jack-russell-terrier-blanc-et-brun-adulte-1287830/'],
            ['chien mauvais', 'description', 'https://www.pexels.com/fr-fr/photo/chien-bronze-a-poil-court-2253275/'],
            ['chein cruel', 'description', 'https://www.pexels.com/fr-fr/photo/dalmatien-assis-surface-blanche-933498/'],
            ['chien pas très propre', 'description', 'https://www.pexels.com/fr-fr/photo/shih-tzu-assis-sur-le-sol-2623968/'],
            ['chien qui mord', 'description', 'https://www.pexels.com/fr-fr/photo/chien-moyen-a-poil-court-noir-sur-le-sol-97082/'],
            ['chien qui pète fort', 'description', 'https://www.pexels.com/fr-fr/photo/photo-de-chien-blanc-assis-sur-un-canape-4668425/'],
            ['chien joyeux', 'description', 'https://www.pexels.com/fr-fr/photo/animal-chien-animal-de-compagnie-mignon-4085434/'],
            ['chien amoureux', 'description', 'https://www.pexels.com/fr-fr/photo/paysage-nature-ciel-clairiere-4777025/'],
            ['chien voyou', 'description', 'https://www.pexels.com/fr-fr/photo/amour-lit-animal-chien-4197483/'],
            ['chien volleur', 'description', 'https://www.pexels.com/fr-fr/photo/chien-blanc-et-brun-a-poil-long-3215610/'],
            ['chien gros mangeur', 'description', 'https://www.pexels.com/fr-fr/photo/clairiere-animal-chien-animal-de-compagnie-4749999/'],
            ['chein obèse', 'description', 'https://www.pexels.com/fr-fr/photo/chien-brun-a-poil-moyen-3357026/'],
            ['chien anorexique', 'description', 'https://www.pexels.com/fr-fr/photo/figurine-en-ceramique-marron-et-noire-1790085/'],
            ['chien joli', 'description', 'https://www.pexels.com/fr-fr/photo/chien-noir-et-blanc-a-poil-court-3090875/'],
            ['chien attachant', 'description', 'https://www.pexels.com/fr-fr/photo/chien-brun-a-poil-long-sur-quai-en-bois-2791684/'],
            ['chien aimant', 'description', 'https://www.pexels.com/fr-fr/photo/etre-assis-bouledogue-adorable-chiot-4587971/'],
            ['chien adorable', 'description', 'https://www.pexels.com/fr-fr/photo/chien-couche-sur-le-rivage-pendant-la-journee-2252311/'],
            ['chien joueur', 'description', 'https://www.pexels.com/fr-fr/photo/chien-qui-court-a-la-plage-2906033/'],
            ['chien blagueur', 'description', 'https://www.pexels.com/fr-fr/photo/homme-debout-tout-en-tenant-chiot-1849974/'],
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

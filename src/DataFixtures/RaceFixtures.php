<?php

namespace App\DataFixtures;

use App\Entity\Dog;
use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $breeds = [
            "Affenpinscher",
            "Airedale Terrier",
            "Akita Américain",
            "Akita Inu",
            "American Staffordshire Terrier",
            "Ancien chien d'arrêt danois",
            "Anglo-Français de Petite Vènerie",
            "Ariégeois",
            "Barbet",
            "Barbu Tchèque",
            "Barzoï",
            "Basenji",
            "Basset Artésien-Normand",
            "Basset Bleu de Gascogne",
            "Basset de Westphalie",
            "Basset des Alpes",
            "Basset Fauve de Bretagne",
            "Basset Hound",
            "Beagle",
            "Beagle-Harrier",
            "Bearded Collie",
            "Beauceron",
            "Bedlington Terrier",
            "Berger Allemand",
            "Berger Australien",
            "Berger Belge Groenendael",
            "Berger Belge Laekenois",
            "Berger Belge Malinois",
            "Berger Belge Tervueren",
            "Berger Blanc Suisse",
            "Berger Catalan",
            "Berger d'Anatolie",
            "Berger d'Asie Centrale",
            "Berger de Bergame",
            "Berger de Bohême",
            "Berger de Brie"
        ];

        foreach ($breeds as $breed) {
            $b = new Race();
            $b->setName($breed);

            $manager->persist($b);
        }

        $manager->flush();
    }
}

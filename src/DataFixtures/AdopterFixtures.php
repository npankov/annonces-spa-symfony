<?php

namespace App\DataFixtures;

use App\Entity\Adopter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdopterFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $adopters = [
            ['bengs', 'junior', 'Lyon', 'rhone', '0601045304'],
            ['salah', 'mohamed', 'paris', 'rhone', '0601087304'],
            ['mane', 'sadio', 'Marseille', 'bouches-du-rhone', '0601026504'],
            ['foden', 'phil', 'Lens', 'pas-de-calais', '0601900304'],
            ['ronaldo', 'cristiano', 'Bordeaux', 'gironde', '0608720304'],
            ['mister', 'savage', 'Nantes', 'loire-atlantique', '0601760304'],
            ['verratti', 'marco', 'Lyon', 'rhone', '0601986304'],
            ['gueye', 'gana', 'Marseille', 'bouches-du-rhone', '0601563304'],
            ['lukeba', 'junior', 'Marseille', 'bouches-du-rhone', '060100304'],
            ['sancho', 'jason', 'lens', 'pas-de-calais', '0604520304'],
            ['reus', 'marco', 'Nantes', 'loire-atlantique', '0609990304'],
            ['gordo', 'eddy', 'Lyon', 'rhone', '0601666304'],
            ['macgregor', 'conor', 'Marseille', 'bouches-du-rhone', '0601880304'],
            ['bolt', 'usain', 'paris', 'rhone-alpes', '0601997304'],
            ['mahrez', 'riad', 'Nantes', 'loire-atlantique', '0601995304'],
            ['benzema', 'karim', 'Bordeaux', 'gironde', '0601087604'],
            ['mbappe', 'kylian', 'lens', 'pas-de-calais', '0601020999'],
            ['ferdinand', 'rio', 'Nantes', 'loire-atlantique', '0601020666'],
            ['aouar', 'houssem', 'Bordeaux', 'gironde', '0601020555'],
            ['henry', 'thierry', 'Lyon', 'rhone', '0601777304'],


        ];

        foreach ($adopters as list($lastname, $firstname, $town, $department, $phone)) {
            $adopters = new Adopter();
            $adopters->setLastName($lastname);
            $adopters->setFirstName($firstname);
            $adopters->setTown($town);
            $adopters->setDepartment($department);
            $adopters->setPhone($phone);

            $manager->persist($adopters);
        }
        $manager->flush();
    }
}

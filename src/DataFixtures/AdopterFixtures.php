<?php

namespace App\DataFixtures;


use App\Entity\Adopter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdopterFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $adopters = [
            ['mrbengs@gmail.com', 'azert69100', 'bengs', 'junior', 'Lyon', 'rhone', '0601045304'],
            ['farwest@gmail.com', 'ghvhgcv691hgchfc00', 'salah', 'mohamed', 'paris', 'rhone', '0601087304'],
            ['pandek@gmail.com', 'gfdxresd69ghcgfc100', 'mane', 'sadio', 'Marseille', 'bouches-du-rhone', '0601026504'],
            ['lafrip@gmail.com', 'azgrdfc69hfgfc100', 'foden', 'phil', 'Lens', 'pas-de-calais', '0601900304'],
            ['houss@gmail.com', 'azgfxfx691jgvhgv00', 'ronaldo', 'cristiano', 'Bordeaux', 'gironde', '0608720304'],
            ['fab@gmail.com', 'akujftdxfv691hjghgv00', 'mister', 'savage', 'Nantes', 'loire-atlantique', '0601760304'],
            ['souf@gmail.com', 'ahgchjgvb556', 'verratti', 'marco', 'Lyon', 'rhone', '0601986304'],
            ['hakim@gmail.com', 'jhsbdjfhvb674ghfjhvbh', 'gueye', 'gana', 'Marseille', 'bouches-du-rhone', '0601563304'],
            ['gaetan@gmail.com', 'jhbsdjfhsjdhbv', 'lukeba', 'junior', 'Marseille', 'bouches-du-rhone', '060100304'],
            ['yannis@gmail.com', 'jhsbdfjsv', 'sancho', 'jason', 'lens', 'pas-de-calais', '0604520304'],
            ['jerem@gmail.com', 'jhsbfjgv564', 'reus', 'marco', 'Nantes', 'loire-atlantique', '0609990304'],
            ['princess@gmail.com', 'khsdbfjhsv64654hvjhvgh', 'gordo', 'eddy', 'Lyon', 'rhone', '0601666304'],
            ['sethbundle@gmail.com', 'hjsdbfjhrvb', 'macgregor', 'conor', 'Marseille', 'bouches-du-rhone', '0601880304'],
            ['lydia@gmail.com', '676543534', 'bolt', 'usain', 'paris', 'rhone-alpes', '0601997304'],
            ['ghost@gmail.com', '65673564', 'mahrez', 'riad', 'Nantes', 'loire-atlantique', '0601995304'],
            ['fortnite@gmail.com', '875676545354', 'benzema', 'karim', 'Bordeaux', 'gironde', '0601087604'],
            ['epicgames@gmail.com', '67565354354', 'mbappe', 'kylian', 'lens', 'pas-de-calais', '0601020999'],
            ['warzone@gmail.com', '7564654354', 'ferdinand', 'rio', 'Nantes', 'loire-atlantique', '0601020666'],
            ['mariokart@gmail.com', '5645435345', 'aouar', 'houssem', 'Bordeaux', 'gironde', '0601020555'],
            ['fareslancien@gmail.com', '82918293829', 'henry', 'thierry', 'Lyon', 'rhone', '0601777304'],


        ];

        foreach ($adopters as list($email, $password, $lastname, $firstname, $town, $department, $phone)) {
            $adopter = new Adopter();
            $adopter->setEmail($email);
            $adopter->setLastName($lastname);
            $adopter->setFirstName($firstname);
            $adopter->setTown($town);
            $adopter->setDepartment($department);
            $adopter->setPhone($phone);
            $adopter->setPassword(
                $this->hasher->hashPassword($adopter, $password)
            );

            $manager->persist($adopters);
        }
        $manager->flush();
    }
}

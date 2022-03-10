<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $users = [
            ['mrbengs@gmail.com', 'azert69100'],
            ['farwest@gmail.com', 'ghvhgcv691hgchfc00'],
            ['pandek@gmail.com', 'gfdxresd69ghcgfc100'],
            ['lafrip@gmail.com', 'azgrdfc69hfgfc100'],
            ['houss@gmail.com', 'azgfxfx691jgvhgv00'],
            ['fab@gmail.com', 'akujftdxfv691hjghgv00'],
            ['souf@gmail.com', 'ahgchjgvb556'],
            ['hakim@gmail.com', 'jhsbdjfhvb674ghfjhvbh'],
            ['gaetan@gmail.com', 'jhbsdjfhsjdhbv'],
            ['yannis@gmail.com', 'jhsbdfjsv'],
            ['jerem@gmail.com', 'jhsbfjgv564'],
            ['princess@gmail.com', 'khsdbfjhsv64654hvjhvgh'],
            ['sethbundle@gmail.com', 'hjsdbfjhrvb'],
            ['lydia@gmail.com', '676543534'],
            ['ghost@gmail.com', '65673564'],
            ['fortnite@gmail.com', '875676545354'],
            ['epicgames@gmail.com', '67565354354'],
            ['warzone@gmail.com', '7564654354'],
            ['mariokart@gmail.com', '5645435345']

        ];

        foreach ($users as list($mail, $password)) {
            $users = new Users();
            $users->setEmail($mail);
            $users->setPassword($password);

            $manager->persist($users);
        }
        $manager->flush();
    }
}

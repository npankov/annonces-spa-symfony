<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {

        $users = [
            ['admin@admin.com', 'admin'],

        ];

        foreach ($users as list($mail, $password)) {
            $user = new Admin();
            $user->setEmail($mail);
            $user->setPassword(
                $this->hasher->hashPassword($user, $password)
            );

            $manager->persist($user);
        }
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Breeder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class BreederFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $breeders = [
            ['breeder1@gmail.com', 'test', 'Jeanjak'],
            ['breeder2@gmail.com', 'test', 'Jeanjoke'],
            ['breeder3@gmail.com', 'test', 'Jeanjakes'],
            ['breeder4@gmail.com', 'test', 'Jeanjakak'],
        ];

        foreach ($breeders as list($email, $password, $name)) {
            $breeder = new Breeder();
            $breeder->setEmail($email);
            $breeder->setPassword(
                $this->hasher->hashPassword($breeder, $password)
            );
            $breeder->setName($name);

            $manager->persist($breeder);
        }
        $manager->flush();
    }
}

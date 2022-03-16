<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Repository\AdopterRepository;
use DateTime;
use App\Repository\AnnouncementRepository;
use App\Repository\UsersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var AnnouncementRepository
     */
    protected $announcementRepository;
    protected $usersRepository;

    public function __construct(AnnouncementRepository $announcementRepository, AdopterRepository $usersRepository)
    {
        $this->announcementRepository = $announcementRepository;
        $this->usersRepository = $usersRepository;
    }

    public function load(ObjectManager $manager): void
    {

        $messages = [
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.'],
            ['2023-01-01 12:00:00', 'Lorem ipsum dolor sit amet. Rem quos quia aut vitae consequuntur qui minus consequatur ut iure provident non delectus illo ea quia iusto. Eum quis voluptas ex dolor vero id dolorum velit et enim eaque.']

        ];

        $announcement = $this->announcementRepository->findAll();
        $users = $this->usersRepository->findAll();

        foreach ($messages as list($dateMessage, $text)) {
            $message = new Message();
            $message->setDateMessage(new DateTime($dateMessage));
            $message->setText($text);

            $randomNumber = mt_rand(0, count($announcement) - 1);
            $message->setAnnouncement($announcement[$randomNumber]);

            $randomNumber = mt_rand(0, count($users) - 1);
            $message->setUser($users[$randomNumber]);

            $manager->persist($message);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AdopterFixtures::class,
            AnnouncementFixtures::class,
        ];
    }
}

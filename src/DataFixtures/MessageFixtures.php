<?php

namespace App\DataFixtures;

use App\Entity\Message;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
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

        foreach ($messages as list($dateMessage, $text)) {
            $Messages = new Message();
            $Messages->setDateMessage(new DateTime($dateMessage));
            $Messages->setText($text);

            $manager->persist($Messages);  
        }
        $manager->flush();
    }
}
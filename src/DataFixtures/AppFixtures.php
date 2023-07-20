<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\Cast\Array_;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $posts[] = array();

        $posts[0] = new Post();
        $posts[0]->setContent("La Ola, Szenenapplaus und ein Zuschauerrekord beim WM-Auftakt: Zum Auftakt in die Heim-WM ein Sieg - besser hätte es für die Australierinnen sicher nicht laufen können. Getragen wurden die \"Matildas\" dabei von der Euphorie der über 75.000 Zuschauer im Accor Stadium in Sydney.");
        $posts[0]->setVotes(rand(-50, 50));
        $manager->persist($posts[0]);

        $posts[1] = new Post();
        $posts[1]->setContent("Ekstase in Auckland! Co-Gastgeber Neuseeland hat vor über 42.000 Zuschauern zum Auftakt der Frauen-WM sein erstes WM-Spiel gewonnen - dank Zielspielerin Wilkinson und trotz des Lattenkrachers seiner Rekordspielerin Percival.");
        $posts[1]->setVotes(rand(-50, 50));
        $manager->persist($posts[1]);

        $manager->flush();
    }
}

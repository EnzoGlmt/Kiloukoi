<?php

namespace App\DataFixtures;

use App\Entity\Outils;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class OutilsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $outil = new Outils();
            $outil->setOutil('perceuse' . $i)
                ->setDescription('belle perceuse' . $i)
                ->setImage("image" . $i)
                ->setPrix($i+10);

            $manager->persist($outil);

            // $product = new Product();
            // $manager->persist($product);

        }

        $manager->flush();
    }
}

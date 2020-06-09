<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $user = new User();
            $user->setNom('bob' . $i)
                ->setPrenom('truc' . $i)
                ->setEmail("azerty@azerty$i.com")
                ->setPassword("azerty")
                ->setAdresse("adresse$i")
                ->setTelephone($i)
                ->setRoles(["ROLE_USER"]);

            $manager->persist($user);


            // $product = new Product();
            // $manager->persist($product);


        }

        $manager->flush();
    }
}
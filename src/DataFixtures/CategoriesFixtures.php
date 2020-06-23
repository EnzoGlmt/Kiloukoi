<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $categ = array('Toutes catégories','BTP','Electricité','Electroportatif','Jardinage','Maçonnerie','Mécanique','Peinture','Plomberie');

        foreach ($categ as $value) {
            $categories = new Categories();
            $categories->setNomCategorie($value);
            $manager->persist($categories);
        }



        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

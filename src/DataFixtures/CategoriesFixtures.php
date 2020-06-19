<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $cate = array('Maçonnerie', 'Electricité', 'Plomberie');

        foreach ($cate as $value) {
            $categories = new Categories();
            $categories->setNomCategorie($value);
            $manager->persist($categories);
        }



        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

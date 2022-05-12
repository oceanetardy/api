<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setTitle("test category" . $i)
                ->setDescription("test category description" . $i);
            $manager->persist($category);
            $arrayCategories[$i] = $category;
        }

        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setTitle("Test" . rand(1, 3))
                ->setDescription("test description" . $i)
                ->setPrice("123" . $i)
                ->setCategory($arrayCategories[rand(1, 10 - 1)]);
            $manager->persist($product);
        }
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tasks;
use App\Entity\Category;
use Faker\Factory; 

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
        $faker = Factory::create('en_US');
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 4; $i++) {
            $category = new Category();
            $category->setName($faker->word);

            $manager->persist($category);
        }
    
        for ($i = 0; $i < 50; $i++) {
            $tasks = new Tasks();
            $tasks->setTitle($faker->realText(30));
            $tasks->setDescription($faker->text(200));
            $tasks->setContent($faker->realTextBetween(250, 500));
            $tasks->setCreatedAt($faker->dateTimeBetween('-3 years')); 
            $tasks->setVisible($faker->boolean(chanceOfGettingTrue: 70));

            $manager->persist($tasks);
        }
        $manager->flush();
    }
}

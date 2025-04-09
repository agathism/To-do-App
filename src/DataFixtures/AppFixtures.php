<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tasks;
use App\Entity\Category;
use App\Entity\Status;
use App\Entity\Priority;
use Faker\Factory; 

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
        $faker = Factory::create('en_US');
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName($faker->word);
            $categories[] = $category;

            $manager->persist($category);
        }
    
        for ($i = 0; $i < 3; $i++) {
            $priority = new Priority();
            $priority->setName($faker->word);
            
            $manager->persist($priority);
        }
        for ($i = 0; $i < 3; $i++) {
            $status = new Status();
            $status->setName($faker->word);
            
            $manager->persist($status);
        }
        for ($i = 0; $i < 10; $i++) {
            $tasks = new Tasks();
            $tasks->setTitle($faker->realText(30))
                ->setDescription($faker->text(200))
                ->setContent($faker->realTextBetween(450, 750))
                ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 years'))) 
                ->setDueDate(dueDate: '2025-12-12') 
                ->setVisible(visible: true);

            $randomCategories = $categories[array_rand($categories)];
            $tasks->setCategory($randomCategories);
            

            $manager->persist($tasks);
        }
        $manager->flush();
    }
}

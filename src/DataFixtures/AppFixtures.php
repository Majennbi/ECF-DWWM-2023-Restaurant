<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Deal;
use App\Entity\Dish;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
        /**
         * @var Generator
         */
        private Generator $faker;

        public function __construct()
        {
            $this->faker = Factory::create('fr_FR');
        }
        // $product = new Product();
        // $manager->persist($product);
        public function load(ObjectManager $manager): void
        {
        
        //Deal
        for ($i=1; $i<=50; $i++) {
            $deal = new Deal();
            $deal->setTitle($this->faker->word());
            $deal->setPrice(mt_rand(1, 50));
            $deal->setDescription($this->faker->paragraph(2));

            $manager->persist($deal);
        }

        //Dish
        for ($j=1; $i<=100; $i++) {
            $dish = new Dish ();
            $dish->setCategory($this->faker->word());
            $dish->setTitle($this->faker->word());
            $dish->setPrice(mt_rand(1, 50));
            $dish->setDescription($this->faker->paragraph(2));
            $dish->setImage($this->faker->imageUrl(640, 480, 'animals', true));

            $manager->persist($dish);
            
        }
     
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Deal;
use App\Entity\Dish;
use App\Entity\User;
use Faker\Generator;
use App\UserListener;
use App\Entity\Booking;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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
        for ($j=1; $j<=100; $j++) {
            $dish = new Dish ();
            $dish->setCategory('entrée');
            $dish->setTitle($this->faker->word());
            $dish->setPrice(mt_rand(1, 50));
            $dish->setDescription($this->faker->paragraph(2));
            /* * The image functionality is not yet implemented
            $dish->setImage($this->faker->imageUrl(250, 250));*/


            $manager->persist($dish);
            
        }

        //Users

        $users = [];

        $admin = new User();
        $admin->setFullName('Administrateur de l\'application');
        $admin->setEmail('admin@lequaiantique.fr');
        $admin->setPlainPassword('password');
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $users [] = $admin;
        $manager->persist($admin);

        for ($k=1; $k<=10; $k++) {
            $user = new User();
            $user->setFullName($this->faker->name());
            $user->setEmail($this->faker->email());
            $user->setPassword($this->faker->password());
            $user->setRoles(['ROLE_USER']);
            $user->setPlainPassword('password');
            
            $users[] = $user;
            $manager->persist($user);
        }
     
        $manager->flush();

        //Booking
        for ($l=1; $l<=5; $l++) {
            $booking = new Booking();
            $booking->setGuestsNumber(mt_rand(1, 6));
            $booking->setBookingHour('12h30');
            
            $manager->persist($booking); 
        }
     
        $manager->flush();
    }
    
}

<?php

namespace App\DataFixtures;

use  App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{

    public const PLACE_REFERENCE = 'place';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        

        // create 20 cards! Bam!
        for ($i = 0; $i < 5; $i++) {
            $place = new Place();
            $place->setName('place '.$i);
            $place->setDescription('place '.$i);
            $place->setDate(\DateTime::createFromFormat('Y-m-d', "2020-01-01"));

            // relates this product to the category
            //    $card->setPlace('card '.$i);
        
            $this->addReference(self::PLACE_REFERENCE, $place);
            $manager->persist($place);
            $manager->flush();
    }
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}

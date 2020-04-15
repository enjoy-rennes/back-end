<?php

namespace App\DataFixtures;

use  App\Entity\Society;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocietyFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        // create 20 cards! Bam!
        for ($i = 0; $i < 5; $i++) {
            $society = new Society();
            $society->setPhone('society '.$i);
            $society->setName('society '.$i);
            $society->setType('society '.$i);
            $society->setWebsite('society '.$i);
            $society->setDescription('society '.$i);

            // relates this product to the category
            //    $card->setPlace('card '.$i);
        
          //  $this->addReference(self::PLACE_REFERENCE, $society);
            $manager->persist($society);
            $manager->flush();
    }
    }


}

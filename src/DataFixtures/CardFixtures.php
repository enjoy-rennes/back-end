<?php

namespace App\DataFixtures;

use  App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // create 20 cards! Bam!
        for ($i = 0; $i < 5; $i++) {
            $card = new Card();
            $card->setName('card '.$i);
            $card->setDescription('card '.$i);
            $card->setPlace($this->getReference(CardFixtures::PLACE_REFERENCE));


            // relates this product to the category
         // $card->setPlace('card '.$i);
            $manager->persist($card);
            $manager->flush();
    }
    }

   // public function getDependencies()
   // {
      //  return array(
       //     PlaceFixtures::class,
      //  );
   // }

    public static function getGroups(): array
    {
        return ['group1', 'group2', 'group3'];

}
}

<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //Creer Produit
        for ($i = 0; $i < 50; $i++){
            $product = new Product();
            $product-> setName('produit'.$i);
            $product-> setSlug('produit'.$i);
            $product-> setDescription('lorem ipsum'.$i);
            $product-> setPrice(rand(500, 1500));
            $product-> setPromotion(rand(500, 1500));
            $product-> setDate(new \dateTime());
            $product-> setCoupdecoeur((bool)rand(0,1));
            $manager->persist($product);
        }

        $manager->flush();
    }
}

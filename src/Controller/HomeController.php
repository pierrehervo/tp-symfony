<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     */
    public function home()
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);

        //Récupérer produit le + recent
        $newProducts = $productRepository->findMoreNew(4);

        //Récuperer produit aléatoire
        $randProducts = $productRepository->findRandom(4);

        //Récupérer produit coupdecoeur
        $cdcProduct = $productRepository->findCoupdecoeur();


        return $this->render('home/index.html.twig', [
            'new_products'=> $newProducts,
            'rand_products'=> $randProducts,
            'cdc_product'=> $cdcProduct,
        ]);
    }

    
    
}

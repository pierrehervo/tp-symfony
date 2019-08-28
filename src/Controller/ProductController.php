<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_list")
     */
    public function list()
    {
        //Récuperer le repository de l'entité Product
        $productRepository = $this->getDoctrine()->getRepository(Product::class);

        //Récupérer tous les produits
        $products = $productRepository->findAll(); 

        return $this->render('product/list.html.twig', [
            'products' =>$products,
        ]);
    }
}

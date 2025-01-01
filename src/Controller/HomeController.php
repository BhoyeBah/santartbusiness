<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProductRepository $productRepository, Cart $cart): Response
    {
        $product = $productRepository->findAll();
        return $this->render('home/accueil.html.twig', [
            'cart' => $cart->getCart(),
            'total' => $cart->getTotalWt(),
            'fullQuantity' => $cart->fullQuantity(),
            'product' => $product,
        ]);
    }

    #[Route('/a-propos', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    #[Route('/produit', name: 'app_product')]
    public function shop(ProductRepository $productRepository): Response
    {
        
        $product = $productRepository->findAll();
        
        return $this->render('home/product.html.twig', [
            'product' => $product,
        ]);
    }


    #[Route('/blog', name: 'app_blog')]
    public function blog(): Response
    {
        return $this->render('home/blog.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }
}

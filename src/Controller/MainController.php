<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Promotion;
use App\Form\FilterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route(path:'/', name:'app_root')]
    public function nav_root(): Response
    {
        return $this->redirectToRoute('app_home');
    }

    #[Route(path:'/home', name: 'app_home')]
    public function nav_home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route(path: '/products', name: 'app_catalogue')]
    public function nav_catalogue(Request $request): Response
    {
        $products   = $this->em->getRepository(Product::class)->findAll();
        $categories = $this->em->getRepository(Category::class)->findAll();
        $promotions = $this->em->getRepository(Promotion::class);   
        $form       = $this->createForm(FilterFormType::class, null, [
            'categories' => $categories
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedCategories = $form->get('categories')->getData();

            if (empty($selectedCategories)) 
                $categories = $this->em->getRepository(Category::class)->findAll();
            else
                $products   = $this->em->getRepository(Product::class)->findBy([ 'category' => $selectedCategories]);

            return $this->render('index.html.twig', [
                'form'      => $form->createView(), 
                'products'  => $products, 
                'categories'=> $categories, 
                'promotions'=> $promotions
            ]);
        }

        return $this->render('index.html.twig', [
            'form'      => $form->createView(), 
            'products'  => $products, 
            'categories'=> $categories, 
            'promotions'=> $promotions
        ]);
    }
}
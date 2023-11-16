<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\Form\PromotionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route(path: '/add_product', name: 'app_add_product')]
    public function add_product(Request $request): Response
    {
        $product    = new Product();
        $form       = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newProduct = $form->getData();
            $this->em->persist($newProduct);
            $this->em->flush();

            return $this->redirectToRoute('app_catalogue');
        }

        return $this->render('admin/add_product.html.twig', ['form' => $form->createView()]);
    }

    #[Route(path: '/add_promo/{productId}', name: 'app_add_promo')]
    public function add_promo(Request $request, int $productId): Response
    {
        $promotion  = new Promotion();
        $product    = $this->em->getRepository(Product::class)->find($productId);
        $form       = $this->createForm(PromotionFormType::class, $promotion);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $newPromotion = $form->getData();
            $newPromotion->setProduct($product);
            $this->em->persist($newPromotion);
            $this->em->flush();

            return $this->redirectToRoute('app_catalogue');
        }

        return $this->render('admin/add_promo.html.twig', ['form' => $form->createView(), 'product' => $product]);
    }

    #[Route(path: '/remove_promo/{promotionId}', name: 'app_remove_promo')]
    public function remove_promo(int $promotionId): Response
    {
        $promotion = $this->em->getRepository(Promotion::class)->find($promotionId);
        $product = $this->em->getRepository(Product::class)->find($promotion->getProduct());
        $product->setPromotion(null);
        $this->em->remove($promotion);
        $this->em->flush();
        return $this->redirectToRoute('app_catalogue');
    }
}
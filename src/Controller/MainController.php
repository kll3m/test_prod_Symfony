<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * Le controller ici sert de routeur
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Coucou la folie',
        ]);
    }

    /**
     * @Route("/", name="test")
     * @param ObjectManager $om
     * @return Response
     */

    public function test(ObjectManager $om): Response
    {
        $product = new Product();
        $product->setLibelle('Keyboard');
        $product->setPrice(999999);

        $om->persist($product);
        $om->flush();
        return new Response( "PROUTE");
    }
}

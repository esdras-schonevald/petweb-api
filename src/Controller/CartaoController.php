<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartaoController extends AbstractController
{
    #[Route('/cartao', name: 'app_cartao')]
    public function index(): Response
    {
        return $this->render('cartao/index.html.twig', [
            'controller_name' => 'CartaoController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendamentoController extends AbstractController
{
    #[Route('/agendamento', name: 'app_agendamento')]
    public function index(): Response
    {
        return $this->render('agendamento/index.html.twig', [
            'controller_name' => 'AgendamentoController',
        ]);
    }
}

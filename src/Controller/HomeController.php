<?php

declare(strict_types=1);

namespace Petweb\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function index()
    {
        return new \Symfony\Component\HttpFoundation\Response(
            status: 300,
            headers: ['Location' => '/api']
        );
    }
}

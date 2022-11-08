<?php

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    #[Route('/category/{name}', name: 'app_category_name')]
    public function index(string $name = null): JsonResponse
    {
        return $this->json(data: [
            'message' => 'Category: ' . $name,
            'path' => 'src/Controller/CategoryController.php',
        ]);
    }
}

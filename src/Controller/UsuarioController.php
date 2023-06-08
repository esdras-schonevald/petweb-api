<?php

declare(strict_types=1);

namespace Petweb\Api\Controller;

use Petweb\Api\Entity\Usuario;
use Petweb\Api\ORM\Service\UsuarioService;
use Petweb\Api\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    #[Route('/usuarios', methods: ['GET'])]
    public function findAll(UsuarioRepository $usuarioRepository): JsonResponse
    {
        $service    =   new UsuarioService();
        $usuarios   =   $service->findAll($usuarioRepository);

        return $this->json($usuarios);
    }

    #[Route('/usuarios/{id}', methods: ['GET'])]
    public function find(Request $request, UsuarioRepository $usuarioRepository): JsonResponse
    {
        $service    =   new UsuarioService();
        $user       =   $service->find($request, $usuarioRepository);

        return $this->json($user);
    }

    #[Route('/usuarios/email/{email}', methods: ['GET'])]
    public function findOneByEmail(Request $request, UsuarioRepository $repo): JsonResponse
    {
        $email      =   $request->get('email');
        $usuario    =   $repo->findOneBy(['email' => $email]);
        $service    =   new UsuarioService();
        $response   =   $service->getExtendedProperties($usuario);

        return $this->json($response);
    }

    #[Route('/usuarios', methods: ['POST'])]
    public function save(Request $request, UsuarioRepository $usuarioRepository)
    {
        $service    =   new UsuarioService();
        $usuario    =   $service->save($request, $usuarioRepository);
        $response   =   $service->getExtendedProperties($usuario);

        return $this->json($response);
    }

    #[Route('/usuarios/{id}', methods: ['PUT'])]
    public function replace(Request $request, UsuarioRepository $usuarioRepository): JsonResponse
    {
        $id         =   (int) $request->get('id');
        $usuario    =   $usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->save($request, $usuarioRepository);
        }

        return $this->update($request, $usuarioRepository);
    }

    #[Route('/usuarios/{id}', methods: ['PATCH'])]
    public function update(Request $request, UsuarioRepository $usuarioRepository): JsonResponse
    {
        $service    =   new UsuarioService();
        $usuario    =   $service->update($request, $usuarioRepository);
        $response   =   $service->getExtendedProperties($usuario);

        return $this->json($response);
    }

    #[Route('/usuarios/{id}', methods: ['DELETE'])]
    public function remove(Request $request)
    {
        $id         =   (int) $request->get('id');
        $service    =   new UsuarioService();
        $service->remove($id);

        return new Response(status: 204);
    }
}

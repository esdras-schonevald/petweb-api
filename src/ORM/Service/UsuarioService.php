<?php

declare(strict_types=1);

namespace Petweb\Api\ORM\Service;

use Petweb\Api\Entity\Conta;
use Petweb\Api\Entity\Endereco;
use Petweb\Api\Entity\GrupoUsuario;
use Petweb\Api\Entity\Pessoa;
use Petweb\Api\Entity\PessoaFisica;
use Petweb\Api\Entity\Usuario;
use Petweb\Api\ORM\Service\DefaultORMService;
use Petweb\Api\Repository\UsuarioRepository;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\Request;

class UsuarioService extends DefaultORMService
{
    /**
     * Service find all users by repository
     *
     * @param UsuarioRepository $usuarioRepository
     * @return \Petweb\Api\Entity\Usuario[]
     */
    public function findAll(UsuarioRepository $usuarioRepository): array
    {
        $usuarios   =   $usuarioRepository->findAll();
        $response   =   [];

        foreach ($usuarios as $usuario) {
            $response['/usuarios/' . $usuario->getId()] = $this->getExtendedProperties($usuario);
        }

        return $response;
    }

    /**
     * find user by repository and request
     *
     * @param UsuarioRepository $usuarioRepository
     * @param Request $request
     * @return array extended user properties
     */
    public function find(Request $request, UsuarioRepository $usuarioRepository): ?Usuario
    {
        $id         =   (int) $request->get('id');
        $response   =   $usuarioRepository->find($id);

        return $response;
    }

    public function getExtendedProperties(Usuario $user): array
    {
        return [
            'id'        =>  $user->getId(),
            'name'      =>  $user->getPessoaFisica()->getNome(),
            'email'     =>  $user->getEmail(),
            'password'  =>  $user->getSenha(),
            'userGroup' =>  $user->getGrupoUsuario()->getNome(),
            'accountId' =>  $user->getConta()->getId(),
            'telephone' =>  $user->getPessoaFisica()->getPessoa()->getTelefone(),
            'cpf'       =>  $user->getPessoaFisica()->getCpf(),
            'image'     =>  $user->getImagem(),
        ];
    }

    public function update(Request $request, UsuarioRepository $usuarioRepository): ?Usuario
    {
        $id         =   (int) $request->get('id');
        $user       =   json_decode($request->getContent());
        $usuario    =   $usuarioRepository->find($id);

        if (empty($usuario)) {
            throw new \OutOfRangeException("User does not exists!");
        }

        $usuario->setEmail($user->email);
        $usuario->setSenha($user->password);
        $usuario->setImagem($user->image);
        $usuario->getPessoaFisica()->setCpf($user->cpf);
        $usuario->getPessoaFisica()->setNome($user->name);
        $usuario->getPessoaFisica()->getPessoa()->setTelefone($user->telephone);

        $usuarioRepository->save($usuario, true);

        return $usuario;
    }

    public function save(Request $request, UsuarioRepository $usuarioRepository): Usuario
    {
        $user           =   json_decode($request->getContent());
        $emailExists    =   (bool) $usuarioRepository->findOneBy(['email' => $user->email]);

        if ($emailExists) {
            throw new \UnexpectedValueException('Email already exists');
        }

        $usuario = new Usuario();
        $usuario->setEmail($user->email);
        $usuario->setSenha($user->password);
        $usuario->setImagem($user->image);

        $conta          =   $this->putAccountByRequest($user);
        $conta->addUsuario($usuario);
        $pessoaFisica   =   $this->putPersonByRequest($user);
        $grupoUsuario   =   $this->getUserGroupByName($user->userGroup);
        $grupoUsuario->addUsuario($usuario);

        $usuario->setConta($conta);
        $usuario->setPessoaFisica($pessoaFisica);
        $usuario->setGrupoUsuario($grupoUsuario);

        //$usuarioRepository->save($usuario);

        $em = $this->getEntityManager();
        $em->persist($usuario);
        $em->flush();

        return $usuario;
    }

    public function remove(int $id)
    {
        $em     =   $this->getEntityManager();
        $user   =   $em->find(Usuario::class, $id);

        if (!$user) {
            throw new \InvalidArgumentException('User does not exists', 400);
        }

        $em->remove($user);
        $em->flush();
    }

    protected function putAccountByRequest(object $request): ?Conta
    {
        $em = $this->getEntityManager();

        if ($request->userGroup !== 'admin') {
            return $em->find(Conta::class, $request->accountId);
        }

        $conta = new Conta();
        $conta->setNumero(substr('000000' . rand(1, 100000), 0, 7));
        $em->persist($conta);

        return $conta;
    }

    protected function putPersonByRequest(object $request): PessoaFisica
    {
        $em     =   $this->getEntityManager();
        $pessoa =   new Pessoa();
        $pessoa->setTelefone($request->telephone);
        $em->persist($pessoa);

        $pessoaFisica = new PessoaFisica();
        $pessoaFisica->setPessoa($pessoa);
        $pessoaFisica->setCpf($request->cpf);
        $pessoaFisica->setNome($request->name);
        $em->persist($pessoaFisica);

        return $pessoaFisica;
    }

    protected function getUserGroupByName($name): ?GrupoUsuario
    {
        $qb = $this->getQueryBuilder();
        $qb->getParameters()->clear();
        $qb->resetDQLParts();

        $query = $qb->select('g')
            ->from(GrupoUsuario::class, 'g')
            ->where('g.nome = :name')
            ->setParameter('name', $name)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}

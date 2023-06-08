<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Petweb\Api\Entity\Pessoa;
use Petweb\Api\Repository\PessoaFisicaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

#[ApiResource(
    mercure: true,
    uriTemplate: '/pessoas_fisicas',
    operations: [
        new GetCollection(),
        new Post(),
        new Get('/pessoas_fisicas/{id}'),
        new Patch('/pessoas_fisicas/{id}'),
        new Delete('/pessoas_fisicas/{id}')
    ]
)]
#[Table(name: 'pessoa_fisica')]
#[ORM\Entity(repositoryClass: PessoaFisicaRepository::class)]
class PessoaFisica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $cpf = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa): self
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }
}

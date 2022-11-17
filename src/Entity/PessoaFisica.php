<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PessoaFisicaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "pessoas_fisicas")]
#[ORM\Entity(repositoryClass: PessoaFisicaRepository::class)]
class PessoaFisica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $idPessoa = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $cpf = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPessoa(): ?Pessoa
    {
        return $this->idPessoa;
    }

    public function setIdPessoa(Pessoa $idPessoa): self
    {
        $this->idPessoa = $idPessoa;

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

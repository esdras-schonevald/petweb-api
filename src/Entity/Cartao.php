<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Petweb\Api\Repository\CartaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    mercure: true,
    uriTemplate: "cartoes/{id}",
    operations: [
        new GetCollection("cartoes"),
        new Post("cartoes"),
        new Get,
        new Patch,
        new Put,
        new Delete
    ]
)]
#[ORM\Entity(repositoryClass: CartaoRepository::class)]
class Cartao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cartoes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conta $conta = null;

    #[ORM\Column(length: 16)]
    private ?string $numero = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $validade = null;

    #[ORM\Column(length: 3)]
    private ?string $cvv = null;

    #[ORM\Column(length: 45)]
    private ?string $titular = null;

    #[ORM\Column(length: 255)]
    private ?string $bandeira = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConta(): ?Conta
    {
        return $this->conta;
    }

    public function setConta(?Conta $conta): self
    {
        $this->conta = $conta;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getValidade(): ?\DateTimeInterface
    {
        return $this->validade;
    }

    public function setValidade(\DateTimeInterface $validade): self
    {
        $this->validade = $validade;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(string $cvv): self
    {
        $this->cvv = $cvv;

        return $this;
    }

    public function getTitular(): ?string
    {
        return $this->titular;
    }

    public function setTitular(string $titular): self
    {
        $this->titular = $titular;

        return $this;
    }

    public function getBandeira(): ?string
    {
        return $this->bandeira;
    }

    public function setBandeira(string $bandeira): self
    {
        $this->bandeira = $bandeira;

        return $this;
    }
}

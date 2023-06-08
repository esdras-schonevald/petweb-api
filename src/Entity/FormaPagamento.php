<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Petweb\Api\Repository\FormaPagamentoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

#[ApiResource(
    routePrefix: "pagamento",
    operations: [
        new GetCollection(uriTemplate: "/formas"),
        new Get(uriTemplate: "/formas/{id}"),
        new Post(uriTemplate: "/formas"),
        new Put(uriTemplate: "/formas/{id}"),
        new Delete(uriTemplate: "/formas/{id}")
    ]
)]
#[ORM\Entity(repositoryClass: FormaPagamentoRepository::class)]
#[Table(name: "forma_pagamento")]
class FormaPagamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $parcelas = null;

    #[ORM\Column(nullable: true)]
    private ?float $juro = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getParcelas(): ?int
    {
        return $this->parcelas;
    }

    public function setParcelas(?int $parcelas): self
    {
        $this->parcelas = $parcelas;

        return $this;
    }

    public function getJuro(): ?float
    {
        return $this->juro;
    }

    public function setJuro(?float $juro): self
    {
        $this->juro = $juro;

        return $this;
    }
}

<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Petweb\Api\Controller\DiaSemanaController;
use Petweb\Api\Repository\DiaSemanaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

#[ApiResource(
    operations: [
        new GetCollection(uriTemplate: "/dias/semana"),
        new Get(uriTemplate: "/dias/{id}/semana")
    ]
)]
#[ORM\Entity(repositoryClass: DiaSemanaRepository::class)]
#[Table(name: "dia_semana")]
class DiaSemana
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

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
}

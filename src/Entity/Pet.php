<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\PetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: PetRepository::class)]
class Pet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\ManyToOne(inversedBy: 'pets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Especie $especie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $raca = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cor = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $sexo = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $idade = null;

    #[ORM\Column(nullable: true)]
    private ?bool $flagCastrado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

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

    public function getEspecie(): ?Especie
    {
        return $this->especie;
    }

    public function setEspecie(?Especie $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    public function getRaca(): ?string
    {
        return $this->raca;
    }

    public function setRaca(?string $raca): self
    {
        $this->raca = $raca;

        return $this;
    }

    public function getCor(): ?string
    {
        return $this->cor;
    }

    public function setCor(?string $cor): self
    {
        $this->cor = $cor;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getIdade(): ?int
    {
        return $this->idade;
    }

    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function isFlagCastrado(): ?bool
    {
        return $this->flagCastrado;
    }

    public function setFlagCastrado(?bool $flagCastrado): self
    {
        $this->flagCastrado = $flagCastrado;

        return $this;
    }
}

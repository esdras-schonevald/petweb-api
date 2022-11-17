<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TemaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: TemaRepository::class)]
class Tema
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $corPrimaria = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $corSecundaria = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorPrimaria(): ?string
    {
        return $this->corPrimaria;
    }

    public function setCorPrimaria(?string $corPrimaria): self
    {
        $this->corPrimaria = $corPrimaria;

        return $this;
    }

    public function getCorSecundaria(): ?string
    {
        return $this->corSecundaria;
    }

    public function setCorSecundaria(?string $corSecundaria): self
    {
        $this->corSecundaria = $corSecundaria;

        return $this;
    }
}

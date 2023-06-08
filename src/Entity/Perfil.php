<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\PerfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "perfis")]
#[ORM\Entity(repositoryClass: PerfilRepository::class)]
class Perfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'perfil', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?PessoaJuridica $pessoaJuridica = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tema $tema = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logomarca = null;

    #[ORM\Column(length: 511, nullable: true)]
    private ?string $descricaoNegocio = null;

    #[ORM\Column]
    private ?bool $flagModoEscuro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPessoaJuridica(): ?PessoaJuridica
    {
        return $this->pessoaJuridica;
    }

    public function setPessoaJuridica(PessoaJuridica $pessoaJuridica): self
    {
        $this->pessoaJuridica = $pessoaJuridica;

        return $this;
    }

    public function getTema(): ?Tema
    {
        return $this->tema;
    }

    public function setTema(?Tema $tema): self
    {
        $this->tema = $tema;

        return $this;
    }

    public function getLogomarca(): ?string
    {
        return $this->logomarca;
    }

    public function setLogomarca(?string $logomarca): self
    {
        $this->logomarca = $logomarca;

        return $this;
    }

    public function getDescricaoNegocio(): ?string
    {
        return $this->descricaoNegocio;
    }

    public function setDescricaoNegocio(?string $descricaoNegocio): self
    {
        $this->descricaoNegocio = $descricaoNegocio;

        return $this;
    }

    public function isFlagModoEscuro(): ?bool
    {
        return $this->flagModoEscuro;
    }

    public function setFlagModoEscuro(bool $flagModoEscuro): self
    {
        $this->flagModoEscuro = $flagModoEscuro;

        return $this;
    }
}

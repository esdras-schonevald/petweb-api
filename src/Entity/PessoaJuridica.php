<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\PessoaJuridicaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "pessoas_juridicas")]
#[ORM\Entity(repositoryClass: PessoaJuridicaRepository::class)]
class PessoaJuridica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $cnpj = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $razaoSocial = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomeFantasia = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dataAbertura = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $foneComercial = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $representanteLegal = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $cpfRepresentante = null;

    #[ORM\OneToOne(mappedBy: 'pessoaJuridica', cascade: ['persist', 'remove'])]
    private ?Perfil $perfil = null;

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

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(?string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getRazaoSocial(): ?string
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(?string $razaoSocial): self
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    public function getNomeFantasia(): ?string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(?string $nomeFantasia): self
    {
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    public function getDataAbertura(): ?\DateTimeInterface
    {
        return $this->dataAbertura;
    }

    public function setDataAbertura(?\DateTimeInterface $dataAbertura): self
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    public function getFoneComercial(): ?string
    {
        return $this->foneComercial;
    }

    public function setFoneComercial(?string $foneComercial): self
    {
        $this->foneComercial = $foneComercial;

        return $this;
    }

    public function getRepresentanteLegal(): ?string
    {
        return $this->representanteLegal;
    }

    public function setRepresentanteLegal(?string $representanteLegal): self
    {
        $this->representanteLegal = $representanteLegal;

        return $this;
    }

    public function getCpfRepresentante(): ?string
    {
        return $this->cpfRepresentante;
    }

    public function setCpfRepresentante(?string $cpfRepresentante): self
    {
        $this->cpfRepresentante = $cpfRepresentante;

        return $this;
    }

    public function getPerfil(): ?Perfil
    {
        return $this->perfil;
    }

    public function setPerfil(Perfil $perfil): self
    {
        // set the owning side of the relation if necessary
        if ($perfil->getPessoaJuridica() !== $this) {
            $perfil->setPessoaJuridica($this);
        }

        $this->perfil = $perfil;

        return $this;
    }
}

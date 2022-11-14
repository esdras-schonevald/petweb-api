<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $senha = null;

    #[ORM\ManyToOne(inversedBy: 'usuarios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GrupoUsuario $grupoUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'usuarios')]
    private ?Conta $conta = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getGrupoUsuario(): ?GrupoUsuario
    {
        return $this->grupoUsuario;
    }

    public function setGrupoUsuario(?GrupoUsuario $grupoUsuario): self
    {
        $this->grupoUsuario = $grupoUsuario;

        return $this;
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
}

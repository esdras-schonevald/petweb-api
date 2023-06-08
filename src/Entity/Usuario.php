<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\UsuarioRepository;
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
    #[ORM\JoinColumn(name: 'pessoa_fisica_id', referencedColumnName: 'id', nullable: false)]
    private ?PessoaFisica $pessoaFisica = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $senha = null;

    #[ORM\ManyToOne(inversedBy: 'usuarios')]
    #[ORM\JoinColumn(name: 'grupo_usuario_id', referencedColumnName: 'id', nullable: false)]
    private ?GrupoUsuario $grupoUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'usuarios')]
    #[ORM\JoinColumn(name: 'conta_id', referencedColumnName: 'id', nullable: false)]
    private ?Conta $conta = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPessoaFisica(): ?PessoaFisica
    {
        return $this->pessoaFisica;
    }

    public function setPessoaFisica(PessoaFisica $pessoaFisica): self
    {
        $this->pessoaFisica = $pessoaFisica;

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

    public function setConta(Conta $conta): self
    {
        $this->conta = $conta;

        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }
}

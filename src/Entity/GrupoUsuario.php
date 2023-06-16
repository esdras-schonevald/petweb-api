<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Petweb\Api\Repository\GrupoUsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

#[ApiResource(
    mercure: true,
    routePrefix: "usuarios",
    operations: [
        new GetCollection("/grupos"),
        new Post("/grupos"),
        new Get("/grupos/{id}"),
        new Put("/grupos/{id}"),
        new Patch("/grupos/{id}"),
        new Delete("/grupos/{id}")
    ]
)]
#[Table(name: 'grupo_usuario')]
#[ORM\Entity(repositoryClass: GrupoUsuarioRepository::class)]
class GrupoUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\OneToMany(mappedBy: 'grupoUsuario', targetEntity: Usuario::class, cascade:['persist', 'remove'])]
    private Collection $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Usuario>
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios->add($usuario);
            $usuario->setGrupoUsuario($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getGrupoUsuario() === $this) {
                $usuario->setGrupoUsuario(null);
            }
        }

        return $this;
    }
}

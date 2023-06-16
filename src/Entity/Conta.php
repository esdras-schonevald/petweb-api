<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Entity\Cartao;
use Petweb\Api\Entity\Usuario;
use Petweb\Api\Repository\ContaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: ContaRepository::class)]
class Conta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\OneToMany(mappedBy: 'conta', targetEntity: Usuario::class, cascade: ['persist', 'remove'])]
    private Collection $usuarios;

    #[ORM\OneToMany(mappedBy: 'conta', targetEntity: Cartao::class)]
    private Collection $cartoes;

    #[ORM\OneToMany(mappedBy: 'conta', targetEntity: Transacao::class, orphanRemoval: true)]
    private Collection $transacoes;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->cartoes = new ArrayCollection();
        $this->transacoes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $usuario->setConta($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getConta() === $this) {
                $usuario->setConta(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cartao>
     */
    public function getCartoes(): Collection
    {
        return $this->cartoes;
    }

    public function addCarto(Cartao $carto): self
    {
        if (!$this->cartoes->contains($carto)) {
            $this->cartoes->add($carto);
            $carto->setConta($this);
        }

        return $this;
    }

    public function removeCarto(Cartao $carto): self
    {
        if ($this->cartoes->removeElement($carto)) {
            // set the owning side to null (unless already changed)
            if ($carto->getConta() === $this) {
                $carto->setConta(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Transacao>
     */
    public function getTransacoes(): Collection
    {
        return $this->transacoes;
    }

    public function addTransaco(Transacao $transaco): self
    {
        if (!$this->transacoes->contains($transaco)) {
            $this->transacoes->add($transaco);
            $transaco->setConta($this);
        }

        return $this;
    }

    public function removeTransaco(Transacao $transaco): self
    {
        if ($this->transacoes->removeElement($transaco)) {
            // set the owning side to null (unless already changed)
            if ($transaco->getConta() === $this) {
                $transaco->setConta(null);
            }
        }

        return $this;
    }
}

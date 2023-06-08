<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Pet::class, orphanRemoval: true)]
    private Collection $pets;

    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Agendamento::class)]
    private Collection $agendamentos;

    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Pedido::class)]
    private Collection $pedidos;

    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Mensagem::class)]
    private Collection $mensagens;

    public function __construct()
    {
        $this->pets = new ArrayCollection();
        $this->agendamentos = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->mensagens = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Pet>
     */
    public function getPets(): Collection
    {
        return $this->pets;
    }

    public function addPet(Pet $pet): self
    {
        if (!$this->pets->contains($pet)) {
            $this->pets->add($pet);
            $pet->setCliente($this);
        }

        return $this;
    }

    public function removePet(Pet $pet): self
    {
        if ($this->pets->removeElement($pet)) {
            // set the owning side to null (unless already changed)
            if ($pet->getCliente() === $this) {
                $pet->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Agendamento>
     */
    public function getAgendamentos(): Collection
    {
        return $this->agendamentos;
    }

    public function addAgendamento(Agendamento $agendamento): self
    {
        if (!$this->agendamentos->contains($agendamento)) {
            $this->agendamentos->add($agendamento);
            $agendamento->setCliente($this);
        }

        return $this;
    }

    public function removeAgendamento(Agendamento $agendamento): self
    {
        if ($this->agendamentos->removeElement($agendamento)) {
            // set the owning side to null (unless already changed)
            if ($agendamento->getCliente() === $this) {
                $agendamento->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pedido>
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedido $pedido): self
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos->add($pedido);
            $pedido->setCliente($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedidos->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getCliente() === $this) {
                $pedido->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mensagem>
     */
    public function getMensagens(): Collection
    {
        return $this->mensagens;
    }

    public function addMensagen(Mensagem $mensagen): self
    {
        if (!$this->mensagens->contains($mensagen)) {
            $this->mensagens->add($mensagen);
            $mensagen->setCliente($this);
        }

        return $this;
    }

    public function removeMensagen(Mensagem $mensagen): self
    {
        if ($this->mensagens->removeElement($mensagen)) {
            // set the owning side to null (unless already changed)
            if ($mensagen->getCliente() === $this) {
                $mensagen->setCliente(null);
            }
        }

        return $this;
    }
}

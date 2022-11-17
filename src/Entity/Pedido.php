<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: PedidoRepository::class)]
class Pedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\ManyToOne]
    private ?Endereco $endereco = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?FormaPagamento $formaPagamento = null;

    #[ORM\Column(nullable: true)]
    private ?float $desconto = null;

    #[ORM\Column(nullable: true)]
    private ?float $frete = null;

    #[ORM\OneToMany(mappedBy: 'pedido', targetEntity: ItemPedido::class, orphanRemoval: true)]
    private Collection $itens;

    public function __construct()
    {
        $this->itens = new ArrayCollection();
    }

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

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getFormaPagamento(): ?FormaPagamento
    {
        return $this->formaPagamento;
    }

    public function setFormaPagamento(?FormaPagamento $formaPagamento): self
    {
        $this->formaPagamento = $formaPagamento;

        return $this;
    }

    public function getDesconto(): ?float
    {
        return $this->desconto;
    }

    public function setDesconto(?float $desconto): self
    {
        $this->desconto = $desconto;

        return $this;
    }

    public function getFrete(): ?float
    {
        return $this->frete;
    }

    public function setFrete(?float $frete): self
    {
        $this->frete = $frete;

        return $this;
    }

    /**
     * @return Collection<int, ItemPedido>
     */
    public function getItens(): Collection
    {
        return $this->itens;
    }

    public function addIten(ItemPedido $iten): self
    {
        if (!$this->itens->contains($iten)) {
            $this->itens->add($iten);
            $iten->setPedido($this);
        }

        return $this;
    }

    public function removeIten(ItemPedido $iten): self
    {
        if ($this->itens->removeElement($iten)) {
            // set the owning side to null (unless already changed)
            if ($iten->getPedido() === $this) {
                $iten->setPedido(null);
            }
        }

        return $this;
    }
}

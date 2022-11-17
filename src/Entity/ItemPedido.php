<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ItemPedidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "pedido/{pedido}/itens")]
#[ORM\Entity(repositoryClass: ItemPedidoRepository::class)]
class ItemPedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'itens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pedido $pedido = null;

    #[ORM\ManyToOne]
    private ?Produto $produto = null;

    #[ORM\ManyToOne]
    private ?Servico $servico = null;

    #[ORM\Column]
    private ?int $quantidade = null;

    #[ORM\Column]
    private ?float $preco = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getProduto(): ?Produto
    {
        return $this->produto;
    }

    public function setProduto(?Produto $produto): self
    {
        $this->produto = $produto;

        return $this;
    }

    public function getServico(): ?Servico
    {
        return $this->servico;
    }

    public function setServico(?Servico $servico): self
    {
        $this->servico = $servico;

        return $this;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }
}

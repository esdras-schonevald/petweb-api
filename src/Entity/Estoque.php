<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EstoqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: EstoqueRepository::class)]
class Estoque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'estoque', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produto $produto = null;

    #[ORM\Column]
    private ?int $quantidade = null;

    #[ORM\Column]
    private ?float $preco = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduto(): ?Produto
    {
        return $this->produto;
    }

    public function setProduto(Produto $produto): self
    {
        $this->produto = $produto;

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

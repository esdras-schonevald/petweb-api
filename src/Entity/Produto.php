<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProdutoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: ProdutoRepository::class)]
class Produto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codigo = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $validade = null;

    #[ORM\Column(nullable: true)]
    private ?int $peso = null;

    #[ORM\ManyToOne(inversedBy: 'produtos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fornecedor $fornecedor = null;

    #[ORM\ManyToOne(inversedBy: 'produtos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categoria $categoria = null;

    #[ORM\Column(length: 511, nullable: true)]
    private ?string $descricao = null;

    #[ORM\OneToOne(mappedBy: 'produto', cascade: ['persist', 'remove'])]
    private ?Estoque $estoque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
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

    public function getValidade(): ?\DateTimeInterface
    {
        return $this->validade;
    }

    public function setValidade(?\DateTimeInterface $validade): self
    {
        $this->validade = $validade;

        return $this;
    }

    public function getPeso(): ?int
    {
        return $this->peso;
    }

    public function setPeso(?int $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getFornecedor(): ?Fornecedor
    {
        return $this->fornecedor;
    }

    public function setFornecedor(?Fornecedor $fornecedor): self
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getEstoque(): ?Estoque
    {
        return $this->estoque;
    }

    public function setEstoque(Estoque $estoque): self
    {
        // set the owning side of the relation if necessary
        if ($estoque->getProduto() !== $this) {
            $estoque->setProduto($this);
        }

        $this->estoque = $estoque;

        return $this;
    }
}

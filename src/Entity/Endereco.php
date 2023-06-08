<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\EnderecoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: EnderecoRepository::class)]
class Endereco
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $cep = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logradouro = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complemento = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cidade = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $estado = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pais = null;

    #[ORM\OneToMany(mappedBy: 'endereco', targetEntity: Pessoa::class)]
    private Collection $pessoas;

    public function __construct()
    {
        $this->pessoas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * @return Collection<int, Pessoa>
     */
    public function getPessoas(): Collection
    {
        return $this->pessoas;
    }

    public function addPessoa(Pessoa $pessoa): self
    {
        if (!$this->pessoas->contains($pessoa)) {
            $this->pessoas->add($pessoa);
            $pessoa->setEndereco($this);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): self
    {
        if ($this->pessoas->removeElement($pessoa)) {
            // set the owning side to null (unless already changed)
            if ($pessoa->getEndereco() === $this) {
                $pessoa->setEndereco(null);
            }
        }

        return $this;
    }
}

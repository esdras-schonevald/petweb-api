<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\TipoTransacaoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "tipos_transacoes")]
#[ORM\Entity(repositoryClass: TipoTransacaoRepository::class)]
class TipoTransacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\OneToMany(mappedBy: 'tipoTransacao', targetEntity: Transacao::class)]
    private Collection $transacoes;

    public function __construct()
    {
        $this->transacoes = new ArrayCollection();
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
            $transaco->setTipoTransacao($this);
        }

        return $this;
    }

    public function removeTransaco(Transacao $transaco): self
    {
        if ($this->transacoes->removeElement($transaco)) {
            // set the owning side to null (unless already changed)
            if ($transaco->getTipoTransacao() === $this) {
                $transaco->setTipoTransacao(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServicoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: ServicoRepository::class)]
class Servico
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(nullable: true)]
    private ?int $duracao = null;

    #[ORM\Column(nullable: true)]
    private ?float $preco = null;

    #[ORM\OneToMany(mappedBy: 'servico', targetEntity: Agendamento::class)]
    private Collection $agendamentos;

    public function __construct()
    {
        $this->agendamentos = new ArrayCollection();
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

    public function getDuracao(): ?int
    {
        return $this->duracao;
    }

    public function setDuracao(?int $duracao): self
    {
        $this->duracao = $duracao;

        return $this;
    }

    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function setPreco(?float $preco): self
    {
        $this->preco = $preco;

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
            $agendamento->setServico($this);
        }

        return $this;
    }

    public function removeAgendamento(Agendamento $agendamento): self
    {
        if ($this->agendamentos->removeElement($agendamento)) {
            // set the owning side to null (unless already changed)
            if ($agendamento->getServico() === $this) {
                $agendamento->setServico(null);
            }
        }

        return $this;
    }
}

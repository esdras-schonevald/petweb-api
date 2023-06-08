<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\StatusAgendamentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: StatusAgendamentoRepository::class)]
class StatusAgendamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: Agendamento::class)]
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
            $agendamento->setStatus($this);
        }

        return $this;
    }

    public function removeAgendamento(Agendamento $agendamento): self
    {
        if ($this->agendamentos->removeElement($agendamento)) {
            // set the owning side to null (unless already changed)
            if ($agendamento->getStatus() === $this) {
                $agendamento->setStatus(null);
            }
        }

        return $this;
    }
}

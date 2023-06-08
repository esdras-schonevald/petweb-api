<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\PrestadorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "prestadores")]
#[ORM\Entity(repositoryClass: PrestadorRepository::class)]
class Prestador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\OneToOne(mappedBy: 'idPrestador', cascade: ['persist', 'remove'])]
    private ?Agenda $agenda = null;

    #[ORM\OneToMany(mappedBy: 'prestador', targetEntity: Agenda::class, orphanRemoval: true)]
    private Collection $agendas;

    public function __construct()
    {
        $this->agendas = new ArrayCollection();
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

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(Agenda $agenda): self
    {
        // set the owning side of the relation if necessary
        if ($agenda->getIdPrestador() !== $this) {
            $agenda->setIdPrestador($this);
        }

        $this->agenda = $agenda;

        return $this;
    }

    /**
     * @return Collection<int, Agenda>
     */
    public function getAgendas(): Collection
    {
        return $this->agendas;
    }

    public function addAgenda(Agenda $agenda): self
    {
        if (!$this->agendas->contains($agenda)) {
            $this->agendas->add($agenda);
            $agenda->setPrestador($this);
        }

        return $this;
    }

    public function removeAgenda(Agenda $agenda): self
    {
        if ($this->agendas->removeElement($agenda)) {
            // set the owning side to null (unless already changed)
            if ($agenda->getPrestador() === $this) {
                $agenda->setPrestador(null);
            }
        }

        return $this;
    }
}

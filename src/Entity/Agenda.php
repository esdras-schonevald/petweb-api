<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AgendaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: AgendaRepository::class)]
class Agenda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?DiaSemana $diaSemana = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $dia = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $mes = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ano = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $horaInicio = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $horaFim = null;

    #[ORM\Column]
    private ?bool $flagRestricao = null;

    #[ORM\ManyToOne(inversedBy: 'agendas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prestador $prestador = null;

    #[ORM\OneToMany(mappedBy: 'agenda', targetEntity: Agendamento::class, orphanRemoval: true)]
    private Collection $agendamentos;

    public function __construct()
    {
        $this->agendamentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiaSemana(): ?DiaSemana
    {
        return $this->diaSemana;
    }

    public function setDiaSemana(?DiaSemana $diaSemana): self
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }

    public function getDia(): ?int
    {
        return $this->dia;
    }

    public function setDia(?int $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getMes(): ?int
    {
        return $this->mes;
    }

    public function setMes(?int $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(?int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->horaInicio;
    }

    public function setHoraInicio(?\DateTimeInterface $horaInicio): self
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    public function getHoraFim(): ?\DateTimeInterface
    {
        return $this->horaFim;
    }

    public function setHoraFim(?\DateTimeInterface $horaFim): self
    {
        $this->horaFim = $horaFim;

        return $this;
    }

    public function isFlagRestricao(): ?bool
    {
        return $this->flagRestricao;
    }

    public function setFlagRestricao(bool $flagRestricao): self
    {
        $this->flagRestricao = $flagRestricao;

        return $this;
    }

    public function getPrestador(): ?Prestador
    {
        return $this->prestador;
    }

    public function setPrestador(?Prestador $prestador): self
    {
        $this->prestador = $prestador;

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
            $agendamento->setAgenda($this);
        }

        return $this;
    }

    public function removeAgendamento(Agendamento $agendamento): self
    {
        if ($this->agendamentos->removeElement($agendamento)) {
            // set the owning side to null (unless already changed)
            if ($agendamento->getAgenda() === $this) {
                $agendamento->setAgenda(null);
            }
        }

        return $this;
    }
}

<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\AgendamentoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: AgendamentoRepository::class)]
class Agendamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agenda $agenda = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hora = null;

    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Servico $servico = null;

    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;

    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StatusAgendamento $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(?Agenda $agenda): self
    {
        $this->agenda = $agenda;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(?\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

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

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getStatus(): ?StatusAgendamento
    {
        return $this->status;
    }

    public function setStatus(?StatusAgendamento $status): self
    {
        $this->status = $status;

        return $this;
    }
}

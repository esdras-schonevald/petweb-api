<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TransacaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "transacoes")]
#[ORM\Entity(repositoryClass: TransacaoRepository::class)]
class Transacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\ManyToOne(inversedBy: 'transacoes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conta $conta = null;

    #[ORM\ManyToOne(inversedBy: 'transacoes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoTransacao $tipoTransacao = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Operacao $operacao = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

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

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getConta(): ?Conta
    {
        return $this->conta;
    }

    public function setConta(?Conta $conta): self
    {
        $this->conta = $conta;

        return $this;
    }

    public function getTipoTransacao(): ?TipoTransacao
    {
        return $this->tipoTransacao;
    }

    public function setTipoTransacao(?TipoTransacao $tipoTransacao): self
    {
        $this->tipoTransacao = $tipoTransacao;

        return $this;
    }

    public function getOperacao(): ?Operacao
    {
        return $this->operacao;
    }

    public function setOperacao(?Operacao $operacao): self
    {
        $this->operacao = $operacao;

        return $this;
    }
}

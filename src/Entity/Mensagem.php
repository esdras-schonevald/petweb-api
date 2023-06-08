<?php

namespace Petweb\Api\Entity;

use ApiPlatform\Metadata\ApiResource;
use Petweb\Api\Repository\MensagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(mercure: true, uriTemplate: "mensagens")]
#[ORM\Entity(repositoryClass: MensagemRepository::class)]
class Mensagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $assunto = null;

    #[ORM\Column(length: 1023, nullable: true)]
    private ?string $texto = null;

    #[ORM\Column]
    private ?bool $flagElogio = null;

    #[ORM\Column]
    private ?bool $flagReclamacao = null;

    #[ORM\Column]
    private ?bool $flagSugestao = null;

    #[ORM\ManyToOne(inversedBy: 'mensagens')]
    private ?Cliente $cliente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssunto(): ?string
    {
        return $this->assunto;
    }

    public function setAssunto(?string $assunto): self
    {
        $this->assunto = $assunto;

        return $this;
    }

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(?string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function isFlagElogio(): ?bool
    {
        return $this->flagElogio;
    }

    public function setFlagElogio(bool $flagElogio): self
    {
        $this->flagElogio = $flagElogio;

        return $this;
    }

    public function isFlagReclamacao(): ?bool
    {
        return $this->flagReclamacao;
    }

    public function setFlagReclamacao(bool $flagReclamacao): self
    {
        $this->flagReclamacao = $flagReclamacao;

        return $this;
    }

    public function isFlagSugestao(): ?bool
    {
        return $this->flagSugestao;
    }

    public function setFlagSugestao(bool $flagSugestao): self
    {
        $this->flagSugestao = $flagSugestao;

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
}

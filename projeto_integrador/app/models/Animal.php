<?php 

namespace app\models;

use DateTimeImmutable;

class Animal {

    private int $id;
    private string $nome;
    private int $idade;
    private DateTimeImmutable $criadoEm;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */
    public function getIdade(): string
    {
        return $this->idade;
    }

    /**
     * Set the value of dataNascimento
     */
    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }
}
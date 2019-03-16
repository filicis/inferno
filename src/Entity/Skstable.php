<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkstableRepository")
 */
class Skstable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sks;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $tekst;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSks(): ?string
    {
        return $this->sks;
    }

    public function setSks(string $sks): self
    {
        $this->sks = $sks;

        return $this;
    }

    public function getTekst(): ?string
    {
        return $this->tekst;
    }

    public function setTekst(string $tekst): self
    {
        $this->tekst = $tekst;

        return $this;
    }
}

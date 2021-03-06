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
     * @ORM\Column(type="string", length=10)
     */
    private $sks;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $tekst;

    public function getSks(): ?string
    {
        return $this->id;
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

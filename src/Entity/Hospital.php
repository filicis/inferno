<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HospitalRepository")
 */
class Hospital
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Skstable", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSks(): ?Skstable
    {
        return $this->sks;
    }

    public function setSks(Skstable $sks): self
    {
        $this->sks = $sks;

        return $this;
    }
}

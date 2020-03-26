<?php

//		Noter
//
//		Indeholder kort resume af et specifikt sygdomsforløb
//
//		id
//		forfatter			Lægen der har skrevet resumeet
//		skrevet				Dato
//		patient
//		tekst

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoterRepository")
 */
class Noter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $forfatter;

    /**
     * @ORM\Column(type="datetime")
     */
    private $skrevet;

    /**
     * @ORM\Column(type="array")
     */
    private $tekst = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="noters")
     */
    private $patient;


    public function __construct()
    {
        $this->skrevet= new \DateTime();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForfatter(): ?string
    {
        return $this->forfatter;
    }

    public function setForfatter(string $forfatter): self
    {
        $this->forfatter = $forfatter;

        return $this;
    }

    public function getSkrevet(): ?\DateTimeInterface
    {
        return $this->skrevet;
    }

    public function setSkrevet(\DateTimeInterface $skrevet): self
    {
        $this->skrevet = $skrevet;

        return $this;
    }

    public function getTekst(): ?array
    {
        return $this->tekst;
    }

    public function setTekst(array $tekst): self
    {
        $this->tekst = $tekst;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

}

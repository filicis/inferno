<?php

//		Patient
//
//
//

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
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
    private $cpr;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $efternavn;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fornavne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpr(): ?string
    {
        return $this->cpr;
    }

    public function setCpr(string $cpr): self
    {
        $this->cpr = $cpr;

        return $this;
    }

    public function getEfternavn(): ?string
    {
        return $this->efternavn;
    }

    public function setEfternavn(string $efternavn): self
    {
        $this->efternavn = $efternavn;

        return $this;
    }

    public function getFornavne(): ?string
    {
        return $this->fornavne;
    }

    public function setFornavne(string $fornavne): self
    {
        $this->fornavne = $fornavne;

        return $this;
    }
    
    	//	function getNavn()
    
    public function getNavn(): ?string
    {
    	return $this->fornavne . " " . $this->efternavn;
    }
}
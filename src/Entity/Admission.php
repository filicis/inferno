<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdmissionRepository")
 */

class Admission
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="admission", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Afsnit", inversedBy="admission", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $afsnit;


    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $discharged;

    /**
     * @ORM\Column(type="datetime")
     */
    private $admitted;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;



    public function __construct()
    {
        $this->active= true;
        $this->admitted= new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getAfsnit(): ?Afsnit
    {
        return $this->afsnit;
    }

    public function setAfsnit(Afsnit $afsnit): self
    {
        $this->afsnit = $afsnit;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDischarged(): ?\DateTimeInterface
    {
        return $this->discharged;
    }

    public function setDischarged(?\DateTimeInterface $discharged): self
    {
        $this->discharged = $discharged;

        return $this;
    }

    public function getAdmitted(): ?\DateTimeInterface
    {
        return $this->admitted;
    }

    public function setAdmitted(\DateTimeInterface $admitted): self
    {
        $this->admitted = $admitted;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }



}

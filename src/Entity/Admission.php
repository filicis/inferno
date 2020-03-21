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
     * @ORM\OneToOne(targetEntity="App\Entity\Patient", inversedBy="admission", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cpr;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Afsnit", inversedBy="admission", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sks;

    /**
     * @ORM\Column(type="datetime")
     */
    private $admission;

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
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpr(): ?Patient
    {
        return $this->cpr;
    }

    public function setCpr(Patient $cpr): self
    {
        $this->cpr = $cpr;

        return $this;
    }

    public function getSks(): ?Afsnit
    {
        return $this->sks;
    }

    public function setSks(Afsnit $sks): self
    {
        $this->sks = $sks;

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

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

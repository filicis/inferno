<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AfsnitRepository")
 */
class Afsnit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $sks;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $navn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Afdeling", inversedBy="afsnits")
     * @ORM\JoinColumn(nullable=true)
     */
    private $afdeling;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="afsnits")
     */
    private $users;

    /**
     * @ORM\Column(type="date")
     */
    private $oprettet;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $beds = [];

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId()
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

    public function getNavn(): ?string
    {
        return $this->navn;
    }

    public function setNavn(string $navn): self
    {
        $this->navn = $navn;

        return $this;
    }

    public function getAfdeling(): ?Afdeling
    {
        return $this->afdeling;
    }

    public function setAfdeling(?Afdeling $afdeling): self
    {
        $this->afdeling = $afdeling;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    public function getOprettet(): ?\DateTimeInterface
    {
        return $this->oprettet;
    }

    public function setOprettet(\DateTimeInterface $oprettet): self
    {
        $this->oprettet = $oprettet;

        return $this;
    }

    public function getBeds(): ?array
    {
        return $this->beds;
    }

    public function setBeds(?array $beds): self
    {
        $this->beds = $beds;

        return $this;
    }
}

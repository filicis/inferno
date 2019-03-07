<?php

/**
 * inferno: Værktøj til Lægelig Skemalægning
 *
 *
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Afdelings tabellen
 * - Indeholder stamdata på alle afdelingen oprettet i systemet
 *
 * Tabellens kolonner:
 * id:						: Database teknisk identificator
 * sks:						: Afdelingens SKS kode
 * area:					: 
 * navn						: Afdelingens officielle navn	
 *
 *
 * @ORM\Entity(repositoryClass="App\Repository\AfdelingRepository")
 */
class Afdeling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $sks;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $navn;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $area;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Afsnit", mappedBy="afdeling")
     */
    private $afsnits;

    /**
     * @ORM\Column(type="date")
     */
    private $oprettet;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $institution;

    public function __construct()
    {
    	 	$this->is_active= true;
        $this->oprettet= new \DateTime();
        $this->afsnits = new ArrayCollection();
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

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return Collection|Afsnit[]
     */
    public function getAfsnits(): Collection
    {
        return $this->afsnits;
    }

    public function addAfsnit(Afsnit $afsnit): self
    {
        if (!$this->afsnits->contains($afsnit)) {
            $this->afsnits[] = $afsnit;
            $afsnit->setAfdeling($this);
        }

        return $this;
    }

    public function removeAfsnit(Afsnit $afsnit): self
    {
        if ($this->afsnits->contains($afsnit)) {
            $this->afsnits->removeElement($afsnit);
            // set the owning side to null (unless already changed)
            if ($afsnit->getAfdeling() === $this) {
                $afsnit->setAfdeling(null);
            }
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

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(string $institution): self
    {
        $this->institution = $institution;

        return $this;
    }
}

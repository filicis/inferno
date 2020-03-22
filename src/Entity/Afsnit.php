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
     * @ORM\Column(type="string", length=7, unique=true)
     */
    private $sks;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $navn;


    /**
     * @ORM\Column(type="date")
     */
    private $oprettet;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $beds = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */

    private $notefelter= [];

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $kortnavn;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Admission", mappedBy="afsnit", orphanRemoval=true)
     */
    private $admissions;

    public function __construct()
    {
        $this->admissions = new ArrayCollection();
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

    public function getKortnavn(): ?string
    {
        return $this->kortnavn;
    }

    public function setKortnavn(string $kortnavn): self
    {
        $this->kortnavn = $kortnavn;

        return $this;
    }

    public function getNotefelter(): ?array
    {
        return $this->notefelter == null ? ["Anamnese", "CNS",] : $this->notefelter;
    }

    public function setNotefelter(array $notefelter): self
    {
        $this->notefelter = $notefelter;

        return $this;
    }

    /**
     * @return Collection|Admission[]
     */
    public function getAdmissions(): Collection
    {
        return $this->admissions;
    }

    public function addAdmission(Admission $admission): self
    {
        if (!$this->admissions->contains($admission)) {
            $this->admissions[] = $admission;
            $admission->setAfsnit($this);
        }

        return $this;
    }

    public function removeAdmission(Admission $admission): self
    {
        if ($this->admissions->contains($admission)) {
            $this->admissions->removeElement($admission);
            // set the owning side to null (unless already changed)
            if ($admission->getAfsnit() === $this) {
                $admission->setAfsnit(null);
            }
        }

        return $this;
    }


}

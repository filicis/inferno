<?php

//		Patient
//
//
//

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=10, unique=true)
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Admission", mappedBy="patient", orphanRemoval=true)
     */
    private $admissions;

    public function __construct()
    {
        $this->admissions = new ArrayCollection();
    }



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
            $admission->setPatient($this);
        }

        return $this;
    }

    public function removeAdmission(Admission $admission): self
    {
        if ($this->admissions->contains($admission)) {
            $this->admissions->removeElement($admission);
            // set the owning side to null (unless already changed)
            if ($admission->getPatient() === $this) {
                $admission->setPatient(null);
            }
        }

        return $this;
    }


    /**
     *  isValid
     *
     *  checker validiteten af det aktuelle CPR-nummer
     *
     *  - Skal være på 10 karakterer, som alle skal være tal.
     *  -
     *  - Checker ** IKKE ** for gyldig fødselsdato !!


    public function isValid(): boolean
    {
      $y= array(4, 3, 2, 7, 6, 5, 4, 3, 2, 1);
      $cpr= $this->getCpr();

      if strlen($cpr) == 10 && ctype_digit($cpr))
      {
        $x= 0;

        for($i= 0; $i< 10; $++)
        {
          $x+= ($cpr[$i] - 48) * $y[$i];
        }
        return ($x / 11) == 0;

      }
      return false;
    }


    public function getCprN(): ? String
    {
      $cpr= this->getCpr();

      return substr($cpr, 0, 6 ) . "-" . substr($cpr, 7);

    }

    **/

}

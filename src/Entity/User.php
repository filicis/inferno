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
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Bruger tabellen
 * - Indeholder stamdata på samtlige brugere der er tilknyttet systemet
 * 
 * Tabellens kolonner
 * 	id						: Database teknisk identifikator
 *	username			: Entydigt Bruger Identifikator, her typisk som RegionsID
 *	password			: Krypteret password							 
 *  navn					: Brugerens fulde navn
 * 	roles					: Brugerens roller i systemet - ikke at forveksle med rolle i de enkelte afdelinger
 *  oprettet			: Datoen for brugerens oprettelse i systemet.
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */

class User implements UserInterface, \Serializable
{
    /**
		 * id
		 *	
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * username
     *
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank()    
     */

    private $username;

    /**
     * navn
     *
     * @ORM\Column(type="string", length=64)
     */
     
    private $navn;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
     
    private $plainPassword;


    /**
     * password
     * 
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;
    
    /**
     * @ORM\Column(type="date")
     */
     
    private $oprettet; 
    
    /**
     * roles
     *
     * @ORM\Column(type="array")
     */

    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Afsnit", mappedBy="users")
     */
    private $afsnits;

    public function __construct()
    {
        $this->roles = array('ROLE_USER', 'ROLE_ADMIN');
        $this->is_active= true;
        $this->oprettet= new \DateTime();
        $this->afsnits = new ArrayCollection();
    }

    

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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
    
    
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
    
    public function getOprettet(): ?datetime
    {
    	return $this->oprettet;
    }
    
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    
        public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }
    
      /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->navn,
            $this->roles,
            $this->is_active,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->navn,
            $this->roles,
            $this->is_active,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
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
            $afsnit->addUser($this);
        }

        return $this;
    }

    public function removeAfsnit(Afsnit $afsnit): self
    {
        if ($this->afsnits->contains($afsnit)) {
            $this->afsnits->removeElement($afsnit);
            $afsnit->removeUser($this);
        }

        return $this;
    }


}

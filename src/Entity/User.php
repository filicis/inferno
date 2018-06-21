<?php

/**
 * inferno: L�gelig Skemal�gning
 *
 *
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bruger tabellen
 * - Indeholder stamdata p� samtlige brugere der er tilknyttet systemet
 * 
 * Tabellens kolonner
 * 	id						: Database teknisk identifikator
 *	username			: Entydigt Bruger Identifikator, her typisk som RegionsID
 *	password			: Krypteret password							 
 *  navn					: Brugerens fulde navn
 * 	roles					: Brugerens roller i systemet - ikke at forveksle med rolle i de enkelte afdelinger
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */

class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

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
}

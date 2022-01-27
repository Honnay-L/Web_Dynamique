<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LikesRepository::class)
 */
class Likes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usersite::class, inversedBy="likes")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Firstname::class, inversedBy="likes")
     */
    private $firstname;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->Firstname = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Usersite
    {
        return $this->user;
    }

    public function setUser(?Usersite $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFirstname(): ?Firstname
    {
        return $this->firstname;
    }

    public function setFirstname(?Firstname $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }


}

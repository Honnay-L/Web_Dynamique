<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity=Usersite::class, mappedBy="photo", cascade={"persist", "remove"})
     */
    private $usersite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUsersite(): ?Usersite
    {
        return $this->usersite;
    }

    public function setUsersite(?Usersite $usersite): self
    {
        // unset the owning side of the relation if necessary
        if ($usersite === null && $this->usersite !== null) {
            $this->usersite->setPhoto(null);
        }

        // set the owning side of the relation if necessary
        if ($usersite !== null && $usersite->getPhoto() !== $this) {
            $usersite->setPhoto($this);
        }

        $this->usersite = $usersite;

        return $this;
    }
    public function __toString(): string
    {
        return $this->url;
    }

}

<?php

namespace App\Entity;

use App\Repository\OriginRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OriginRepository::class)
 */
class Origin
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Firstname::class, mappedBy="origin")
     */
    private $firstnames;

    /**
     * @ORM\OneToMany(targetEntity=Addfirstname::class, mappedBy="origin", orphanRemoval=true)
     */
    private $addfirstnames;

    public function __construct()
    {
        $this->firstnames = new ArrayCollection();
        $this->addfirstnames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Firstname[]
     */
    public function getFirstnames(): Collection
    {
        return $this->firstnames;
    }

    public function addFirstname(Firstname $firstname): self
    {
        if (!$this->firstnames->contains($firstname)) {
            $this->firstnames[] = $firstname;
            $firstname->setOrigin($this);
        }

        return $this;
    }

    public function removeFirstname(Firstname $firstname): self
    {
        if ($this->firstnames->removeElement($firstname)) {
            // set the owning side to null (unless already changed)
            if ($firstname->getOrigin() === $this) {
                $firstname->setOrigin(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection|Addfirstname[]
     */
    public function getAddfirstnames(): Collection
    {
        return $this->addfirstnames;
    }

    public function addAddfirstname(Addfirstname $addfirstname): self
    {
        if (!$this->addfirstnames->contains($addfirstname)) {
            $this->addfirstnames[] = $addfirstname;
            $addfirstname->setOrigin($this);
        }

        return $this;
    }

    public function removeAddfirstname(Addfirstname $addfirstname): self
    {
        if ($this->addfirstnames->removeElement($addfirstname)) {
            // set the owning side to null (unless already changed)
            if ($addfirstname->getOrigin() === $this) {
                $addfirstname->setOrigin(null);
            }
        }

        return $this;
    }
}

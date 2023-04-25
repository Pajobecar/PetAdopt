<?php

namespace App\Entity;

use App\Repository\PetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PetRepository::class)]
class Pet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $species = null;

    #[ORM\Column(length: 50)]
    private ?string $breed = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 50)]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $image = "animal.jpg";

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $needs = null;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $pet_adoption;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'liked')]
    private Collection $likedBy;

    #[ORM\ManyToOne(inversedBy: 'adopted')]
    private ?User $adoptedBz = null;

    public function __construct()
    {
        $this->pet_adoption = new ArrayCollection();
        $this->likedBy = new ArrayCollection();
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

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNeeds(): ?string
    {
        return $this->needs;
    }

    public function setNeeds(string $needs): self
    {
        $this->needs = $needs;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPetAdoption(): Collection
    {
        return $this->pet_adoption;
    }

    public function addPetAdoption(User $petAdoption): self
    {
        if (!$this->pet_adoption->contains($petAdoption)) {
            $this->pet_adoption->add($petAdoption);
        }

        return $this;
    }

    public function removePetAdoption(User $petAdoption): self
    {
        $this->pet_adoption->removeElement($petAdoption);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getLikedBy(): Collection
    {
        return $this->likedBy;
    }

    public function addLikedBy(User $likedBy): self
    {
        if (!$this->likedBy->contains($likedBy)) {
            $this->likedBy->add($likedBy);
            $likedBy->addLiked($this);
        }

        return $this;
    }

    public function removeLikedBy(User $likedBy): self
    {
        if ($this->likedBy->removeElement($likedBy)) {
            $likedBy->removeLiked($this);
        }

        return $this;
    }

    public function getAdoptedBz(): ?User
    {
        return $this->adoptedBz;
    }

    public function setAdoptedBz(?User $adoptedBz): self
    {
        $this->adoptedBz = $adoptedBz;

        return $this;
    }
}

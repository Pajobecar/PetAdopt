<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $fname = null;

    #[ORM\Column(length: 50)]
    private ?string $lname = null;

    #[ORM\Column(length: 20)]
    private ?string $gender = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $bdate = null;

    #[ORM\Column(length: 255)]
    private ?string $image = "user.jpg";

    #[ORM\ManyToMany(targetEntity: Pet::class, inversedBy: 'likedBy')]
    private Collection $liked;

    #[ORM\OneToMany(mappedBy: 'adoptedBz', targetEntity: Pet::class)]
    private Collection $adopted;

    public function __construct()
    {
        $this->liked = new ArrayCollection();
        $this->adopted = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getBdate(): ?\DateTimeInterface
    {
        return $this->bdate;
    }

    public function setBdate(\DateTimeInterface $bdate): self
    {
        $this->bdate = $bdate;

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

    /**
     * @return Collection<int, Pet>
     */
    public function getLiked(): Collection
    {
        return $this->liked;
    }

    public function addLiked(Pet $liked): self
    {
        if (!$this->liked->contains($liked)) {
            $this->liked->add($liked);
        }

        return $this;
    }

    public function removeLiked(Pet $liked): self
    {
        $this->liked->removeElement($liked);

        return $this;
    }

    /**
     * @return Collection<int, Pet>
     */
    public function getAdopted(): Collection
    {
        return $this->adopted;
    }

    public function addAdopted(Pet $adopted): self
    {
        if (!$this->adopted->contains($adopted)) {
            $this->adopted->add($adopted);
            $adopted->setAdoptedBz($this);
        }

        return $this;
    }

    public function removeAdopted(Pet $adopted): self
    {
        if ($this->adopted->removeElement($adopted)) {
            // set the owning side to null (unless already changed)
            if ($adopted->getAdoptedBz() === $this) {
                $adopted->setAdoptedBz(null);
            }
        }

        return $this;
    }
}

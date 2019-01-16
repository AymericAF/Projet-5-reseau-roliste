<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *      fields={"username"},
 *      message="Ce nom d'utilisateur est déjà utilisé, veuillez en saisir un autre."
 * )
 * @UniqueEntity(
 *      fields={"email"},
 *      message="Cette adresse email est déjà enregistrée."
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**  
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Length(min = 3, minMessage = "Votre nom d'utilisateur est trop court, veuillez saisir un minimum de 3 caractères.")
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer une adresse mail valide.")
     */
    private $email;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $gpsLat;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $gpsLong;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="binary")
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $playerYouAre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PlayerYouSearch;

    /**
     * @ORM\Column(type="boolean")
     */
    private $PlayExclusivelyAtHome;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxDistance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }


    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getGpsLat()
    {
        return $this->gpsLat;
    }

    public function setGpsLat($gpsLat): self
    {
        $this->gpsLat = $gpsLat;

        return $this;
    }

    public function getGpsLong()
    {
        return $this->gpsLong;
    }

    public function setGpsLong($gpsLong): self
    {
        $this->gpsLong = $gpsLong;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getPlayerYouAre(): ?string
    {
        return $this->playerYouAre;
    }

    public function setPlayerYouAre(?string $playerYouAre): self
    {
        $this->playerYouAre = $playerYouAre;

        return $this;
    }

    public function getPlayerYouSearch(): ?string
    {
        return $this->PlayerYouSearch;
    }

    public function setPlayerYouSearch(?string $PlayerYouSearch): self
    {
        $this->PlayerYouSearch = $PlayerYouSearch;

        return $this;
    }

    public function getPlayExclusivelyAtHome(): ?bool
    {
        return $this->PlayExclusivelyAtHome;
    }

    public function setPlayExclusivelyAtHome(?bool $PlayExclusivelyAtHome): self
    {
        $this->PlayExclusivelyAtHome = $PlayExclusivelyAtHome;

        return $this;
    }

    public function getMaxDistance(): ?int
    {
        return $this->MaxDistance;
    }

    public function setMaxDistance(?int $MaxDistance): self
    {
        $this->MaxDistance = $MaxDistance;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(bool $Active): self
    {
        $this->Active = $Active;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

<?php

namespace App\Entity;

<<<<<<< Updated upstream
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_username", type="string", length=50, nullable=false)
     */
    private $userUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=50, nullable=false)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=50, nullable=false)
     */
    private $userPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="user_firstname", type="string", length=50, nullable=false)
     */
    private $userFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_lastname", type="string", length=50, nullable=false)
     */
    private $userLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_birthday", type="string", length=50, nullable=false)
     */
    private $userBirthday;

    /**
     * @var string
     *
     * @ORM\Column(name="user_gender", type="string", length=200, nullable=false)
     */
    private $userGender;

    /**
     * @var string
     *
     * @ORM\Column(name="user_picture", type="string", length=200, nullable=false)
     */
    private $userPicture;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="user")
     * @ORM\JoinTable(name="panier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     *   }
     * )
     */
    private $idProduct = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", inversedBy="user")
     * @ORM\JoinTable(name="participation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     *   }
     * )
     */
    private $idEvent = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProduct = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idEvent = new \Doctrine\Common\Collections\ArrayCollection();
    }

=======
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = ['ROLE_USER'];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 50)]
    private ?string $user_username = null;

    #[ORM\Column(length: 50)]
    private ?string $user_firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $user_lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $user_birthday = null;

    #[ORM\Column(length: 200)]
    private ?string $user_gender = null;

    #[ORM\Column(length: 200)]
    private ?string $user_picture = null;

    #[ORM\Column(length: 255)]
    private ?string $user_phonenumber = null;

    #[ORM\Column]
    private ?int $user_level = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
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

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getUserUsername(): ?string
    {
        return $this->user_username;
    }

    public function setUserUsername(string $user_username): static
    {
        $this->user_username = $user_username;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->user_firstname;
    }

    public function setUserFirstname(string $user_firstname): static
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->user_lastname;
    }

    public function setUserLastname(string $user_lastname): static
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    public function getUserBirthday(): ?\DateTimeInterface
    {
        return $this->user_birthday;
    }

    public function setUserBirthday(\DateTimeInterface $user_birthday): static
    {
        $this->user_birthday = $user_birthday;

        return $this;
    }

    public function getUserGender(): ?string
    {
        return $this->user_gender;
    }

    public function setUserGender(string $user_gender): static
    {
        $this->user_gender = $user_gender;

        return $this;
    }

    public function getUserPicture(): ?string
    {
        return $this->user_picture;
    }

    public function setUserPicture(string $user_picture): static
    {
        $this->user_picture = $user_picture;

        return $this;
    }

    public function getUserPhonenumber(): ?string
    {
        return $this->user_phonenumber;
    }

    public function setUserPhonenumber(string $user_phonenumber): static
    {
        $this->user_phonenumber = $user_phonenumber;

        return $this;
    }

    public function getUserLevel(): ?int
    {
        return $this->user_level;
    }

    public function setUserLevel(int $user_level): static
    {
        $this->user_level = $user_level;

        return $this;
    }
>>>>>>> Stashed changes
}

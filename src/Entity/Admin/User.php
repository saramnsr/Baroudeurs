<?php

namespace App\Entity\Admin;

use App\Repository\Admin\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Compte administrateur.
 * Table "admin_user" car "user" est réservé en PostgreSQL.
 *
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(
 *     name="admin_user",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="uniq_admin_user_email", columns={"email"})}
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /** @ORM\Column(type="string", length=180) */
    private string $email = '';

    /** @ORM\Column(type="json") */
    private array $roles = [];

    /** @ORM\Column(type="string", length=255) */
    private string $password = '';

    /** @ORM\Column(type="datetime_immutable") */
    private \DateTimeImmutable $createdAt;

    /** @ORM\Column(type="datetime_immutable", nullable=true) */
    private ?\DateTimeImmutable $lastLoginAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    // Email toujours enregistré en minuscules
    public function setEmail(string $email): self
    {
        $this->email = mb_strtolower(trim($email));

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_values(array_unique($roles));
    }

    public function setRoles(array $roles): self
    {
        $this->roles = array_values(array_unique($roles));

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getLastLoginAt(): ?\DateTimeImmutable
    {
        return $this->lastLoginAt;
    }

    public function setLastLoginAt(?\DateTimeImmutable $lastLoginAt): self
    {
        $this->lastLoginAt = $lastLoginAt;

        return $this;
    }

    // Identifiant de connexion (Symfony 4.4)
    public function getUsername(): string
    {
        return $this->email;
    }

    // Identifiant de connexion (Symfony 5.3+)
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    // Pas de sel : bcrypt/argon2 le gèrent déjà
    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }
}
<?php

namespace App\Entity;

use App\Repository\ContactMessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactMessageRepository::class)
 * @ORM\Table(name="contact_message")
 * @ORM\HasLifecycleCallbacks
 */
class ContactMessage
{
    public const TYPE_CONTACT = 'contact';
    public const TYPE_AVAILABILITY = 'availability';
    public const TYPE_BOOKING = 'booking';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /** @ORM\Column(type="string", length=32) */
    private string $type = self::TYPE_CONTACT;

    /** @ORM\Column(type="string", length=255) */
    private string $name = '';

    /** @ORM\Column(type="string", length=255) */
    private string $email = '';

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private ?string $phone = null;

    /** @ORM\Column(type="text", nullable=true) */
    private ?string $message = null;

    /** @ORM\Column(type="json", nullable=true) */
    private ?array $extra = null;

    /** @ORM\Column(type="boolean") */
    private bool $isRead = false;

    /** @ORM\Column(type="datetime_immutable") */
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getType(): string { return $this->type; }
    public function setType(string $v): self { $this->type = $v; return $this; }

    public function getName(): string { return $this->name; }
    public function setName(string $v): self { $this->name = $v; return $this; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $v): self { $this->email = $v; return $this; }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $v): self { $this->phone = $v; return $this; }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $v): self { $this->message = $v; return $this; }

    public function getExtra(): ?array { return $this->extra; }
    public function setExtra(?array $v): self { $this->extra = $v; return $this; }

    public function getIsRead(): bool { return $this->isRead; }
    public function setIsRead(bool $v): self { $this->isRead = $v; return $this; }

    public function getCreatedAt(): \DateTimeImmutable { return $this->createdAt; }
    public function setCreatedAt(\DateTimeImmutable $v): self { $this->createdAt = $v; return $this; }
}
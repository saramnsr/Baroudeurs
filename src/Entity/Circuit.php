<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircuitRepository::class)
 */
class Circuit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $titleFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $titleEn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $titleAr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $titleIt;

    /**
     * @ORM\Column(type="text")
     */
    private string $descriptionFr;

    /**
     * @ORM\Column(type="text")
     */
    private string $descriptionEn;

    /**
     * @ORM\Column(type="text")
     */
    private string $descriptionAr;

    /**
     * @ORM\Column(type="text")
     */
    private string $descriptionIt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $durationFr = null;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $durationEn = null;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $durationAr = null;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $durationIt = null;

    /**
     * @ORM\Column(type="json")
     */
    private array $icons = [];

    /**
     * @ORM\Column(type="integer")
     */
    private int $position = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getTitleFr(): string { return $this->titleFr; }
    public function setTitleFr(string $v): self { $this->titleFr = $v; return $this; }

    public function getTitleEn(): string { return $this->titleEn; }
    public function setTitleEn(string $v): self { $this->titleEn = $v; return $this; }

    public function getTitleAr(): string { return $this->titleAr; }
    public function setTitleAr(string $v): self { $this->titleAr = $v; return $this; }

    public function getTitleIt(): string { return $this->titleIt; }
    public function setTitleIt(string $v): self { $this->titleIt = $v; return $this; }

    public function getDescriptionFr(): string { return $this->descriptionFr; }
    public function setDescriptionFr(string $v): self { $this->descriptionFr = $v; return $this; }

    public function getDescriptionEn(): string { return $this->descriptionEn; }
    public function setDescriptionEn(string $v): self { $this->descriptionEn = $v; return $this; }

    public function getDescriptionAr(): string { return $this->descriptionAr; }
    public function setDescriptionAr(string $v): self { $this->descriptionAr = $v; return $this; }

    public function getDescriptionIt(): string { return $this->descriptionIt; }
    public function setDescriptionIt(string $v): self { $this->descriptionIt = $v; return $this; }

    public function getDurationFr(): ?string { return $this->durationFr; }
    public function setDurationFr(?string $v): self { $this->durationFr = $v; return $this; }

    public function getDurationEn(): ?string { return $this->durationEn; }
    public function setDurationEn(?string $v): self { $this->durationEn = $v; return $this; }

    public function getDurationAr(): ?string { return $this->durationAr; }
    public function setDurationAr(?string $v): self { $this->durationAr = $v; return $this; }

    public function getDurationIt(): ?string { return $this->durationIt; }
    public function setDurationIt(?string $v): self { $this->durationIt = $v; return $this; }

    public function getIcons(): array { return $this->icons; }
    public function setIcons(array $icons): self { $this->icons = $icons; return $this; }

    public function getPosition(): int { return $this->position; }
    public function setPosition(int $position): self { $this->position = $position; return $this; }

    // ==== Locale-aware convenience getters, used directly in Twig ====

    public function getTitle(string $locale): string
    {
        return match ($locale) {
            'fr' => $this->titleFr,
            'ar' => $this->titleAr,
            'it' => $this->titleIt,
            default => $this->titleEn,
        };
    }

    public function getDescription(string $locale): string
    {
        return match ($locale) {
            'fr' => $this->descriptionFr,
            'ar' => $this->descriptionAr,
            'it' => $this->descriptionIt,
            default => $this->descriptionEn,
        };
    }

    public function getDuration(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->durationFr,
            'ar' => $this->durationAr,
            'it' => $this->durationIt,
            default => $this->durationEn,
        };
    }
}
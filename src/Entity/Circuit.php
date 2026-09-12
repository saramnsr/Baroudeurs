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

    /** @ORM\Column(type="string", length=255) */
    private string $image;

    /** @ORM\Column(type="string", length=255) */
    private string $titleFr;
    /** @ORM\Column(type="string", length=255) */
    private string $titleEn;
    /** @ORM\Column(type="string", length=255) */
    private string $titleAr;
    /** @ORM\Column(type="string", length=255) */
    private string $titleIt;

    /** @ORM\Column(type="text") */
    private string $descriptionFr;
    /** @ORM\Column(type="text") */
    private string $descriptionEn;
    /** @ORM\Column(type="text") */
    private string $descriptionAr;
    /** @ORM\Column(type="text") */
    private string $descriptionIt;

    /** @ORM\Column(type="string", length=100, nullable=true) */
    private ?string $durationFr = null;
    /** @ORM\Column(type="string", length=100, nullable=true) */
    private ?string $durationEn = null;
    /** @ORM\Column(type="string", length=100, nullable=true) */
    private ?string $durationAr = null;
    /** @ORM\Column(type="string", length=100, nullable=true) */
    private ?string $durationIt = null;

    /** @ORM\Column(type="json") */
    private array $icons = [];

    /** @ORM\Column(type="integer") */
    private int $position = 0;

    /** @ORM\Column(type="text", nullable=true) */
    private ?string $introFr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $introEn = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $introAr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $introIt = null;

    /** @ORM\Column(type="text", nullable=true) */
    private ?string $fullDescriptionFr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $fullDescriptionEn = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $fullDescriptionAr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $fullDescriptionIt = null;

    /** @ORM\Column(type="text", nullable=true) */
    private ?string $itinerarySummaryFr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $itinerarySummaryEn = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $itinerarySummaryAr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $itinerarySummaryIt = null;

    /** @ORM\Column(type="json") */
    private array $itineraryFr = [];
    /** @ORM\Column(type="json") */
    private array $itineraryEn = [];
    /** @ORM\Column(type="json") */
    private array $itineraryAr = [];
    /** @ORM\Column(type="json") */
    private array $itineraryIt = [];

    /** @ORM\Column(type="json") */
    private array $itineraryDetailFr = [];
    /** @ORM\Column(type="json") */
    private array $itineraryDetailEn = [];
    /** @ORM\Column(type="json") */
    private array $itineraryDetailAr = [];
    /** @ORM\Column(type="json") */
    private array $itineraryDetailIt = [];

    /** @ORM\Column(type="json") */
    private array $includedFr = [];
    /** @ORM\Column(type="json") */
    private array $includedEn = [];
    /** @ORM\Column(type="json") */
    private array $includedAr = [];
    /** @ORM\Column(type="json") */
    private array $includedIt = [];

    /** @ORM\Column(type="json") */
    private array $excludedFr = [];
    /** @ORM\Column(type="json") */
    private array $excludedEn = [];
    /** @ORM\Column(type="json") */
    private array $excludedAr = [];
    /** @ORM\Column(type="json") */
    private array $excludedIt = [];

    /** @ORM\Column(type="json") */
    private array $includedIcons = [];
    /** @ORM\Column(type="json") */
    private array $excludedIcons = [];

    /**
     * Array of ['url' => string, 'title' => string]
     * @ORM\Column(type="json")
     */
    private array $galleryImages = [];

    /** @ORM\Column(type="text", nullable=true) */
    private ?string $closingFr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $closingEn = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $closingAr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $closingIt = null;

    // ==== Sidebar review card ====
    /** @ORM\Column(type="string", length=255, nullable=true) */
    private ?string $reviewAvatar = null;
    /** @ORM\Column(type="string", length=255, nullable=true) */
    private ?string $reviewName = null;
    /** @ORM\Column(type="string", length=255, nullable=true) */
    private ?string $reviewCountry = null;
    /** @ORM\Column(type="integer", nullable=true) */
    private ?int $reviewRating = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $reviewCommentFr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $reviewCommentEn = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $reviewCommentAr = null;
    /** @ORM\Column(type="text", nullable=true) */
    private ?string $reviewCommentIt = null;


    public function getId(): ?int { return $this->id; }

    public function getImage(): string { return $this->image; }
    public function setImage(string $image): self { $this->image = $image; return $this; }

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

    public function getTitle(string $locale): string
    {
        return match ($locale) {
            'fr' => $this->titleFr, 'ar' => $this->titleAr, 'it' => $this->titleIt,
            default => $this->titleEn,
        };
    }

    public function getDescription(string $locale): string
    {
        return match ($locale) {
            'fr' => $this->descriptionFr, 'ar' => $this->descriptionAr, 'it' => $this->descriptionIt,
            default => $this->descriptionEn,
        };
    }

    public function getDuration(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->durationFr, 'ar' => $this->durationAr, 'it' => $this->durationIt,
            default => $this->durationEn,
        };
    }

    public function getIntroFr(): ?string { return $this->introFr; }
    public function setIntroFr(?string $v): self { $this->introFr = $v; return $this; }
    public function getIntroEn(): ?string { return $this->introEn; }
    public function setIntroEn(?string $v): self { $this->introEn = $v; return $this; }
    public function getIntroAr(): ?string { return $this->introAr; }
    public function setIntroAr(?string $v): self { $this->introAr = $v; return $this; }
    public function getIntroIt(): ?string { return $this->introIt; }
    public function setIntroIt(?string $v): self { $this->introIt = $v; return $this; }

    public function getFullDescriptionFr(): ?string { return $this->fullDescriptionFr; }
    public function setFullDescriptionFr(?string $v): self { $this->fullDescriptionFr = $v; return $this; }
    public function getFullDescriptionEn(): ?string { return $this->fullDescriptionEn; }
    public function setFullDescriptionEn(?string $v): self { $this->fullDescriptionEn = $v; return $this; }
    public function getFullDescriptionAr(): ?string { return $this->fullDescriptionAr; }
    public function setFullDescriptionAr(?string $v): self { $this->fullDescriptionAr = $v; return $this; }
    public function getFullDescriptionIt(): ?string { return $this->fullDescriptionIt; }
    public function setFullDescriptionIt(?string $v): self { $this->fullDescriptionIt = $v; return $this; }

    public function getItinerarySummaryFr(): ?string { return $this->itinerarySummaryFr; }
    public function setItinerarySummaryFr(?string $v): self { $this->itinerarySummaryFr = $v; return $this; }
    public function getItinerarySummaryEn(): ?string { return $this->itinerarySummaryEn; }
    public function setItinerarySummaryEn(?string $v): self { $this->itinerarySummaryEn = $v; return $this; }
    public function getItinerarySummaryAr(): ?string { return $this->itinerarySummaryAr; }
    public function setItinerarySummaryAr(?string $v): self { $this->itinerarySummaryAr = $v; return $this; }
    public function getItinerarySummaryIt(): ?string { return $this->itinerarySummaryIt; }
    public function setItinerarySummaryIt(?string $v): self { $this->itinerarySummaryIt = $v; return $this; }

    public function getItineraryFr(): array { return $this->itineraryFr; }
    public function setItineraryFr(array $v): self { $this->itineraryFr = $v; return $this; }
    public function getItineraryEn(): array { return $this->itineraryEn; }
    public function setItineraryEn(array $v): self { $this->itineraryEn = $v; return $this; }
    public function getItineraryAr(): array { return $this->itineraryAr; }
    public function setItineraryAr(array $v): self { $this->itineraryAr = $v; return $this; }
    public function getItineraryIt(): array { return $this->itineraryIt; }
    public function setItineraryIt(array $v): self { $this->itineraryIt = $v; return $this; }

    public function getItineraryDetailFr(): array { return $this->itineraryDetailFr; }
    public function setItineraryDetailFr(array $v): self { $this->itineraryDetailFr = $v; return $this; }
    public function getItineraryDetailEn(): array { return $this->itineraryDetailEn; }
    public function setItineraryDetailEn(array $v): self { $this->itineraryDetailEn = $v; return $this; }
    public function getItineraryDetailAr(): array { return $this->itineraryDetailAr; }
    public function setItineraryDetailAr(array $v): self { $this->itineraryDetailAr = $v; return $this; }
    public function getItineraryDetailIt(): array { return $this->itineraryDetailIt; }
    public function setItineraryDetailIt(array $v): self { $this->itineraryDetailIt = $v; return $this; }

    public function getIncludedFr(): array { return $this->includedFr; }
    public function setIncludedFr(array $v): self { $this->includedFr = $v; return $this; }
    public function getIncludedEn(): array { return $this->includedEn; }
    public function setIncludedEn(array $v): self { $this->includedEn = $v; return $this; }
    public function getIncludedAr(): array { return $this->includedAr; }
    public function setIncludedAr(array $v): self { $this->includedAr = $v; return $this; }
    public function getIncludedIt(): array { return $this->includedIt; }
    public function setIncludedIt(array $v): self { $this->includedIt = $v; return $this; }

    public function getExcludedFr(): array { return $this->excludedFr; }
    public function setExcludedFr(array $v): self { $this->excludedFr = $v; return $this; }
    public function getExcludedEn(): array { return $this->excludedEn; }
    public function setExcludedEn(array $v): self { $this->excludedEn = $v; return $this; }
    public function getExcludedAr(): array { return $this->excludedAr; }
    public function setExcludedAr(array $v): self { $this->excludedAr = $v; return $this; }
    public function getExcludedIt(): array { return $this->excludedIt; }
    public function setExcludedIt(array $v): self { $this->excludedIt = $v; return $this; }

    public function getIncludedIcons(): array { return $this->includedIcons; }
    public function setIncludedIcons(array $v): self { $this->includedIcons = $v; return $this; }
    public function getExcludedIcons(): array { return $this->excludedIcons; }
    public function setExcludedIcons(array $v): self { $this->excludedIcons = $v; return $this; }

    public function getGalleryImages(): array { return $this->galleryImages; }
    public function setGalleryImages(array $v): self { $this->galleryImages = $v; return $this; }

    public function getClosingFr(): ?string { return $this->closingFr; }
    public function setClosingFr(?string $v): self { $this->closingFr = $v; return $this; }
    public function getClosingEn(): ?string { return $this->closingEn; }
    public function setClosingEn(?string $v): self { $this->closingEn = $v; return $this; }
    public function getClosingAr(): ?string { return $this->closingAr; }
    public function setClosingAr(?string $v): self { $this->closingAr = $v; return $this; }
    public function getClosingIt(): ?string { return $this->closingIt; }
    public function setClosingIt(?string $v): self { $this->closingIt = $v; return $this; }

    public function getReviewAvatar(): ?string { return $this->reviewAvatar; }
    public function setReviewAvatar(?string $v): self { $this->reviewAvatar = $v; return $this; }
    public function getReviewName(): ?string { return $this->reviewName; }
    public function setReviewName(?string $v): self { $this->reviewName = $v; return $this; }
    public function getReviewCountry(): ?string { return $this->reviewCountry; }
    public function setReviewCountry(?string $v): self { $this->reviewCountry = $v; return $this; }
    public function getReviewRating(): ?int { return $this->reviewRating; }
    public function setReviewRating(?int $v): self { $this->reviewRating = $v; return $this; }
    public function getReviewCommentFr(): ?string { return $this->reviewCommentFr; }
    public function setReviewCommentFr(?string $v): self { $this->reviewCommentFr = $v; return $this; }
    public function getReviewCommentEn(): ?string { return $this->reviewCommentEn; }
    public function setReviewCommentEn(?string $v): self { $this->reviewCommentEn = $v; return $this; }
    public function getReviewCommentAr(): ?string { return $this->reviewCommentAr; }
    public function setReviewCommentAr(?string $v): self { $this->reviewCommentAr = $v; return $this; }
    public function getReviewCommentIt(): ?string { return $this->reviewCommentIt; }
    public function setReviewCommentIt(?string $v): self { $this->reviewCommentIt = $v; return $this; }

    public function getReviewComment(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->reviewCommentFr, 'ar' => $this->reviewCommentAr, 'it' => $this->reviewCommentIt,
            default => $this->reviewCommentEn,
        };
    }

    public function getIntro(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->introFr, 'ar' => $this->introAr, 'it' => $this->introIt,
            default => $this->introEn,
        };
    }
    public function getFullDescription(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->fullDescriptionFr, 'ar' => $this->fullDescriptionAr, 'it' => $this->fullDescriptionIt,
            default => $this->fullDescriptionEn,
        };
    }
    public function getItinerarySummary(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->itinerarySummaryFr, 'ar' => $this->itinerarySummaryAr, 'it' => $this->itinerarySummaryIt,
            default => $this->itinerarySummaryEn,
        };
    }
    public function getItinerary(string $locale): array
    {
        return match ($locale) {
            'fr' => $this->itineraryFr, 'ar' => $this->itineraryAr, 'it' => $this->itineraryIt,
            default => $this->itineraryEn,
        };
    }
    public function getItineraryDetail(string $locale): array
    {
        return match ($locale) {
            'fr' => $this->itineraryDetailFr, 'ar' => $this->itineraryDetailAr, 'it' => $this->itineraryDetailIt,
            default => $this->itineraryDetailEn,
        };
    }
    public function getIncluded(string $locale): array
    {
        return match ($locale) {
            'fr' => $this->includedFr, 'ar' => $this->includedAr, 'it' => $this->includedIt,
            default => $this->includedEn,
        };
    }
    public function getExcluded(string $locale): array
    {
        return match ($locale) {
            'fr' => $this->excludedFr, 'ar' => $this->excludedAr, 'it' => $this->excludedIt,
            default => $this->excludedEn,
        };
    }
    public function getClosing(string $locale): ?string
    {
        return match ($locale) {
            'fr' => $this->closingFr, 'ar' => $this->closingAr, 'it' => $this->closingIt,
            default => $this->closingEn,
        };
    }
}
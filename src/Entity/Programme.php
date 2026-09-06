<?php

namespace App\Entity;

use App\Repository\ProgrammeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProgrammeRepository::class)
 */
class Programme
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Enter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleAr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleEn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleIt;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionFr;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionEn;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionAr;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionIt;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dureeFr;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dureeEn;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dureeAr;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dureeIt;

            /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $price;


     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescriptionFr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescriptionEn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescriptionAr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescriptionIt;



        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $destination;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $durationDays;



    

        /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $includedFr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $includedEn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $includedAr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $includedIt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $excludedFr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $excludedEn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $excludedAr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $excludedIt;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $images = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getEnter(): ?string
    {
        return $this->Enter;
    }

    public function setEnter(string $Enter): self
    {
        $this->Enter = $Enter;

        return $this;
    }

    public function getTitleFr(): ?string
    {
        return $this->titleFr;
    }

    public function setTitleFr(string $titleFr): self
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    public function getTitleAr(): ?string
    {
        return $this->titleAr;
    }

    public function setTitleAr(string $titleAr): self
    {
        $this->titleAr = $titleAr;

        return $this;
    }

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(string $titleEn): self
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    public function getTitleIt(): ?string
    {
        return $this->titleIt;
    }

    public function setTitleIt(string $titleIt): self
    {
        $this->titleIt = $titleIt;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getDescriptionAr(): ?string
    {
        return $this->descriptionAr;
    }

    public function setDescriptionAr(string $descriptionAr): self
    {
        $this->descriptionAr = $descriptionAr;

        return $this;
    }

    public function getDescriptionIt(): ?string
    {
        return $this->descriptionIt;
    }

    public function setDescriptionIt(string $descriptionIt): self
    {
        $this->descriptionIt = $descriptionIt;

        return $this;
    }

    public function getDureeFr(): ?string
    {
        return $this->dureeFr;
    }

    public function setDureeFr(string $dureeFr): self
    {
        $this->dureeFr = $dureeFr;

        return $this;
    }

    public function getDureeEn(): ?string
    {
        return $this->dureeEn;
    }

    public function setDureeEn(string $dureeEn): self
    {
        $this->dureeEn = $dureeEn;

        return $this;
    }

    public function getDureeAr(): ?string
    {
        return $this->dureeAr;
    }

    public function setDureeAr(string $dureeAr): self
    {
        $this->dureeAr = $dureeAr;

        return $this;
    }

    public function getDureeIt(): ?string
    {
        return $this->dureeIt;
    }

    public function setDureeIt(string $dureeIt): self
    {
        $this->dureeIt = $dureeIt;

        return $this;
    }


    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }



        public function getShortDescriptionFr(): ?string
    {
        return $this->shortDescriptionFr;
    }

    public function setShortDescriptionFr(?string $shortDescriptionFr): self
    {
        $this->shortDescriptionFr = $shortDescriptionFr;

        return $this;
    }

    public function getShortDescriptionEn(): ?string
    {
        return $this->shortDescriptionEn;
    }

    public function setShortDescriptionEn(?string $shortDescriptionEn): self
    {
        $this->shortDescriptionEn = $shortDescriptionEn;

        return $this;
    }

    public function getShortDescriptionAr(): ?string
    {
        return $this->shortDescriptionAr;
    }

    public function setShortDescriptionAr(?string $shortDescriptionAr): self
    {
        $this->shortDescriptionAr = $shortDescriptionAr;

        return $this;
    }

    public function getShortDescriptionIt(): ?string
    {
        return $this->shortDescriptionIt;
    }

    public function setShortDescriptionIt(?string $shortDescriptionIt): self
    {
        $this->shortDescriptionIt = $shortDescriptionIt;

        return $this;
    }



        public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getDurationDays(): ?int
    {
        return $this->durationDays;
    }

    public function setDurationDays(?int $durationDays): self
    {
        $this->durationDays = $durationDays;
        return $this;
    }




    public function getIncludedFr(): ?string
    {
        return $this->includedFr;
    }

    public function setIncludedFr(?string $includedFr): self
    {
        $this->includedFr = $includedFr;
        return $this;
    }

    public function getIncludedEn(): ?string
    {
        return $this->includedEn;
    }

    public function setIncludedEn(?string $includedEn): self
    {
        $this->includedEn = $includedEn;
        return $this;
    }

    public function getIncludedAr(): ?string
    {
        return $this->includedAr;
    }

    public function setIncludedAr(?string $includedAr): self
    {
        $this->includedAr = $includedAr;
        return $this;
    }

    public function getIncludedIt(): ?string
    {
        return $this->includedIt;
    }

    public function setIncludedIt(?string $includedIt): self
    {
        $this->includedIt = $includedIt;
        return $this;
    }

    public function getExcludedFr(): ?string
    {
        return $this->excludedFr;
    }

    public function setExcludedFr(?string $excludedFr): self
    {
        $this->excludedFr = $excludedFr;
        return $this;
    }

    public function getExcludedEn(): ?string
    {
        return $this->excludedEn;
    }

    public function setExcludedEn(?string $excludedEn): self
    {
        $this->excludedEn = $excludedEn;
        return $this;
    }

    public function getExcludedAr(): ?string
    {
        return $this->excludedAr;
    }

    public function setExcludedAr(?string $excludedAr): self
    {
        $this->excludedAr = $excludedAr;
        return $this;
    }

    public function getExcludedIt(): ?string
    {
        return $this->excludedIt;
    }

    public function setExcludedIt(?string $excludedIt): self
    {
        $this->excludedIt = $excludedIt;
        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): self
    {
        $this->images = $images;
        return $this;
    }
}

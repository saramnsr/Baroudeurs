<?php

namespace App\Entity;

use App\Repository\TestimonialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestimonialRepository::class)
 */
class Testimonial
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
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentFr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentEn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentAr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentIt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $videoFilename;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    public function getCommentFr(): ?string
    {
        return $this->commentFr;
    }

    public function setCommentFr(?string $commentFr): self
    {
        $this->commentFr = $commentFr;
        return $this;
    }

    public function getCommentEn(): ?string
    {
        return $this->commentEn;
    }

    public function setCommentEn(?string $commentEn): self
    {
        $this->commentEn = $commentEn;
        return $this;
    }

    public function getCommentAr(): ?string
    {
        return $this->commentAr;
    }

    public function setCommentAr(?string $commentAr): self
    {
        $this->commentAr = $commentAr;
        return $this;
    }

    public function getCommentIt(): ?string
    {
        return $this->commentIt;
    }

    public function setCommentIt(?string $commentIt): self
    {
        $this->commentIt = $commentIt;
        return $this;
    }

    public function getVideoFilename(): ?string
    {
        return $this->videoFilename;
    }

    public function setVideoFilename(?string $videoFilename): self
    {
        $this->videoFilename = $videoFilename;
        return $this;
    }
}
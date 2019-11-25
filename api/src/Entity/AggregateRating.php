<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * The average rating based on multiple ratings or reviews.
 *
 * @see http://schema.org/AggregateRating Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/AggregateRating")
 */
class AggregateRating
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Thing|null the item that is being reviewed/rated
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/itemReviewed")
     */
    private $itemReviewed;

    /**
     * @var int|null the count of total number of ratings
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/ratingCount")
     */
    private $ratingCount;

    /**
     * @var int|null the count of total number of reviews
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/reviewCount")
     */
    private $reviewCount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setItemReviewed(?Thing $itemReviewed): void
    {
        $this->itemReviewed = $itemReviewed;
    }

    public function getItemReviewed(): ?Thing
    {
        return $this->itemReviewed;
    }

    public function setRatingCount(?int $ratingCount): void
    {
        $this->ratingCount = $ratingCount;
    }

    public function getRatingCount(): ?int
    {
        return $this->ratingCount;
    }

    public function setReviewCount(?int $reviewCount): void
    {
        $this->reviewCount = $reviewCount;
    }

    public function getReviewCount(): ?int
    {
        return $this->reviewCount;
    }
}

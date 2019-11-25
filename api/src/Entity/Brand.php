<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A brand is a name used by an organization or business person for labeling a product, product group, or similar.
 *
 * @see http://schema.org/Brand Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/Brand")
 */
class Brand
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
     * @var AggregateRating|null the overall rating, based on a collection of reviews or ratings, of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\AggregateRating")
     * @ApiProperty(iri="http://schema.org/aggregateRating")
     */
    private $aggregateRating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAggregateRating(?AggregateRating $aggregateRating): void
    {
        $this->aggregateRating = $aggregateRating;
    }

    public function getAggregateRating(): ?AggregateRating
    {
        return $this->aggregateRating;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A rating is an evaluation on a numeric scale, such as 1 to 5 stars.
 *
 * @see http://schema.org/Rating Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/Rating")
 */
class Rating
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
     * @var Person|null The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/author")
     */
    private $author;

    /**
     * @var float|null the rating for the content
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/ratingValue")
     */
    private $ratingValue;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull
     */
    private $ratingExplanation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAuthor(?Person $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): ?Person
    {
        return $this->author;
    }

    /**
     * @param float|null $ratingValue
     */
    public function setRatingValue($ratingValue): void
    {
        $this->ratingValue = $ratingValue;
    }

    /**
     * @return float|null
     */
    public function getRatingValue()
    {
        return $this->ratingValue;
    }

    public function setRatingExplanation(string $ratingExplanation): void
    {
        $this->ratingExplanation = $ratingExplanation;
    }

    public function getRatingExplanation(): string
    {
        return $this->ratingExplanation;
    }
}

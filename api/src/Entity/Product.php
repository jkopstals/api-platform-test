<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Any offered product or service. For example: a pair of shoes; a concert ticket; the rental of a car; a haircut; or an episode of a TV show streamed online.
 *
 * @see http://schema.org/Product Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/Product")
 */
class Product
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

    /**
     * @var Collection<Brand>|null the brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Brand")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/brand")
     */
    private $brands;

    /**
     * @var string|null The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/model")
     */
    private $model;

    /**
     * @var string[]|null The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/sku")
     */
    private $skus;

    /**
     * @var string|null the color of the product
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/color")
     */
    private $color;

    /**
     * @var QuantitativeValue|null the depth of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/depth")
     */
    private $depth;

    /**
     * @var QuantitativeValue|null the height of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/height")
     */
    private $height;

    /**
     * @var QuantitativeValue|null the width of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/width")
     */
    private $width;

    /**
     * @var QuantitativeValue|null the weight of the product or person
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/weight")
     */
    private $weight;

    /**
     * @var \DateTimeInterface|null The release date of a product or product model. This can be used to distinguish the exact variant of a product.
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/releaseDate")
     * @Assert\Date
     */
    private $releaseDate;

    /**
     * @var Collection<Product>|null a pointer to another, functionally similar product (or multiple products)
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Product")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/isSimilarTo")
     */
    private $isSimilarTos;

    /**
     * @var Collection<Offer>|null an offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Offer")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/offers")
     */
    private $offers;

    public function __construct()
    {
        $this->brands = new ArrayCollection();
        $this->skus = new ArrayCollection();
        $this->isSimilarTos = new ArrayCollection();
        $this->offers = new ArrayCollection();
    }

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

    public function addBrand(Brand $brand): void
    {
        $this->brands[] = $brand;
    }

    public function removeBrand(Brand $brand): void
    {
        $this->brands->removeElement($brand);
    }

    public function getBrands(): Collection
    {
        return $this->brands;
    }

    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function addSkus(string $skus): void
    {
        $this->skus[] = $skus;
    }

    public function removeSkus(string $skus): void
    {
        $this->skus->removeElement($skus);
    }

    public function getSkus(): Collection
    {
        return $this->skus;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setDepth(?QuantitativeValue $depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): ?QuantitativeValue
    {
        return $this->depth;
    }

    public function setHeight(?QuantitativeValue $height): void
    {
        $this->height = $height;
    }

    public function getHeight(): ?QuantitativeValue
    {
        return $this->height;
    }

    public function setWidth(?QuantitativeValue $width): void
    {
        $this->width = $width;
    }

    public function getWidth(): ?QuantitativeValue
    {
        return $this->width;
    }

    public function setWeight(?QuantitativeValue $weight): void
    {
        $this->weight = $weight;
    }

    public function getWeight(): ?QuantitativeValue
    {
        return $this->weight;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function addIsSimilarTo(Product $isSimilarTo): void
    {
        $this->isSimilarTos[] = $isSimilarTo;
    }

    public function removeIsSimilarTo(Product $isSimilarTo): void
    {
        $this->isSimilarTos->removeElement($isSimilarTo);
    }

    public function getIsSimilarTos(): Collection
    {
        return $this->isSimilarTos;
    }

    public function addOffer(Offer $offer): void
    {
        $this->offers[] = $offer;
    }

    public function removeOffer(Offer $offer): void
    {
        $this->offers->removeElement($offer);
    }

    public function getOffers(): Collection
    {
        return $this->offers;
    }
}

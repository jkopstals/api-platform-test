<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A point value or interval for product characteristics and other purposes.
 *
 * @see http://schema.org/QuantitativeValue Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/QuantitativeValue")
 */
class QuantitativeValue
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
     * @var float|null The value of the quantitative value or property value node.\\n\\n\* For \[\[QuantitativeValue\]\] and \[\[MonetaryAmount\]\], the recommended type for values is 'Number'.\\n\* For \[\[PropertyValue\]\], it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/value")
     */
    private $value;

    /**
     * @var string The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     *
     * @ORM\Column(type="text")
     * @ApiProperty(iri="http://schema.org/unitCode")
     * @Assert\NotNull
     */
    private $unitCode;

    /**
     * @var string|null A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for [unitCode](unitCode).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/unitText")
     */
    private $unitText;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param float|null $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return float|null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setUnitCode(string $unitCode): void
    {
        $this->unitCode = $unitCode;
    }

    public function getUnitCode(): string
    {
        return $this->unitCode;
    }

    public function setUnitText(?string $unitText): void
    {
        $this->unitText = $unitText;
    }

    public function getUnitText(): ?string
    {
        return $this->unitText;
    }
}

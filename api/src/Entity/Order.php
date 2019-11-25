<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An order is a confirmation of a transaction (a receipt), which can contain multiple line items, each represented by an Offer that has been accepted by the customer.
 *
 * @see http://schema.org/Order Documentation on Schema.org
 *
 * @ORM\Entity
 * ApiResource(iri="http://schema.org/Order")
 */
class Order
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
     * @var Person|null party placing the order or paying the invoice
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/customer")
     */
    private $customer;

    /**
     * @var Product|null the item ordered
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Product")
     * @ApiProperty(iri="http://schema.org/orderedItem")
     */
    private $orderedItem;

    /**
     * @var \DateTimeInterface|null date order was placed
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/orderDate")
     * @Assert\DateTime
     */
    private $orderDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setCustomer(?Person $customer): void
    {
        $this->customer = $customer;
    }

    public function getCustomer(): ?Person
    {
        return $this->customer;
    }

    public function setOrderedItem(?Product $orderedItem): void
    {
        $this->orderedItem = $orderedItem;
    }

    public function getOrderedItem(): ?Product
    {
        return $this->orderedItem;
    }

    public function setOrderDate(?\DateTimeInterface $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }
}

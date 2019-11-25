<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $legal_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_addr;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $reg_no;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vat_reg_no;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $bank;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $swift;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $account_no;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $invoice_street;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $invoice_postal_code;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $invoice_city;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $invoice_country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegalName(): ?string
    {
        return $this->legal_name;
    }

    public function setLegalName(string $legal_name): self
    {
        $this->legal_name = $legal_name;

        return $this;
    }

    public function getLegalAddr(): ?string
    {
        return $this->legal_addr;
    }

    public function setLegalAddr(?string $legal_addr): self
    {
        $this->legal_addr = $legal_addr;

        return $this;
    }

    public function getRegNo(): ?string
    {
        return $this->reg_no;
    }

    public function setRegNo(?string $reg_no): self
    {
        $this->reg_no = $reg_no;

        return $this;
    }

    public function getVatRegNo(): ?string
    {
        return $this->vat_reg_no;
    }

    public function setVatRegNo(?string $vat_reg_no): self
    {
        $this->vat_reg_no = $vat_reg_no;

        return $this;
    }

    public function getBank(): ?string
    {
        return $this->bank;
    }

    public function setBank(?string $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

    public function getSwift(): ?string
    {
        return $this->swift;
    }

    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    public function getAccountNo(): ?string
    {
        return $this->account_no;
    }

    public function setAccountNo(?string $account_no): self
    {
        $this->account_no = $account_no;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getInvoiceStreet(): ?string
    {
        return $this->invoice_street;
    }

    public function setInvoiceStreet(?string $invoice_street): self
    {
        $this->invoice_street = $invoice_street;

        return $this;
    }

    public function getInvoicePostalCode(): ?string
    {
        return $this->invoice_postal_code;
    }

    public function setInvoicePostalCode(?string $invoice_postal_code): self
    {
        $this->invoice_postal_code = $invoice_postal_code;

        return $this;
    }

    public function getInvoiceCity(): ?string
    {
        return $this->invoice_city;
    }

    public function setInvoiceCity(?string $invoice_city): self
    {
        $this->invoice_city = $invoice_city;

        return $this;
    }

    public function getInvoiceCountry(): ?string
    {
        return $this->invoice_country;
    }

    public function setInvoiceCountry(?string $invoice_country): self
    {
        $this->invoice_country = $invoice_country;

        return $this;
    }
}

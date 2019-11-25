<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gps_lat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gps_lon;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $working_from;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $working_till;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $on_weekends;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $machines;

    /**
     * @ORM\Column(type="integer")
     */
    private $client_id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $refiller;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $technician;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $manager;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $encashment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supervisor_1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supervisor_2;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $refill_time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $encashment_time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maintenance_time;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getGpsLat(): ?float
    {
        return $this->gps_lat;
    }

    public function setGpsLat(?float $gps_lat): self
    {
        $this->gps_lat = $gps_lat;

        return $this;
    }

    public function getGpsLon(): ?float
    {
        return $this->gps_lon;
    }

    public function setGpsLon(?float $gps_lon): self
    {
        $this->gps_lon = $gps_lon;

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

    public function getWorkingFrom(): ?string
    {
        return $this->working_from;
    }

    public function setWorkingFrom(?string $working_from): self
    {
        $this->working_from = $working_from;

        return $this;
    }

    public function getWorkingTill(): ?string
    {
        return $this->working_till;
    }

    public function setWorkingTill(?string $working_till): self
    {
        $this->working_till = $working_till;

        return $this;
    }

    public function getOnWeekends(): ?string
    {
        return $this->on_weekends;
    }

    public function setOnWeekends(?string $on_weekends): self
    {
        $this->on_weekends = $on_weekends;

        return $this;
    }

    public function getMachines(): ?int
    {
        return $this->machines;
    }

    public function setMachines(?int $machines): self
    {
        $this->machines = $machines;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getRefiller(): ?int
    {
        return $this->refiller;
    }

    public function setRefiller(?int $refiller): self
    {
        $this->refiller = $refiller;

        return $this;
    }

    public function getTechnician(): ?int
    {
        return $this->technician;
    }

    public function setTechnician(?int $technician): self
    {
        $this->technician = $technician;

        return $this;
    }

    public function getManager(): ?int
    {
        return $this->manager;
    }

    public function setManager(?int $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getEncashment(): ?int
    {
        return $this->encashment;
    }

    public function setEncashment(?int $encashment): self
    {
        $this->encashment = $encashment;

        return $this;
    }

    public function getSupervisor1(): ?int
    {
        return $this->supervisor_1;
    }

    public function setSupervisor1(?int $supervisor_1): self
    {
        $this->supervisor_1 = $supervisor_1;

        return $this;
    }

    public function getSupervisor2(): ?int
    {
        return $this->supervisor_2;
    }

    public function setSupervisor2(?int $supervisor_2): self
    {
        $this->supervisor_2 = $supervisor_2;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRefillTime(): ?int
    {
        return $this->refill_time;
    }

    public function setRefillTime(?int $refill_time): self
    {
        $this->refill_time = $refill_time;

        return $this;
    }

    public function getEncashmentTime(): ?int
    {
        return $this->encashment_time;
    }

    public function setEncashmentTime(?int $encashment_time): self
    {
        $this->encashment_time = $encashment_time;

        return $this;
    }

    public function getMaintenanceTime(): ?int
    {
        return $this->maintenance_time;
    }

    public function setMaintenanceTime(?int $maintenance_time): self
    {
        $this->maintenance_time = $maintenance_time;

        return $this;
    }
}

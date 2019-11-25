<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Location;
use Doctrine\Common\Persistence\ObjectManager;

class TestFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        /*
        $this->createMany(Client::class, 10, function(Client $client, $count) {
            $client->setLegalName($this->faker->company)
                ->setLegalAddr($this->faker->address)
                ->setRegNo($this->faker->numberBetween(10000000000, 99999999999))
                ->setVatRegNo($this->faker->numberBetween(10000000000, 99999999999))
                ->setBank($this->faker->company. ' Bank')
                ->setSwift($this->faker->swiftBicNumber)
                ->setAccountNo($this->faker->bankAccountNumber)
                ->setEmail($this->faker->safeEmail)
                ->setTelephone($this->faker->phoneNumber)
                ->setFax($this->faker->phoneNumber)
                ->setWebsite($this->faker->safeEmailDomain)
                ->setInvoiceStreet($this->faker->streetAddress)
                ->setInvoicePostalCode($this->faker->postcode)
                ->setInvoiceCity($this->faker->city)
                ->setInvoiceCountry($this->faker->countryCode);
        });
        */
        $this->createMany(Location::class, 10, function(Location $location, $count) {
            [$lat, $lon] = $this->randomGpsLatLon();
            $location->setName($this->faker->streetName)
                ->setAddress($this->faker->address)
                ->setGpsLat($lat)
                ->setGpsLon($lon)
                ->setType($this->faker->randomElement(self::$location_types))
                ->setWorkingFrom($this->faker->randomElement(['07:00', '08:00', '09:00', '10:00', '11:00', '12:00']))
                ->setWorkingTill($this->faker->randomElement(['16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00']))
                ->setOnWeekends($this->faker->randomElement(['no','saturday','sunday']))
                ->setMachines($this->faker->numberBetween(0, 10))
                ->setClientId($this->faker->numberBetween(1,10))
                ->setReference($this->faker->creditCardNumber)
                ->setRefiller($this->faker->numberBetween(1, 10))
                ->setTechnician($this->faker->numberBetween(1, 10))
                ->setManager($this->faker->numberBetween(1, 10))
                ->setEncashment($this->faker->numberBetween(1, 10))
                ->setSupervisor1($this->faker->numberBetween(1, 10))
                ->setSupervisor2($this->faker->numberBetween(1, 10))
                ->setPhone($this->faker->phoneNumber)
                ->setFax($this->faker->phoneNumber)
                ->setEmail($this->faker->safeEmail)
                ->setRefillTime($this->faker->numberBetween(1,5))
                ->setEncashmentTime($this->faker->numberBetween(1,5))
                ->setMaintenanceTime($this->faker->numberBetween(1,5));
        });


        $manager->flush();
    }
}

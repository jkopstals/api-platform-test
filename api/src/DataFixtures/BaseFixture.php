<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

abstract class BaseFixture extends Fixture
{
    private $manager;

    protected $faker;

    protected $countryGpsBounds = [
        'CA' => [-140.99778, 41.6751050889, -52.6480987209, 83.23324],
        'US' => [-171.791110603, 18.91619, -66.96466, 71.3577635769],
        'GB' => [-7.57216793459, 49.959999905, 1.68153079591, 58.6350001085],
        'DE' => [5.98865807458, 47.3024876979, 15.0169958839, 54.983104153],
    ];

    const TYPE_AIRPORT = 'airport';
    const TYPE_HOTEL = 'hotel';
    const TYPE_BUS_STATION = 'bus_station';
    const TYPE_TRAIN_STATION = 'train_station';
    const TYPE_SUBWAY = 'subway';
    const TYPE_SCHOOL = 'school';
    const TYPE_UNIVERSITY = 'university';
    const TYPE_OFFICE = 'office';
    const TYPE_HOSPITAL = 'hospital';
    const TYPE_MANUFACTURING_PLANT = 'manufacturing_plant';
    const TYPE_WAREHOUSE = 'warehouse';
    const TYPE_WHOLESALE_SUPPLIER = 'wholesale_supplier';
    const TYPE_CONSTRUCTION_SITE = 'construction_site';
    const TYPE_CAR_REPAIR_SHOP = 'car_repair_shop';
    const TYPE_GAS_STATION = 'gas_station';
    const TYPE_CHURCH = 'church';
    const TYPE_SUPERMARKET = 'supermarket';
    const TYPE_DEPARTMENT_STORE = 'department_store';
    const TYPE_MINIMARKET = 'minimarket';
    const TYPE_CIRCUS = 'circus';
    const TYPE_CINEMA = 'cinema';
    const TYPE_ZOO = 'zoo';
    const TYPE_PUBLIC_POOL = 'public_pool';
    const TYPE_FERRY = 'ferry';
    const TYPE_OTHER = 'other';

    public static $location_types = [
        self::TYPE_AIRPORT,
        self::TYPE_HOTEL,
        self::TYPE_BUS_STATION,
        self::TYPE_TRAIN_STATION,
        self::TYPE_SUBWAY,
        self::TYPE_SCHOOL,
        self::TYPE_UNIVERSITY,
        self::TYPE_OFFICE,
        self::TYPE_HOSPITAL,
        self::TYPE_MANUFACTURING_PLANT,
        self::TYPE_WAREHOUSE,
        self::TYPE_WHOLESALE_SUPPLIER,
        self::TYPE_CONSTRUCTION_SITE,
        self::TYPE_CAR_REPAIR_SHOP,
        self::TYPE_GAS_STATION,
        self::TYPE_CHURCH,
        self::TYPE_SUPERMARKET,
        self::TYPE_DEPARTMENT_STORE,
        self::TYPE_MINIMARKET,
        self::TYPE_CIRCUS,
        self::TYPE_CINEMA,
        self::TYPE_ZOO,
        self::TYPE_PUBLIC_POOL,
        self::TYPE_FERRY,
        self::TYPE_OTHER
    ];

    //lonmin, latmin, lonmax, latmax

    abstract protected function loadData(ObjectManager $manager);

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker   = Factory::create();

        $this->loadData($manager);
    }

    protected function createMany(string $className, int $count, callable $factory): void
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);

            $this->manager->persist($entity);
            $this->addReference($className . '_' . $i, $entity);
        }
    }

    protected function randomGpsLatLon()
    {
        $rand_country_index = rand(0, count($this->countryGpsBounds) - 1);
        $rand_country_code  = array_keys($this->countryGpsBounds)[$rand_country_index];

        $lat = $this->faker->numberBetween($this->countryGpsBounds[$rand_country_code][1], $this->countryGpsBounds[$rand_country_code][3]);
        $lon = $this->faker->numberBetween($this->countryGpsBounds[$rand_country_code][0], $this->countryGpsBounds[$rand_country_code][2]);

        return [$lat, $lon];
    }
}

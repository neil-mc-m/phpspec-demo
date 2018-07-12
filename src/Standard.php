<?php

namespace App;

use App\Exception\IncorrectCostException;

class Standard implements AdvertInterface
{
    /** @var string */
    private $name = 'Standard';

    /** @var int */
    private $cost;

    /** @var array */
    private $features = array(
        '2 week listing',
        '2 photos',
        '1 hr free support',
        '20 x 300 branded logo',
        'free image storage'
    );

    /**
     * @param Cost $cost
     */
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     * @throws IncorrectCostException
     */
    public function getCost()
    {
        $this->cost->getCost();

        return $this->cost->getCost();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }
}

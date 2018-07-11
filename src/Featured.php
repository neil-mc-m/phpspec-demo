<?php

namespace App;

class Featured implements AdvertInterface
{
    /** @var \App\AdvertInterface */
    private $advert;

    /** @var string */
    private $name = 'Featured';

    /** @var array */
    private $features = array(
        '24 hr support from our specialist staff'
    );

    /**
     * @param \App\AdvertInterface $advert
     */
    public function __construct(AdvertInterface $advert)
    {
    	$this->advert = $advert;
    }

    /**
     * @return float|int
     */
    public function getCost()
    {
    	return $this->advert->getCost()*2; 
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
        $standard = $this->advert->getFeatures();
        $featured = array_merge($standard, $this->features);

        return $featured;
    }
}

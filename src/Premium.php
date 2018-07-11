<?php

namespace App;

class Premium implements AdvertInterface
{
    /** @var \App\AdvertInterface */
    private $advert;

    /** @var string */
    private $name = 'Premium';

    /** @var array */
    private $features = array(
        'top spot for 1 month',
        'guaranteed 10000 viewings per month'
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
        $premium = array_merge($standard, $this->features);

        return $premium;
        
    }
}

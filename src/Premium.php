<?php

namespace App;
use App\AdvertInterface;

class Premium implements AdvertInterface
{
	private $advert;
	private $name = 'Premium';
	private $features = array(
        'top spot for 1 month',
        'guaranteed 10000 viewings per month'
    );
    
    public function __construct(AdvertInterface $advert)
    {
        $this->advert = $advert;
    }

    public function getCost()
    {
        return $this->advert->getCost()*2;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getFeatures()
    {
        $standard = $this->advert->getFeatures();
        $premium = array_merge($standard, $this->features);
        return $premium;
        
    }
}

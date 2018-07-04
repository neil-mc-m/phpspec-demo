<?php

namespace App;
use App\AdvertInterface;

class Featured implements AdvertInterface
{
	private $advert;
	private $name = 'Featured';
	private $features = array(
        'extra support from our specialist staff'
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
        $featured = array_merge($standard, $this->features);
        return $featured;
    }
}

<?php

namespace App;

use App\EntityManagerInterface;

class Standard implements AdvertInterface
{
	private $name = 'Standard';
	private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getCost()
    {
        return $this->em->getCost();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFeatures()
    {
        return array(
            '2 week listing',
            '2 photos'
        );
    }
}

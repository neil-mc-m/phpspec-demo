<?php

namespace App;

class EntityManager implements EntityManagerInterface
{
	private $cost = 10;

    public function getCost()
    {
        return $this->cost;
    }

}

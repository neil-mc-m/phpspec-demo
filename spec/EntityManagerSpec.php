<?php

namespace spec\App;

use App\EntityManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntityManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EntityManager::class);
    }
    function it_should_implement_the_entitymanager_interface()
    {
    	$this->shouldImplement('App\EntityManagerInterface');
    }
    function it_should_return_the_base_cost()
    {
    	$this->getCost()->shouldBe(10);
    }
    
}

<?php

namespace spec\App;

use App\Standard;
use App\AdvertInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\EntityManagerInterface;

class StandardSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(Standard::class);
    }

   
    function let(EntityManagerInterface $em)
    {
    	$this->beConstructedWith($em);
    }

    function it_should_implement_the_advert_interface()
    {
    	$this->shouldImplement('App\AdvertInterface');
    }


    function it_should_return_its_cost($em)
    {
        $em->getCost()->willReturn(10);
    	$this->getCost()->shouldBe(10);
    }

    function it_should_return_its_advert_type()
    {
    	$this->getName()->shouldBe('Standard');
    }

    function it_should_list_its_own_features()
    {
        $this->getFeatures()->shouldBe(array(
            '2 week listing',
            '2 photos'
        ));
    }
}

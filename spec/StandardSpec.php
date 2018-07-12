<?php

namespace spec\App;

use App\Standard;
use App\Cost;
use PhpSpec\ObjectBehavior;

class StandardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Standard::class);
    }

    function it_should_implement_the_advert_interface()
    {
    	$this->shouldImplement('App\AdvertInterface');
    }

    function let(Cost $cost)
    {
        $this->beConstructedWith($cost);
    }

    function it_should_return_its_cost(Cost $cost)
    {
        $cost->getCost()->willReturn(10);
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
            '2 photos',
            '1 hr free support',
            '20 x 300 branded logo',
            'free image storage'
        ));
    }
}

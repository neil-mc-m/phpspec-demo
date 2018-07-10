<?php

namespace spec\App;

use App\Premium;
use App\Standard;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\AdvertInterface;

class PremiumSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Premium::class);
    }

    function it_should_implement_the_advert_interface()
    {
    	$this->shouldImplement('App\AdvertInterface');
    }

    function let(Standard $standard)
    {
    	$this->beConstructedWith($standard);
    }

    function it_should_return_its_cost($standard)
    {
    	$standard->getCost()->willReturn(10);

    	$this->getCost()->shouldBe(20);
    }

    function it_should_add_to_the_standard_features($standard)
    {
        $standard->getFeatures()->willReturn(array(
            '2 week listing',
            '2 photos',
            '1 hr free support',
            '20 x 300 branded logo',
            'free image storage'
        ));

        $this->getFeatures()->shouldBe(array(
            '2 week listing',
            '2 photos',
            '1 hr free support',
            '20 x 300 branded logo',
            'free image storage',
            'top spot for 1 month',
            'guaranteed 10000 viewings per month'
        ));
    }
}

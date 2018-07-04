<?php

namespace spec\App;

use App\Premium;
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

    function let(AdvertInterface $advert)
    {
    	$this->beConstructedWith($advert);
    }

    function it_should_return_its_cost($advert)
    {
    	$advert->getCost()->willReturn(10);

    	$this->getCost()->shouldBe(20);
    }
    function it_should_add_to_the_standard_features($advert)
    {
        $advert->getFeatures()->willReturn(array(
            '2 week listing',
            '2 photos'
        ));
        $this->getFeatures()->shouldBe(array(
            '2 week listing',
            '2 photos',
            'top spot for 1 month',
            'guaranteed 10000 viewings per month'
        ));
    }
}

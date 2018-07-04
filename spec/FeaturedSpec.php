<?php

namespace spec\App;

use App\Featured;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\AdvertInterface;

class FeaturedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Featured::class);
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
    	$advert->getCost()->willReturn(20);

    	$this->getCost()->shouldBe(40);
    }

    function it_should_add_to_the_premium_features($advert)
    {
        $advert->getFeatures()->willReturn(array(
            '2 week listing',
            '2 photos',
            'top spot for 1 month',
            'guaranteed 10000 viewings per month'
        ));
        $this->getFeatures()->shouldBe(array(
            '2 week listing',
            '2 photos',
            'top spot for 1 month',
            'guaranteed 10000 viewings per month',
            'extra support from our specialist staff'
        ));
    }
}

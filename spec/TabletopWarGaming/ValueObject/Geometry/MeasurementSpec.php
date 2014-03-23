<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\System;


class MeasurementSpec extends ObjectBehavior
{
    function it_returns_the_measurement_i_give_it(System $system)
    {
        $distance = 24;
        $this->beConstructedWith($system, $distance);
        $this->getDistance()->shouldReturn($distance);
    }

    function it_returns_the_system_i_give_it(System $system)
    {
        $distance = 24;
        $this->beConstructedWith($system, $distance);
        $this->getSystem()->shouldReturn($system);
    }
}

<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\System;

class RangeSpec extends ObjectBehavior
{
    public function let($start, $end)
    {
        $start->beADoubleOf('TabletopWargaming\ValueObject\Geometry\Measurement');
        $end->beADoubleOf('TabletopWargaming\ValueObject\Geometry\Measurement');
        $this->beConstructedWith($start, $end);
    }

    function it_should_return_the_start_measurement(Measurement $start)
    {
        $this->getStart()->shouldReturn($start);
    }

    function it_should_return_the_end_measurement(Measurement $end)
    {
        $this->getEnd()->shouldReturn($end);
    }

    function it_should_not_allow_a_start_value_higher_than_the_end_value(
        Measurement $start,
        Measurement $end
    )
    {
        $start->toBase()->willReturn(20);
        $end->toBase()->willReturn(19);
        $this->shouldThrow('\LengthException')->during('__construct', array($start, $end));
    }
}

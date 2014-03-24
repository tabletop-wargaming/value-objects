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

    function it_should_return_itself_if_it_is_in_range(
        Measurement $start,
        Measurement $end,
        Measurement $in
    )
    {
        $start->toBase()->willReturn(0);
        $end->toBase()->willReturn(3000);
        $in->toBase()->willReturn(0);
        $this->beConstructedWith($start, $end);
        $this->in($in)->shouldReturn($this->getWrappedObject());
    }

    function it_should_return_null_if_out_of_range(
        Measurement $start,
        Measurement $end,
        Measurement $in
    )
    {
        $start->toBase()->willReturn(0);
        $end->toBase()->willReturn(3000);
        $in->toBase()->willReturn(3001);
        $this->beConstructedWith($start, $end);
        $this->in($in)->shouldReturn(null);
    }

    function it_can_be_infinite(
        Measurement $start,
        Measurement $end,
        Measurement $in
    ) {
        $start->toBase()->willReturn(100);
        $end->isInfinite()->willReturn(true);
        $end->toBase()->willReturn(INF);
        $in->toBase()->willReturn(3001);
        $this->beConstructedWith($start, $end);
        $this->in($in)->shouldReturn($this->getWrappedObject());
    }
}

<?php

namespace spec\TabletopWargaming\ValueObject\Geometry\Range;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\System;

class RangeSpec extends ObjectBehavior
{
    public function let($start, $end, $in)
    {
        $start->beADoubleOf('TabletopWargaming\ValueObject\Geometry\Measurement');
        $end->beADoubleOf('TabletopWargaming\ValueObject\Geometry\Measurement');
        $in->beADoubleOf('TabletopWargaming\ValueObject\Geometry\Measurement');
        $start->isGreaterThan($end)->willReturn(false);
        $this->beConstructedWith($start, $end);
    }

    function it_should_return_the_start_measurement($start)
    {
        $this->getStart()->shouldReturn($start);
    }

    function it_should_return_the_end_measurement($end)
    {
        $this->getEnd()->shouldReturn($end);
    }

    function it_should_not_allow_a_start_value_higher_than_the_end_value(
        $start,
        $end
    )
    {
        $start->isGreaterThan($end)->willReturn(true);
        $this->shouldThrow('\LengthException')->during('__construct', array($start, $end));
    }

    function it_should_return_itself_if_it_is_in_range(
        $start,
        $end,
        $in
    )
    {
        $in->isEqualTo($start)->willReturn(true);
        $end->isLessThan($in)->willReturn(true);
        $this->in($in)->shouldReturn($this->getWrappedObject());
    }

    function it_should_return_null_if_out_of_range(
        $start,
        $end,
        $in
    )
    {
        $in->isEqualTo($start)->willReturn(false);
        $in->isGreaterThan($start)->willReturn(false);
        $end->isGreaterThan($in)->willReturn(false);
        $this->in($in)->shouldReturn(null);
    }

    function it_can_be_infinite(
        $start,
        $end
    ) {
        $end->isInfinite()->willReturn(true);
        $this->isInfinite()->shouldReturn(true);
    }

    function it_can_tell_me_if_it_overlaps_another_range($start, Range $range)
    {
        $range->in($start)->willReturn(true);
        $this->overlap($range)->shouldReturn(true);
    }

    function it_can_tell_me_if_starts_closer_than_another_range(Range $range)
    {

    }
}

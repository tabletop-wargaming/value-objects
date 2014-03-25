<?php

namespace spec\TabletopWargaming\ValueObject\Geometry\Range;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range;

class AggregateSpec extends ObjectBehavior
{

    function it_gives_me_the_start(Range $range, Measurement $measurement)
    {
        $range->getStart()->willReturn($measurement);

        $this->beConstructedWith(array($range));
        $this->getStart()->shouldReturn($measurement);
    }

    function it_gives_me_the_end_measurement(Range $range, Measurement $measurement)
    {
        $range->getEnd()->willReturn($measurement);
        $this->beConstructedWith(array($range));
        $this->getEnd()->shouldReturn($measurement);
    }

    function it_gives_me_the_range_a_measurement_is_in(
       Range $start,
       Range $middle,
       Range $end,
       Measurement $in
    )
    {
        $start->in($in)->willReturn(null);
        $middle->in($in)->willReturn($middle);
        $this->beConstructedWith(array($start, $middle, $end));
        $this->in($in)->shouldReturn($middle);
    }
}

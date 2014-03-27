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
        $range->getEnd()->willReturn($measurement);
        $this->beConstructedWith(array($range));
        $this->getStart()->shouldReturn($measurement);
    }

    function it_gives_me_the_end_measurement(Range $start, Range $end, Measurement $measurement)
    {
        $this->beConstructedWith(array($start, $end));
        $end->getEnd()->willReturn($measurement);
        $this->getEnd()->shouldReturn($measurement);
    }

    function it_gives_me_the_range_a_measurement_is_in(
       Range $first,
       Range $second,
       Range $third,
       Measurement $m,
       Measurement $in
    )
    {
        $first->overlap($second)->willReturn(false);
        $first->overlap($third)->willReturn(false);
        $second->overlap($third)->willReturn(false);

        $first->in($in)->willReturn(null);
        $second->in($in)->willReturn($second);
        $this->beConstructedWith(array($first, $second, $third));
        $this->in($in)->shouldReturn($second);

    }
}

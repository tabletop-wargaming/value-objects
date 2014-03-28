<?php

namespace spec\TabletopWargaming\ValueObject\Geometry\Range;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Measurement\System;
use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\Range\Simple;

class AggregateSpec extends ObjectBehavior
{
    public function let()
    {
        $system = new System(
            System::IMPERIAL,
            System::INCHES,
            System::INCH_MICRO,
            System::FORMAT_IMPERIAL
        );

        for ($i=0; $i<48; $i+=8) {
            $start = new Measurement($i, $system);
            $end = new Measurement($i + 8, $system);
            $ranges[] = new Simple($start, $end);
        }
        shuffle($ranges);
        $this->beConstructedWith($ranges);
    }

    function it_gives_me_the_start()
    {
        $system = new System(
            System::IMPERIAL,
            System::INCHES,
            System::INCH_MICRO,
            System::FORMAT_IMPERIAL
        );
        $start = new Measurement(0, $system);
        $this->getStart()->shouldBeLike($start);
    }

    function it_gives_me_the_end_measurement()
    {
        $system = new System(
            System::IMPERIAL,
            System::INCHES,
            System::INCH_MICRO,
            System::FORMAT_IMPERIAL
        );
        $end = new Measurement(48, $system);
        $this->getEnd()->shouldBeLike($end);
    }

    function it_gives_me_the_range_a_measurement_is_in()
    {
        $system = new System(
            System::IMPERIAL,
            System::INCHES,
            System::INCH_MICRO,
            System::FORMAT_IMPERIAL
        );
        $in = new Measurement(47, $system);
        $start = new Measurement(40, $system);
        $end = new Measurement(48, $system);
        $range = new Simple($start, $end);
        $this->in($in)->shouldBeLike($range);
    }
}

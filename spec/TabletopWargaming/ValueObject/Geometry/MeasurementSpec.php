<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Measurement\System;


class MeasurementSpec extends ObjectBehavior
{
    function it_returns_the_measurement_i_give_it(System $system)
    {
        $distance = 24;
        $this->beConstructedWith($distance, $system);
        $this->getDistance()->shouldReturn($distance);
    }

    function it_returns_a_valid_measurement_if_i_subtract_from_it()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $metric = new System(System::METRIC, System::CM, System::CM_MICRO, '%dcm');
        $that  = new Measurement(40, $metric);
        $theOther = new Measurement(81.92, $metric);
        $this->subtract($that)->shouldMatchMeasurement($theOther);
        $this->getDistance()->shouldReturn(48);
    }

    function it_returns_a_valid_measurement_if_i_add_to_it()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $metric = new System(System::METRIC, System::CM, System::CM_MICRO, '%dcm');
        $that  = new Measurement(40, $metric);
        $theOther = new Measurement(161.92, $metric);
        $this->add($that)->shouldMatchMeasurement($theOther);
        $this->getDistance()->shouldReturn(48);
    }

    function it_returns_the_system_i_give_it(System $system)
    {
        $distance = 24;
        $this->beConstructedWith($distance, $system);
        $this->getSystem()->shouldReturn($system);
        $this->isInfinite()->shouldReturn(false);
    }

    function it_says_whether_it_is_greater_than_another_measurement()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $that = new Measurement(47, $inches);
        $this->isGreaterThan($that)->shouldReturn(true);
        $this->isLessThan($that)->shouldReturn(false);
        $this->isEqualTo($that)->shouldReturn(false);
    }

    function it_says_whether_it_is_less_than_another_measurement()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $that = new Measurement(49, $inches);
        $this->isLessThan($that)->shouldReturn(true);
        $this->isGreaterThan($that)->shouldReturn(false);
        $this->isEqualTo($that)->shouldReturn(false);

    }

    function it_says_whether_it_is_equal_to_another_measurement()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $that = new Measurement(48, $inches);
        $this->isLessThan($that)->shouldReturn(false);
        $this->isGreaterThan($that)->shouldReturn(false);
        $this->isEqualTo($that)->shouldReturn(true);
    }


    function it_can_compare_with_another_object()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $that = new Measurement(48.1, $inches);
        $this->compare($that)->shouldReturn(-1);
        $that = new Measurement(48, $inches);
        $this->compare($that)->shouldReturn(0);
        $that = new Measurement(47.99, $inches);
        $this->compare($that)->shouldReturn(1);
    }

    function it_can_be_infinite()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(INF, $inches);
        $this->isInfinite()->shouldReturn(true);
    }

    function it_immutably_can_be_converted()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $metric = new System(System::METRIC, System::CM, System::CM_MICRO, '%dcm');
        $metricMeasurement = new Measurement(121.92, $metric);
        $this->beConstructedWith(48, $inches);
        $this->convertTo($metric)->shouldMatchMeasurement($metricMeasurement);
    }

    public function getMatchers()
    {
        return [
          'matchMeasurement' => function($measurement1, $measurement2) {
              return bccomp($measurement1->toBase(), $measurement2->toBase());
          }
        ];
    }
}

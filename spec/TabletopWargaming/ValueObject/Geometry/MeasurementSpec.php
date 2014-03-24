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
    }

    function it_says_whether_it_is_less_than_another_measurement()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(48, $inches);
        $that = new Measurement(49, $inches);
        $this->isLessThan($that)->shouldReturn(true);
        $this->isGreaterThan($that)->shouldReturn(false);

    }

    function it_can_be_infinite()
    {
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $this->beConstructedWith(INF, $inches);
        $this->isInfinite()->shouldReturn(true);
    }

    function it_immutably_can_be_converted()
    {
        $distance = 48;
        $inches = new System(System::IMPERIAL, System::INCHES, System::INCH_MICRO, '%d"');
        $metric = new System(System::IMPERIAL, System::METRIC, System::CM_MICRO, '%dcm');
        $metricMeasurement = new Measurement(121.92, $metric);
        $this->beConstructedWith(48, $inches);
        $this->convertTo($metric)->shouldMatchDistance($metricMeasurement);
    }

    public function getMatchers()
    {
        return [
          'matchDistance' => function($measurement1, $measurement2) {
              return ($measurement1->toBase() == $measurement2->toBase());
          }
        ];
    }
}

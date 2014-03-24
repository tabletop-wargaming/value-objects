<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\System;


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

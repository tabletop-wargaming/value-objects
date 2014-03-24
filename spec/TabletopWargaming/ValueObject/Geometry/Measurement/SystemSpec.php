<?php

namespace spec\TabletopWargaming\ValueObject\Geometry\Measurement;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\Measurement\System;

class SystemSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            System::IMPERIAL,
            System::INCHES,
            System::INCH_MICRO,
            '%d"'
        );
    }

    function it_gives_me_the_system_name()
    {
        $this->getName()->shouldReturn(System::IMPERIAL);
    }

    function it_gives_me_the_unit_name()
    {
        $this->getUnit()->shouldReturn(System::INCHES);
    }

    function it_gives_me_the_unit_name_when_tostringed()
    {
        $this->__toString()->shouldReturn(System::INCHES);
    }

    function it_gives_me_a_rendered_string()
    {
        $this->render(24)->shouldReturn('24"');
    }

    function it_gives_me_a_rendered_string_with_the_correct_suffix()
    {
        $this->beConstructedWith(
            System::METRIC,
            System::CM,
            System::CM_MICRO,
            '%dcm'
        );
        $this->render(24)->shouldReturn('24cm');
    }

    function it_gives_me_the_base_value()
    {
        $this->toBase(24)->shouldReturn((double) 609600);
    }

    function it_gives_me_the_unit_value()
    {
        $this->toUnit(1219200)->shouldReturn((double) 48);
    }
}

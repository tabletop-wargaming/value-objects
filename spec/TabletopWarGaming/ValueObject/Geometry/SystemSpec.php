<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Geometry\System;

class SystemSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(System::IMPERIAL, System::INCHES, '%d"');
    }

    function it_gives_me_the_system_name()
    {
        $this->getName()->shouldReturn(System::IMPERIAL);
    }

    function it_gives_me_the_unit_name()
    {
        $this->getUnit()->shouldReturn(System::INCHES);
    }

    function it_gives_me_a_rendered_string()
    {
        $this->render(24)->shouldReturn('24"');
    }

    function it_gives_me_a_rendered_string_with_the_correct_suffix()
    {
        $this->beConstructedWith(System::METRIC, System::CM, '%dcm');
        $this->render(24)->shouldReturn('24cm');
    }
}

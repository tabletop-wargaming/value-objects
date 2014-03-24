<?php

namespace spec\TabletopWargaming\ValueObject\Geometry\Range;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TabletopWargaming\ValueObject\Geometry\Range\Band');
    }
}

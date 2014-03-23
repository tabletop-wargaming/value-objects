<?php

namespace spec\TabletopWargaming\ValueObject\Geometry;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RangeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TabletopWargaming\ValueObject\Geometry\Range');
    }
}

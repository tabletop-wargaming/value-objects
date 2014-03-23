<?php

namespace spec\TabletopWargaming\ValueObject\Army;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UnitBuilderSpec extends ObjectBehavior
{
    function it_builds()
    {
        $this->shouldHaveType('TabletopWargaming\ValueObject\Army\UnitBuilder');
    }
}

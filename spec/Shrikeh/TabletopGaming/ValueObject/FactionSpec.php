<?php

namespace spec\TabletopWargaming\ValueObjects;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TabletopWargaming\ValueObjects\Faction');
    }
}

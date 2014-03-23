<?php

namespace spec\Shrikeh\TabletopGaming\ValueObject;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArmySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\TabletopGaming\ValueObject\Army');
    }
}

<?php

namespace spec\Shrikeh\TabletopGaming\ValueObject;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArmySpec extends ObjectBehavior
{
    function it_should_give_me_the_name()
    {
        $name = 'Dark Angels';
        $this->beConstructedWith($name);
        $this->getName()->shouldReturn($name);
    }
}

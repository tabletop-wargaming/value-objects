<?php

namespace spec\Shrikeh\TabletopWargaming\ValueObject;

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

    function it_should_give_me_its_faction()
    {

    }
}

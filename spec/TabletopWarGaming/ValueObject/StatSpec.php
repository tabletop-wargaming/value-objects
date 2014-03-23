<?php

namespace spec\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class StatSpec extends ObjectBehavior
{
    function it_returns_the_stat_code()
    {
        $this->beConstructedWith('BS', 12);
        $this->getCode()->shouldReturn('BS');
    }

    function it_returns_the_stat_value()
    {
        $this->beConstructedWith('BS', 12);
        $this->getValue()->shouldReturn(12);
    }
}

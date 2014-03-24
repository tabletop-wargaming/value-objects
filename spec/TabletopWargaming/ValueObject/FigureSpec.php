<?php

namespace spec\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;


class FigureSpec extends ObjectBehavior
{
    public function let($troop)
    {
        $troop->beADoubleOf('\TabletopWargaming\ValueObject\Army\Troop');
        $this->beConstructedWith($troop);
    }

    function it_returns_the_troop($troop)
    {
        $this->getTroop()->shouldReturn($troop);
    }
}

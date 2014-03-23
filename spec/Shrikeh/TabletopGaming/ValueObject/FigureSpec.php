<?php

namespace spec\Shrikeh\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class FigureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\TabletopWargaming\ValueObject\Figure');
    }
}

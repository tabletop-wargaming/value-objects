<?php

namespace spec\Shrikeh\TabletopGaming;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class FigureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\TabletopGaming\Figure');
    }
}

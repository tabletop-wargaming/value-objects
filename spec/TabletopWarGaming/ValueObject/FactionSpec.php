<?php

namespace spec\TabletopWargaming\ValueObjects;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactionSpec extends ObjectBehavior
{
    function it_gives_me_its_id()
    {
        $id = 'covenant_of_antartica';
        $this->beConstructedWith('covenant_of_antartica');
        $this->getId()->shouldReturn($id);
    }
}

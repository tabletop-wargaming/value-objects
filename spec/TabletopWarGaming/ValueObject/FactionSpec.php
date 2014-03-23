<?php

namespace spec\TabletopWargaming\ValueObject;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactionSpec extends ObjectBehavior
{
    function it_gives_me_its_id()
    {
        $id = 'covenant_of_antartica';
        $this->beConstructedWith($id, '');
        $this->getId()->shouldReturn($id);
    }

    function it_gives_its_name()
    {
        $name = 'Covenant of Antartica';
        $this->beConstructedWith('foo', $name);
        $this->getName()->shouldReturn($name);
    }
}

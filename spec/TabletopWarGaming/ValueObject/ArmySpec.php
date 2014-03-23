<?php

namespace spec\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Faction;

class ArmySpec extends ObjectBehavior
{
    public function let()
    {
        $name = 'Dark Angels';
        $faction = new Faction('imperium_of_man');
        $this->beConstructedWith($name, $faction);
    }

    function it_should_give_me_the_name()
    {
        $name = 'Dark Angels';
        $this->getName()->shouldReturn($name);
    }

    function it_should_give_me_its_faction()
    {
        $faction = new Faction('imperium_of_man');
        $this->getFaction()->shouldBeLike($faction);
    }
}

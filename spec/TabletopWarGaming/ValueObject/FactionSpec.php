<?php

namespace spec\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Faction;

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

    function it_can_have_a_parent_faction(Faction $parentFaction)
    {
        $this->beConstructedWith('foo', 'bar', array(), $parentFaction);
        $this->getParent()->shouldReturn($parentFaction);
    }

    function it_can_have_child_factions(Faction $child1, Faction $child2)
    {
        $factions = array($child1, $child2);
        $this->beConstructedWith('foo', 'bar',  $factions, null);
        $this->getChildren()->shouldReturn($factions);
    }
}

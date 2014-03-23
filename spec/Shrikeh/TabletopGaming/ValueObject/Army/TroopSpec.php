<?php

namespace spec\Shrikeh\TabletopWargaming\ValueObject\Army;

use \Shrikeh\TabletopWargaming\ValueObject\Unit;
use \Shrikeh\TabletopWargaming\ValueObject\Unit\Classification;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class TroopSpec extends ObjectBehavior
{
    public function let(Unit $unit)
    {
        $unit->beADoubleOf('\Shrikeh\TabletopWargaming\ValueObject\Unit');
        $this->beConstructedWith($unit);
    }

    function it_gives_me_its_type(Unit $unit)
    {
        $type = new Classification('type', 'Line Infantry', 'LI');
        $unit->getClassification('type')->shouldBeCalled();
        $unit->getClassification('type')->willReturn($type);
        $this->getClassification('type')->shouldReturn($type);
    }
}

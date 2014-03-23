<?php

namespace spec\Shrikeh\TabletopGaming\ValueObject\Army;

use \Shrikeh\TabletopGaming\ValueObject\Unit;
use \Shrikeh\TabletopGaming\ValueObject\Unit\Classification;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class TroopSpec extends ObjectBehavior
{
    public function let(Unit $unit)
    {
        $unit->beADoubleOf('\Shrikeh\TabletopGaming\ValueObject\Unit');
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

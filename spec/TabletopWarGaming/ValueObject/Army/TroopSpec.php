<?php

namespace spec\TabletopWargaming\ValueObject\Army;

use \TabletopWargaming\ValueObject\Unit;
use \TabletopWargaming\ValueObject\Unit\Classification;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class TroopSpec extends ObjectBehavior
{
    public function let(Unit $unit)
    {
        $unit->beADoubleOf('\TabletopWargaming\ValueObject\Unit');
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

<?php

namespace spec\Shrikeh\TabletopGaming\ValueObject\Army;

use \Shrikeh\TabletopGaming\ValueObject\Unit;
use \Shrikeh\TabletopGaming\ValueObject\Unit\Classification;
use \Shrikeh\TabletopGaming\ValueObject\Unit\Instruction;
use \Shrikeh\TabletopGaming\ValueObject\Unit\Type;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class TroopSpec extends ObjectBehavior
{
    public function let(Unit $unit)
    {
        $unit->beADoubleOf('\Shrikeh\TabletopGaming\ValueObject\Unit');
        $this->beConstructedWith($unit);
    }

    function it_gives_me_its_classification(Unit $unit)
    {
        $classification = new Classification('Line Troops');
        $unit->getClassification()->shouldBeCalled();
        $unit->getClassification()->willReturn($classification);
        $this->getClassification()->shouldReturn($classification);
    }

    function it_gives_me_its_instruction(Unit $unit)
    {
        $instruction = new Instruction(Instruction::REGULAR);
        $unit->getInstruction()->shouldBeCalled();
        $unit->getInstruction()->willReturn($instruction);
        $this->getInstruction()->shouldReturn($instruction);
    }

    function it_gives_me_its_type(Unit $unit)
    {
        $type = new Type('Line Infantry', 'LI');
        $unit->getType()->shouldBeCalled();
        $unit->getType()->willReturn($type);
        $this->getType()->shouldReturn($type);
    }
}

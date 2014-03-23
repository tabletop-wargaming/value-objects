<?php

namespace spec\Shrikeh\TabletopGaming;

use \Shrikeh\TabletopGaming\ValueObject\Stat;
use \Shrikeh\TabletopGaming\ValueObject\Unit\Classification;
use \Shrikeh\TabletopGaming\ValueObject\Instruction;
use \Shrikeh\TabletopGaming\ValueObject\Type;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class UnitSpec extends ObjectBehavior
{
    public function let()
    {
        $name = 'Ghulam infantry';
        $type = new Type('Light Infantry', 'LI');
        $stat = new Stat('BS', 11);
        $classification = new Classification('Line Troops');
        $stats = array($stat);
        $instruction = new Instruction(Instruction::REGULAR);
        $this->beConstructedWith($name, $type, $classification, $instruction, $stats);
    }

    function it_gives_me_a_stat()
    {
        $stat = new Stat('BS', 11);
        $this->getStat('BS')->shouldBeLike($stat);
    }

    function it_gives_me_the_unit_name()
    {
        $this->getName()->shouldReturn('Ghulam infantry');
    }

    function it_gives_me_the_type()
    {
        $type = new Type('Light Infantry', 'LI');
        $this->getType()->shouldBeLike($type);
    }

    function it_gives_me_the_classification()
    {
        $classification = new Classification('Line Troops');
        $this->getClassification()->shouldBeLike($classification);
    }

    function it_gives_me_the_instruction()
    {
        $instruction = new Instruction(Instruction::REGULAR);
        $this->getInstruction()->shouldBeLike($instruction);
    }
}

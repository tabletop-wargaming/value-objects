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
        $types = array(
            'type'           => new Type('Light Infantry', 'LI'),
            'classification' => new Type('Line Troops'),
            'instruction'    => new Type('Regular'),
        );
        $stat = new Stat('BS', 11);
        $stats = array($stat);
        $this->beConstructedWith($name, $stats, $types = array());
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
        $this->getType('type')->shouldBeLike($type);
    }

    function it_gives_me_the_classification()
    {
        $classification = new Type('Line Troops');
        $this->getType('classification')->shouldBeLike($classification);
    }
}

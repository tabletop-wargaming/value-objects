<?php

namespace spec\Shrikeh\TabletopWargaming\ValueObject;

use \Shrikeh\TabletopWargaming\ValueObject\Stat;
use \Shrikeh\TabletopWargaming\ValueObject\Unit\Classification;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class UnitSpec extends ObjectBehavior
{
    public function let()
    {
        $name = 'Ghulam infantry';
        $types = array(
            new Classification('type', 'Light Infantry', 'LI'),
            new Classification('classification', 'Line Troops'),
            new Classification('instruction', 'Regular'),
        );
        $stat = new Stat('BS', 11);
        $stats = array($stat);
        $this->beConstructedWith($name, $stats, $types);
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


    function it_gives_me_the_classification()
    {
        $classification = new Classification('classification', 'Line Troops');
        $this->getClassification('classification')->shouldBeLike($classification);
    }
}

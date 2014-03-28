<?php

namespace spec\TabletopWargaming\ValueObject\Army\ArmyList;

use \ArrayIterator;
use \RecursiveIterator;
use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \TabletopWargaming\ValueObject\Army\ArmyList\Filter;
use \TabletopWargaming\ValueObject\Army\ArmyList\ListIterator;
use \TabletopWargaming\ValueObject\Unit;

class ListIteratorSpec extends ObjectBehavior
{

    function it_does_filter(ArrayIterator $it, Filter $filter, Unit $unit)
    {
        $it->current()->willReturn($unit);
        $filter->filter($unit)->willReturn(false);
        $this->beConstructedWith($it, $filter);
        $this->accept()->shouldReturn(false);
    }


    function it_iterates_over_units(ArrayIterator $it, Unit $unit1, $unit2)
    {

        $it->current()->willReturn($unit1);
        $it->next()->will(function() use ($it, $unit2) {
            $it->current()->willReturn($unit2);
        });
        $this->beConstructedWith($it);
        $this->next();
        $this->current()->shouldReturn($unit2);
    }


}

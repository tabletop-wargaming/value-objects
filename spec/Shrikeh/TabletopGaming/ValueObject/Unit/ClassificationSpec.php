<?php

namespace spec\Shrikeh\TabletopGaming\ValueObject\Unit;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class ClassificationSpec extends ObjectBehavior
{
    function it_returns_a_valid_classification()
    {
        $classification = 'Line Troops';
        $this->beConstructedWith($classification);
        $this->getName()->shouldReturn($classification);
    }

    function it_gives_a_classification_description()
    {
        $desc = 'The most common troops. These form the main body of most armies.';
        $this->beConstructedWith('Line Troops', $desc);
        $this->getDescription()->shouldReturn($desc);
    }
}

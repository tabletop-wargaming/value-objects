<?php

namespace spec\TabletopWargaming\ValueObject;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use TabletopWargaming\ValueObject\Attribute;

class StatSpec extends ObjectBehavior
{
    function it_returns_the_attribute()
    {
        $attribute = new Attribute('BS', 'Ballistic Skill');
        $this->beConstructedWith($attribute, 12);
        $this->getAttributeId()->shouldReturn('BS');
    }

    function it_returns_the_stat_value()
    {
        $attribute = new Attribute('BS', 'Ballistic Skill');
        $this->beConstructedWith($attribute, 12);
        $this->getValue()->shouldReturn(12);
    }
}

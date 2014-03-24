<?php

namespace spec\TabletopWargaming\ValueObject;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AttributeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            'BS',
            'Ballistic Skill',
            'BS indicates the skill of a miniature in fighting with ranged firearms.'
        );
    }

    function it_should_return_the_id()
    {
        $this->getId()->shouldReturn('BS');
    }

    function it_should_return_the_name()
    {
        $this->getName()->shouldReturn('Ballistic Skill');
    }

    function it_should_return_the_description()
    {
        $this->getDescription()->shouldReturn('BS indicates the skill of a miniature in fighting with ranged firearms.');
    }
}

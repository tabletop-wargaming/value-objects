<?php

namespace spec\TabletopWarGaming\ValueObject\Game;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \TabletopWargaming\ValueObject\Attribute;

class AttributeListSpec extends ObjectBehavior
{

    function it_gives_me_the_attribute_with_the_right_id()
    {
        $ballisticSkill = new Attribute('BS', 'Ballistic SKill');
        $this->beConstructedWith(array(
            $ballisticSkill,
            new Attribute('CC', 'Close Combat'),
        ));
        $this->getAttribute('BS')->shouldReturn($ballisticSkill);
    }

    function it_allows_array_access(Attribute $ballisticSkill)
    {
        $ballisticSkill->getId()->willReturn('BS');
        $ballisticSkill->getId()->shouldBeCalled();
        $ccSkill = new Attribute('CC', 'Close Combat');
        $this->beConstructedWith(array(
            $ccSkill,
            $ballisticSkill,
        ));
        $this['BS']->shouldReturn($ballisticSkill);
    }



    /*
    public function it_is_immutable_array()
    {

        $attribute = new Attribute('BS', '');
        $this->shouldThrow('\TabletopWargaming\ValueObject\Game\AttributeList\AttributeListException')
            ->during('offsetUnset');
        $this->offsetUnset('BS');

        $this->beConstructedWith(array($attribute));
        $this->shouldThrow('\TabletopWargaming\ValueObject\Game\AttributeList\AttributeListException')
            ->during('offsetSet');
        $this->offsetSet('BS', $attribute);

    }
    */

}

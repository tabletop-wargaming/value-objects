<?php

namespace TabletopWargaming\ValueObject\Game;

use \TabletopWargaming\ValueObject\Attribute\GameAttribute;

class AttributeList implements \ArrayAccess
{
    private $attributes;

    public function __construct($attributes = array())
    {
        foreach ($attributes as $position => $attribute) {
            $this->addAttribute($attribute, $position);
        }
    }

    public function offsetSet($offset, $attribute)
    {
        throw new AttributeListException(
            'AttributeList is immutable, please set attributes through the constructor'
        );
    }

    public function offsetUnset($offset)
    {
        throw new AttributeListException('AttributeList is immutable, you cannot unset them');
    }

    public function offsetGet($attributeId)
    {
        return $this->getAttribute($attributeId);
    }

    public function offsetExists($attributeId)
    {
        return ($this->getAttribute($attributeId));
    }

    public function getAttribute($attributeId)
    {
        foreach($this->attributes as $attribute) {
            if ($attribute->getId() == $attributeId) {
                return $attribute;
            }
        }
    }


    private function addAttribute(GameAttribute $attribute, $position)
    {
        $this->attributes[$position] = $attribute;
    }
}

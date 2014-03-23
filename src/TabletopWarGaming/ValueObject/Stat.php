<?php
/**
 * Created by PhpStorm.
 * User: shrikeh
 * Date: 21/03/2014
 * Time: 18:42
 */ 
namespace TabletopWargaming\ValueObject;

use \TabletopWargaming\ValueObject\Attribute;
use \TabletopWargaming\ValueObject\Stat\UnitStat;

class Stat implements UnitStat
{
    private $attribute;

    private $value;

    public function __construct(Attribute $attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    public function getAttributeId()
    {
        return $this->getAttribute()->getId();
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function getValue()
    {
        return $this->value;
    }
}

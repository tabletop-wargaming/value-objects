<?php
/**
 * Created by PhpStorm.
 * User: shrikeh
 * Date: 21/03/2014
 * Time: 18:42
 */ 
namespace Shrikeh\TabletopWargaming\ValueObject;

use \Shrikeh\TabletopWargaming\ValueObject\Stat\UnitStat;

class Stat implements UnitStat
{
    private $code;

    private $value;

    public function __construct($code, $value)
    {
        $this->code = $code;
        $this->value = $value;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getValue()
    {
        return $this->value;
    }
}

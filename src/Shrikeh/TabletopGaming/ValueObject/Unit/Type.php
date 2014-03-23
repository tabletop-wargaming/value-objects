<?php
/**
 * Created by PhpStorm.
 * User: shrikeh
 * Date: 22/03/2014
 * Time: 00:06
 */ 
namespace Shrikeh\TabletopGaming\ValueObject\Unit;

class Type
{
    private $name;

    private $code;

    public function __construct($name, $code, $description = null)
    {
        $this->name = $name;
        $this->code = $code;
        $this->description = $description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDescription()
    {
        return $this->description;
    }
}

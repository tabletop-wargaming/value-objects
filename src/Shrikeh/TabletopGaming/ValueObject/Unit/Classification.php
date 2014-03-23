<?php
/**
 * Created by PhpStorm.
 * User: shrikeh
 * Date: 22/03/2014
 * Time: 00:06
 */ 
namespace Shrikeh\TabletopGaming\ValueObject\Unit;

class Classification
{
    private $name;

    private $id;

    private $description;

    private $type;

    public function __construct(
        $name,
        $type,
        $id,
        $description = null
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
        $this->description = $description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
    }
}

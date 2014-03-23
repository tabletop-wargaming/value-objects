<?php

namespace Shrikeh\TabletopWargaming\ValueObject\Unit;

use Shrikeh\TabletopWargaming\ValueObject\Unit\Classification\UnitType;

class Classification implements UnitType
{
    private $name;

    private $id;

    private $description;

    private $type;

    public function __construct(
        $type,
        $name,
        $id = null,
        $description = null
    )
    {
        $this->type = $type;
        $this->name = $name;
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

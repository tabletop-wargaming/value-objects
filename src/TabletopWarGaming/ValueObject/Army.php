<?php

namespace TabletopWargaming\ValueObject;

use TabletopWargaming\ValueObject\Faction;

class Army
{
    private $name;

    private $faction;

    public function __construct($name, Faction $faction)
    {
        $this->name = $name;
        $this->faction = $faction;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFaction()
    {
        return $this->faction;
    }
}

<?php

namespace TabletopWargaming\ValueObject;

use TabletopWargaming\ValueObject\Faction\GameCoalition;

class Army
{
    private $name;

    private $faction;

    public function __construct($name, GameCoalition $faction)
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

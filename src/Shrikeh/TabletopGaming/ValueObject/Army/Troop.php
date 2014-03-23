<?php

namespace Shrikeh\TabletopGaming\ValueObject\Army;

use \Shrikeh\TabletopGaming\ValueObject\Unit\GameUnit;

class Troop
{
    private $unit;

    public function __construct(GameUnit $unit)
    {
        $this->unit = $unit;
    }

    public function getClassification()
    {
        return $this->unit->getClassification();
    }

    public function getType()
    {
        return $this->unit->getType();
    }

    public function getInstruction()
    {
        return $this->unit->getInstruction();
    }
}

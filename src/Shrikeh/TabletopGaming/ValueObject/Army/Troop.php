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

    public function getClassification($classificationType)
    {
        return $this->unit->getClassification($classificationType);
    }

}

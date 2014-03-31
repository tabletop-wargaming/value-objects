<?php

namespace TabletopWargaming\ValueObject\Army;

use \TabletopWargaming\ValueObject\Unit\GameUnit;

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

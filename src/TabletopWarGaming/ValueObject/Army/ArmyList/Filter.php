<?php

namespace TabletopWargaming\ValueObject\Army\ArmyList;

use TabletopWargaming\ValueObject\Unit;

interface Filter
{
    public function filter(Unit $unit);
}

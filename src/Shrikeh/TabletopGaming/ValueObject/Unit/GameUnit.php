<?php

namespace Shrikeh\TabletopWargaming\ValueObject\Unit;

interface GameUnit
{
    public function getName();

    public function getStat($statCode);

    public function getClassification($classificationType);
}

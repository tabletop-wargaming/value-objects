<?php

namespace Shrikeh\TabletopGaming\ValueObject\Unit;

interface GameUnit
{
    public function getName();

    public function getStat($statCode);

    public function getType();

    public function getClassification();

    public function getInstruction();
}

<?php

namespace TabletopWargaming\ValueObject;

use TabletopWargaming\ValueObject\Stat\UnitStat;
use TabletopWargaming\ValueObject\Unit\GameUnit;
use TabletopWargaming\ValueObject\Unit\Classification\UnitType;

class Unit implements GameUnit
{
    private $name;

    private $classifications;

    private $stats = array();

    public function __construct(
        $name,
        $stats,
        array $classifications = array()
    ) {
        $this->name = $name;

        foreach ($classifications as $classification) {
            $this->addClassification($classification);
        }

        foreach($stats as $stat) {
            $this->addStat($stat);
        }
    }

    public function getStat($statCode)
    {
        return $this->stats[$statCode];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getClassification($classification)
    {
        return $this->classifications[$classification];
    }

    private function addClassification(UnitType $classification)
    {
        $this->classifications[$classification->getType()] = $classification;
    }

    private function addStat(UnitStat $stat)
    {
        $this->stats[$stat->getCode()] = $stat;
    }
}

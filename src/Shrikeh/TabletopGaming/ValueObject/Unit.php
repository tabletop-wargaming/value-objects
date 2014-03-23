<?php

namespace Shrikeh\TabletopGaming\ValueObject;

use Shrikeh\TabletopGaming\ValueObject\Stat\UnitStat;
use Shrikeh\TabletopGaming\ValueObject\Unit\GameUnit;
use Shrikeh\TabletopGaming\ValueObject\Unit\Classification;

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

    private function addClassification(Classification $classification)
    {
        $this->classificationss[$classification->getType()] = $classification;
    }

    private function addStat(UnitStat $stat)
    {
        $this->stats[$stat->getCode()] = $stat;
    }
}

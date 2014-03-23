<?php

namespace Shrikeh\TabletopGaming\ValueObject;

use Shrikeh\TabletopGaming\ValueObject\Stat\UnitStat;
use Shrikeh\TabletopGaming\ValueObject\Unit\Classification;
use Shrikeh\TabletopGaming\ValueObject\Unit\GameUnit;
use Shrikeh\TabletopGaming\ValueObject\Unit\Instruction;
use Shrikeh\TabletopGaming\ValueObject\Unit\Type;

class Unit implements GameUnit
{
    private $name;

    private $type;

    private $classification;

    private $instruction;

    private $stats = array();

    public function __construct(
        $name,
        Type $type,
        Classification $classification,
        Instruction $instruction,
        $stats)
    {
        $this->name = $name;
        $this->type = $type;
        $this->instruction = $instruction;
        $this->classification = $classification;

        foreach($stats as $stat) {
            $this->addStat($stat);
        }
    }

    public function getStat($statCode)
    {
        return $this->stats[$statCode];
    }

    private function addStat(UnitStat $stat)
    {
        $this->stats[$stat->getCode()] = $stat;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getClassification()
    {
        return $this->classification;
    }

    public function getInstruction()
    {
        return $this->instruction;
    }
}

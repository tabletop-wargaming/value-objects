<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use TabletopWargaming\ValueObject\Geometry\RangeRuler;

class Aggregate
{
    private $ranges = array();

    public function __construct($ranges)
    {
        foreach ($ranges as $range) {
            $this->addRange($range);
        }
    }

    public function getStart()
    {
        return $this->ranges[0]->getStart();
    }

    private function addRange(RangeRuler $range)
    {
        $this->ranges[] = $range;
        ksort($this->ranges);
    }

    public function getEnd()
    {
        return $this->ranges[0]->getEnd();
    }

    public function in($argument1)
    {
        // TODO: write logic here
    }
}

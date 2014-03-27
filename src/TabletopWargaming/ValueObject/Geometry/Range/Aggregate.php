<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range\RangeTrait;

class Aggregate
{
    use RangeTrait;

    private $ranges = array();

    public function __construct($ranges)
    {
        foreach ($ranges as $range) {
            $this->addRange($range);
        }
    }

    public function getStart()
    {
        $start = null;
        foreach ($this->ranges as $range) {

        }
    }

    private function addRange(Range $range)
    {
        foreach ($this->ranges as $band) {
            if ($band->overlap($range)) {
                throw new \OutOfBoundsException('Ranges cannot overlap');
            }
        }
        $this->ranges[] = $range;
    }

    public function getEnd()
    {
        return end($this->ranges)->getEnd();
    }

    public function compare(Measurement $measurement)
    {
        foreach ($this->ranges as $range) {
            if ($range->in($measurement)) {
                return $range;
            }
        }
    }
}


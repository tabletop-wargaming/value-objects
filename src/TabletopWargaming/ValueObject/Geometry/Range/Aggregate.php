<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\Measurement;

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
        return $this->ranges[0]->getEnd();
    }

    public function in(Measurement $measurement)
    {
        foreach ($this->ranges as $range) {
            if ($range->in($measurement)) {
                return $range;
            }
        }
    }
}

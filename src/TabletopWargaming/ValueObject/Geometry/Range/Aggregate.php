<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range\RangeTrait;

class Aggregate implements Range
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
        return min($this->ranges)->getStart();
    }

    private function sort(Range $first, Range $second)
    {
        $firstStart = $first->getStart();
        $secondStart = $second->getStart();
        return $firstStart->compare($secondStart);
    }

    private function addRange(Range $range)
    {
        $ranges = $this->ranges;
        foreach ($ranges as $band) {
            if ($range->overlaps($band)) {
                throw new \OutOfBoundsException("Ranges cannot overlap, ($band) ($range)");
            }
        }
        $ranges[] = $range;
        @usort($ranges, array($this, 'sort'));
        $this->ranges = $ranges;
    }

    public function getEnd()
    {
        return end($this->ranges)->getEnd();
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


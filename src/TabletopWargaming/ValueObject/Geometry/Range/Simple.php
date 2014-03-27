<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Comparable;
use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Geometry\Range\RangeTrait;

class Simple implements Range
{
    use RangeTrait;

    private $start;

    private $end;

    public function __construct(Measurement $start, Measurement $end)
    {
        if ($start->isGreaterThan($end)) {
            throw new \LengthException('Start of the range cannot be larger than the end');
        }
        $this->start = $start;
        $this->end = $end;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function compare(Measurement $measurement)
    {
        $diff = Comparable::EQUAL_TO;
        if ($measurement->isLessThan($this->getStart())) {
            $diff = Comparable::LESS_THAN;
        }
        if ($measurement->isGreaterThan($this->getEnd())) {
            $diff = Comparable::GREATER_THAN;
        }
        return $diff;
    }
}

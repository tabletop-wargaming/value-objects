<?php

namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\RangeRuler;

class Range implements RangeRuler
{
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

    public function isInfinite()
    {
        return (INF === $this->getEnd()->toBase());
    }

    public function in(Measurement $measurement)
    {
        $start = $this->getStart();
        if ($measurement->isGreaterThan($start) || $measurement->isEqualTo($start)) {
            if ($this->getEnd()->isLessThan($measurement) ) {
                return $this;
            }
        }
    }
}

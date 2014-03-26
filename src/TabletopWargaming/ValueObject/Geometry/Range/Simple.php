<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Measurement;
use \TabletopWargaming\ValueObject\Geometry\Range;

class Simple implements Range
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
        return $this->getEnd()->isInfinite();
    }

    public function in(Measurement $measurement)
    {
        $start = $this->getStart();

        if ( ($measurement->isEqualTo($start)) || ($measurement->isGreaterThan($start)) ) {
            if ($this->getEnd()->isLessThan($measurement) ) {
                return $this;
            }
        }
    }
}

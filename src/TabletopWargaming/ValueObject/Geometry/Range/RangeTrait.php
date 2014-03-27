<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Comparable;
use \TabletopWargaming\ValueObject\Geometry\Measurement;

trait RangeTrait
{
    public function isInfinite()
    {
        return $this->getEnd()->isInfinite();
    }

    public function in(Measurement $measurement)
    {
        if (Comparable::EQUAL_TO === $this->compare($measurement)) {
            return $this;
        }
    }

    public function startsBefore(Range $range)
    {
        return (Comparable::LESS_THAN == $this->compare($range->getStart()));
    }
}
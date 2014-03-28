<?php

namespace TabletopWargaming\ValueObject\Geometry\Range;

use \TabletopWargaming\ValueObject\Geometry\Range;
use \TabletopWargaming\ValueObject\Comparable;
use \TabletopWargaming\ValueObject\Geometry\Measurement;

trait RangeTrait
{
    public function __toString()
    {
        return $this->render();
    }

    public function render()
    {
        return vsprintf('%s-%s', array((string) $this->getStart(), (string) $this->getEnd()));
    }

    public function isInfinite()
    {
        return $this->getEnd()->isInfinite();
    }

    public function overlaps(Range $range)
    {
        $start = ($range->in($this->getStart()));
        $end = ($range->in($this->getStart()));

        return ($start || $end);
    }

    public function startsBefore(Range $range)
    {
        return (Comparable::LESS_THAN == $this->compare($range->getStart()));
    }

    public function compare(Measurement $measurement)
    {
        $diff = Comparable::GREATER_THAN;
        if ($measurement->isLessThan($this->getStart())) {
            $diff = Comparable::LESS_THAN;
        } elseif ($measurement->isLessThan($this->getEnd())) {
            $diff = Comparable::EQUAL_TO;
        }
        return (int) $diff;
    }
}

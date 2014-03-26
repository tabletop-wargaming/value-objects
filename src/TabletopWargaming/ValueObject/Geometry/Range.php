<?php
namespace TabletopWargaming\ValueObject\Geometry;

interface Range
{
    public function getStart();

    public function getEnd();

    public function isInfinite();

    public function in(Measurement $measurement);

    public function overlap(Range $range);
}

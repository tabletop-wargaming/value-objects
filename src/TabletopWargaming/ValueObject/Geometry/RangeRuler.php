<?php
namespace TabletopWargaming\ValueObject\Geometry;

interface RangeRuler
{
    public function getStart();

    public function getEnd();

    public function isInfinite();

    public function in(Measurement $measurement);
}

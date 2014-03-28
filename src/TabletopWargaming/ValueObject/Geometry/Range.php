<?php
namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Renderable;

interface Range extends Renderable
{
    public function getStart();

    public function getEnd();

    public function isInfinite();

    public function in(Measurement $measurement);

    public function overlaps(Range $range);
}

<?php

namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Geometry\System;

class Measurement
{
    private $system;

    private $distance;

    public function __construct(System $system, $distance)
    {
        $this->system = $system;
        $this->distance = $distance;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getDistance()
    {
        return $this->distance;
    }
}

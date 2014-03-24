<?php

namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Geometry\System;

class Measurement
{
    private $system;

    private $distance;

    public function __construct($distance, System $system)
    {
        $this->distance = $distance;
        $this->system = $system;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function convertTo(System $system)
    {
        $distance = $this->system->toBase($this->distance);
        $unit = $system->toUnit($distance);
        return new self($unit, $system);
    }

    public function toBase()
    {
        return $this->system->toBase($this->distance);
    }
}

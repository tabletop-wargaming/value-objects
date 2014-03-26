<?php

namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Geometry\Measurement\System;

class Measurement
{
    const EQUAL_TO = 0;

    const GREATER_THAN = 1;

    const LESS_THAN = -1;

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
        return ($this->isInfinite()) ? INF: $this->system->toBase($this->distance);
    }

    public function isInfinite()
    {
        return (INF == $this->distance);
    }

    public function isGreaterThan(Measurement $measurement)
    {
        return ($this->compare($measurement) === self::GREATER_THAN);
    }

    public function isLessThan(Measurement $measurement)
    {
        return ($this->compare($measurement) === self::LESS_THAN);
    }

    public function isEqualTo(Measurement $measurement)
    {
        return ($this->compare($measurement) === self::EQUAL_TO);
    }

    public function diff(Measurement $measurement)
    {
        return (int) ($this->toBase() - $measurement->toBase());
    }

    public function compare(Measurement $measurement)
    {
        $diff = $this->diff($measurement);

        if ($diff) {
            $diff = ($diff > 0) ? self::GREATER_THAN  : self::LESS_THAN;
        }
        return $diff;
    }
}

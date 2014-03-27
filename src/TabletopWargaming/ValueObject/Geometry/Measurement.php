<?php

namespace TabletopWargaming\ValueObject\Geometry;

use \TabletopWargaming\ValueObject\Geometry\Measurement\System;

class Measurement
{
    const EQUAL_TO = 0;

    const GREATER_THAN = 1;

    const LESS_THAN = -1;

    const DELTA = 0.00001;

    private $system;

    private $distance;

    private $delta;

    public function __construct($distance, System $system, $delta = self::DELTA)
    {
        $this->distance = $distance;
        $this->system = $system;
        $this->delta = (double) $delta;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function add(Measurement $measurement)
    {
        $diff = $this->toBase() + $measurement->toBase();
        $distance = $this->getSystem()->toUnit($diff);
        return new self($distance, $this->getSystem());
    }

    public function subtract(Measurement $measurement)
    {
        $diff = $this->toBase() - $measurement->toBase();
        $distance = $this->getSystem()->toUnit($diff);
        return new self($distance, $this->getSystem());
    }

    public function convertTo(System $system)
    {
        $distance = $this->system->toBase($this->distance);
        $unit = $system->toUnit($distance);
        return new self($unit, $system);
    }

    public function toBase()
    {
        return ($this->isInfinite()) ? INF : $this->system->toBase($this->distance);
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

    public function compare(Measurement $measurement)
    {
        return bccomp($this->toBase(), $measurement->toBase());
    }
}

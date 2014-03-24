<?php

namespace TabletopWargaming\ValueObject\Geometry\Measurement;

class System
{
    const IMPERIAL  = 'Imperial';
    const METRIC    = 'Metric';

    const INCHES    = 'inches';
    const CM        = 'centimetres';

    const INCH_MICRO = 25400; // number of μm in an inch

    const CM_MICRO = 10000; // number of μm in a cm

    private $name;

    private $unit;

    private $base;

    private $format;

    public function __construct($name, $unit, $base, $format)
    {
        $this->name     = $name;
        $this->unit     = $unit;
        $this->base     = $base;
        $this->format   = $format;
    }

    public function __toString()
    {
        return $this->getUnit();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function render($distance)
    {
        return vsprintf($this->format, $distance);
    }

    public function toBase($distance)
    {
        return (double) $distance * $this->base;
    }

    public function toUnit($distance)
    {
        return (double) $distance / $this->base;
    }
}

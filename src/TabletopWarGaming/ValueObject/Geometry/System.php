<?php

namespace TabletopWargaming\ValueObject\Geometry;

class System
{
    const IMPERIAL = 'Imperial';
    const METRIC = 'Metric';

    const INCHES = 'inches';
    const CM = 'centimetres';

    private $name;

    private $unit;

    public function __construct($name, $unit, $format)
    {
        $this->name = $name;
        $this->unit = $unit;
        $this->format = $format;
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
}

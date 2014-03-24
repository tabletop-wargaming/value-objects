<?php

namespace TabletopWargaming\ValueObject;

use \TabletopWargaming\ValueObject\Army\Troop;

class Figure
{
    private $troop;

    public function __construct(Troop $troop)
    {
        $this->troop = $troop;
    }

    public function getTroop()
    {
        return $this->troop;
    }
}

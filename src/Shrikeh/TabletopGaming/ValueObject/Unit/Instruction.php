<?php

namespace Shrikeh\TabletopGaming\ValueObject\Unit;

class Instruction
{

    const REGULAR = 'Regular';

    const IRREGULAR = 'Irregular';

    private $instruction;

    public function __construct($instruction)
    {
        $this->instruction = $instruction;
    }

    public function getValue()
    {
        return $this->instruction;
    }
}

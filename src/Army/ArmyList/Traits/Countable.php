<?php

namespace TabletopWargaming\ValueObject\Army\ArmyList\Traits;

trait Countable
{
    public function count()
    {
        return iterator_count($this->getInnerIterator());
    }
}

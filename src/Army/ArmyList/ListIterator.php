<?php

namespace TabletopWargaming\ValueObject\Army\ArmyList;

use \FilterIterator;
use \Iterator;
use \TabletopWargaming\ValueObject\Army\ArmyList;

class ListIterator extends FilterIterator
{

    public function __construct(Iterator $iterator, Filter $filter = null) {
        $this->filter = $filter;
        parent::__construct($iterator);
    }

    public function accept()
    {
        $accept = true;
        $unit = $this->current();
        if ($filter = $this->getFilter()) {
            $accept = $filter->filter($unit);
        }
        return $accept;
    }

    public function getFilter()
    {
        return $this->filter;
    }

    public function current()
    {
        return $this->getInnerIterator()->current();
    }

    public function key() {
        return $this->getInnerIterator()->key();
    }

    public function next()
    {
        return $this->getInnerIterator()->next();
    }

    public function rewind()
    {
        return $this->getInnerIterator()->rewind();
    }

    public function valid()
    {
        return $this->getInnerIterator()->valid();
    }
}

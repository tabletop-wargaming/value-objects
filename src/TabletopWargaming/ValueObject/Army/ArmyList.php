<?php

namespace TabletopWargaming\ValueObject\Army;

use \ArrayAccess;
use \Countable;
use \OuterIterator;
use \RecursiveIterator;
use \SeekableIterator;

interface ArmyList extends ArrayAccess, Countable, OuterIterator, RecursiveIterator, SeekableIterator
{
    public function getFilter();
}

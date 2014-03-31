<?php
/**
 * Created by PhpStorm.
 * User: bhanlon
 * Date: 27/03/2014
 * Time: 11:13
 */
namespace TabletopWargaming\ValueObject;

interface Comparable
{
    const EQUAL_TO = 0;

    const GREATER_THAN = 1;

    const LESS_THAN = -1;
}
<?php
namespace Shrikeh\TabletopWargaming\ValueObject\Unit\Classification;

interface UnitType
{
    public function getName();

    public function getId();

    public function getDescription();

    public function getType();
}

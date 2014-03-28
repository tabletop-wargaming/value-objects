<?php

namespace TabletopWargaming\ValueObject\Faction;

interface GameCoalition
{
    public function getId();

    public function getName();

    public function getParent();
}

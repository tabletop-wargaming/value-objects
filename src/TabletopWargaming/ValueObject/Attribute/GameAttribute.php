<?php

namespace TabletopWargaming\ValueObject\Attribute;

interface GameAttribute
{
    public function getId();

    public function getName();

    public function getDescription();
}

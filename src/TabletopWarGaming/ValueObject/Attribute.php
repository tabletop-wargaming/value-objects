<?php

namespace TabletopWargaming\ValueObject;

use \TabletopWargaming\ValueObject\Attribute\GameAttribute;

class Attribute implements GameAttribute
{
    private $id;

    private $name;

    private $description;

    public function __construct($id, $name, $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}

<?php

namespace TabletopWargaming\ValueObject;

use \TabletopWargaming\ValueObject\Faction\GameCoalition;

class Faction implements GameCoalition
{
    private $id;

    private $name;

    private $children;

    private $parent;

    public function __construct($id, $name, array $children = array(), GameCoalition $parent = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->children = $children;
        $this->parent = $parent;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getChildren()
    {
        return $this->children;
    }
}

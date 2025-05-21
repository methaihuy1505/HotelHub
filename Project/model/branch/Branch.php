<?php

class Branch
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    // Getter
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    // Setter
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

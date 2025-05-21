<?php
class Role
{
    private $id;
    private $name;

    public function __construct($id = null, $name = null)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    // Getter và Setter cho id
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter và Setter cho name
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}

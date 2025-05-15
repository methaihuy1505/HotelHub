<?php
class Amenities
{
    protected $id;
    protected $name;
    protected $rooms = [];

    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId()
    {return $this->id;}
    public function getName()
    {return $this->name;}
    public function getRooms()
    {
        return $this->rooms;
    }

    public function setName($name)
    {$this->name = $name;return $this;}

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }
}
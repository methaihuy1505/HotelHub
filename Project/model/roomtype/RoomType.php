<?php
class RoomType
{
    protected $roomTypeId;
    protected $typeName;
    protected $describe;
    protected $priceRange;

    public function __construct($roomTypeId, $typeName, $describe, $priceRange)
    {
        $this->roomTypeId = $roomTypeId;
        $this->typeName   = $typeName;
        $this->describe   = $describe;
        $this->priceRange = $priceRange;
    }

    public function getRoomTypeId()
    {
        return $this->roomTypeId;
    }

    public function setRoomTypeId($roomTypeId)
    {
        $this->roomTypeId = $roomTypeId;
        return $this;
    }

    public function getTypeName()
    {
        return $this->typeName;
    }

    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
        return $this;
    }

    public function getDescribe()
    {
        return $this->describe;
    }

    public function setDescribe($describe)
    {
        $this->describe = $describe;
        return $this;
    }

    public function getPriceRange()
    {
        return $this->priceRange;
    }

    public function setPriceRange($priceRange)
    {
        $this->priceRange = $priceRange;
        return $this;
    }

    public function getRooms()
    {
        $roomRepository = new RoomRepository();
        $conds          = [
            "roomType" => [
                "type" => "=",
                "val"  => $this->typeId,
            ],
        ];
        $rooms = $roomRepository->getBy($conds);
        return $rooms;
    }
}
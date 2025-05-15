<?php 
class RoomType {
    protected $roomTypeId;
    protected $typeName;
    protected $describe;

     function __construct($roomTypeId, $typeName, $describe) {
        $this->roomTypeId = $roomTypeId;
        $this->typeName = $typeName;
        $this->describe = $describe;
    }

     function getRoomTypeId() {
        return $this->roomTypeId;
    }

     function setRoomTypeId($roomTypeId) {
        $this->roomTypeId = $roomTypeId;
        return $this;
    }

     function getTypeName() {
        return $this->typeName;
    }

     function setTypeName($typeName) {
        $this->typeName = $typeName;
        return $this;
    }

     function getDescribe() {
        return $this->describe;
    }

     function setDescribe($describe) {
        $this->describe = $describe;
        return $this;
    }
    
     function getRooms() {
        $roomRepository = new RoomRepository();
        $conds = [
            "roomType" => [
                "type" => "=", 
                "val" => $this->typeId
            ]
        ];
        $rooms = $roomRepository->getBy($conds);
        return $rooms;
    }
}

 
?>
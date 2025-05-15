<?php 

class ServiceType {
    private $idServiceType;
    private $typeName;
    private $describe;

    function __construct($idServiceType, $typeName, $describe) {
        $this->idServiceType = $idServiceType;
        $this->typeName = $typeName;
        $this->describe = $describe;
    }

    function getIdServiceType() { return $this->idServiceType; }
    function getTypeName() { return $this->typeName; }
    function getDescribe() { return $this->describe; }

    function setTypeName($val) { $this->typeName = $val; return $this; }
    function setDescribe($val) { $this->describe = $val; return $this; }

    function getServices() {
        $repo = new ServiceRepository();
        return $repo->getBy([
            "serviceTypeID" => [
                "type" => "=",
                "val" => $this->idServiceType
            ]
        ]);
    }
}
?>
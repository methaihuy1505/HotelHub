<?php 
class Service {
    private $serviceID;
    private $serviceName;
    private $serviceTypeID;
    private $price;
    private $describe;
    private $featured_img;

    function __construct($serviceID, $serviceName, $serviceTypeID, $price, $describe, $featured_img) {
        $this->serviceID = $serviceID;
        $this->serviceName = $serviceName;
        $this->serviceTypeID = $serviceTypeID;
        $this->price = $price;
        $this->describe = $describe;
        $this->featured_img = $featured_img;
    }

    function getServiceID() { return $this->serviceID; }
    function getServiceName() { return $this->serviceName; }
    function getServiceTypeID() { return $this->serviceTypeID; }
    function getPrice() { return $this->price; }
    function getDescribe() { return $this->describe; }
    function getFeaturedImg() { return $this->featured_img; }

    function setServiceName($val) { $this->serviceName = $val; return $this; }
    function setServiceTypeID($val) { $this->serviceTypeID = $val; return $this; }
    function setPrice($val) { $this->price = $val; return $this; }
    function setDescribe($val) { $this->describe = $val; return $this; }
    function setFeaturedImg($val) { $this->featured_img = $val; return $this; }

    function getServiceTypeDetail() {
        $repo = new ServiceTypeRepository();
        return $repo->find($this->serviceTypeID);
    }
}

?>
<?php
class BookingRoom
{
    protected $bookingRoomId;
    protected $customerNumbers;
    protected $checkinDate;
    protected $checkoutDate;
    protected $status;
    protected $roomID;
    protected $serviceID;

    public function __construct($bookingRoomId, $customerNumbers, $checkinDate, $checkoutDate, $status, $roomID, $serviceID)
    {
        $this->bookingRoomId   = $bookingRoomId;
        $this->customerNumbers = $customerNumbers;
        $this->checkinDate     = $checkinDate;
        $this->checkoutDate    = $checkoutDate;
        $this->status          = $status;
        $this->roomID          = $roomID;
        $this->serviceID       = $serviceID;
    }

    public function getBookingRoomId()
    {return $this->bookingRoomId;}
    public function getCustomerNumbers()
    {return $this->customerNumbers;}
    public function getCheckinDate()
    {return $this->checkinDate;}
    public function getCheckoutDate()
    {return $this->checkoutDate;}
    public function getStatus()
    {return $this->status;}
    public function getRoomID()
    {return $this->roomID;}
    public function getServiceID()
    {return $this->serviceID;}

    public function setCustomerNumbers($n)
    {$this->customerNumbers = $n;return $this;}
    public function setCheckinDate($date)
    {$this->checkinDate = $date;return $this;}
    public function setCheckoutDate($date)
    {$this->checkoutDate = $date;return $this;}
    public function setStatus($s)
    {$this->status = $s;return $this;}
    public function setRoomID($id)
    {$this->roomID = $id;return $this;}
    public function setServiceID($id)
    {$this->serviceID = $id;return $this;}
}
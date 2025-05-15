<?php
class BookingRoom
{
    protected $bookingRoomId;
    protected $customerNumbers;
    protected $checkinDate;
    protected $checkoutDate;
    protected $status;
    protected $userAccountID;

    protected $rooms    = [];
    protected $services = [];

    public function __construct($bookingRoomId, $customerNumbers, $checkinDate, $checkoutDate, $status, $userAccountID)
    {
        $this->bookingRoomId   = $bookingRoomId;
        $this->customerNumbers = $customerNumbers;
        $this->checkinDate     = $checkinDate;
        $this->checkoutDate    = $checkoutDate;
        $this->status          = $status;
        $this->userAccountID   = $userAccountID;
    }

    // Getters
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
    public function getUserAccountID()
    {return $this->userAccountID;}
    public function getRooms()
    {return $this->rooms;}
    public function getServices()
    {return $this->services;}

    // Setters
    public function setCustomerNumbers($n)
    {$this->customerNumbers = $n;return $this;}
    public function setCheckinDate($d)
    {$this->checkinDate = $d;return $this;}
    public function setCheckoutDate($d)
    {$this->checkoutDate = $d;return $this;}
    public function setStatus($s)
    {$this->status = $s;return $this;}
    public function setUserAccountID($id)
    {$this->userAccountID = $id;return $this;}

    public function setRooms($rooms)
    {$this->rooms = $rooms;}
    public function setServices($services)
    {$this->services = $services;}
}
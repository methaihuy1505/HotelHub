<?php
class UserAccount
{
    protected $idAccount;
    protected $fullName;
    protected $phoneNumber;
    protected $gender;
    protected $bookingRoomID;
    protected $invoiceID;
    protected $userImage;

    public function __construct($idAccount, $fullName, $phoneNumber, $gender, $bookingRoomID, $invoiceID, $userImage)
    {
        $this->idAccount     = $idAccount;
        $this->fullName      = $fullName;
        $this->phoneNumber   = $phoneNumber;
        $this->gender        = $gender;
        $this->bookingRoomID = $bookingRoomID;
        $this->invoiceID     = $invoiceID;
        $this->userImage     = $userImage;
    }

    public function getIdAccount()
    {return $this->idAccount;}
    public function getFullName()
    {return $this->fullName;}
    public function getPhoneNumber()
    {return $this->phoneNumber;}
    public function getGender()
    {return $this->gender;}
    public function getBookingRoomID()
    {return $this->bookingRoomID;}
    public function getInvoiceID()
    {return $this->invoiceID;}
    public function getUserImage()
    {return $this->userImage;}

    public function setFullName($fullName)
    {$this->fullName = $fullName;return $this;}
    public function setPhoneNumber($phoneNumber)
    {$this->phoneNumber = $phoneNumber;return $this;}
    public function setGender($gender)
    {$this->gender = $gender;return $this;}
    public function setBookingRoomID($bookingRoomID)
    {$this->bookingRoomID = $bookingRoomID;return $this;}
    public function setInvoiceID($invoiceID)
    {$this->invoiceID = $invoiceID;return $this;}
    public function setUserImage($userImage)
    {$this->userImage = $userImage;return $this;}
}
<?php
class UserAccount
{
    protected $idAccount;
    protected $fullName;
    protected $phoneNumber;
    protected $gender;
    protected $userImage;

    public function __construct($idAccount, $fullName, $phoneNumber, $gender, $userImage)
    {
        $this->idAccount   = $idAccount;
        $this->fullName    = $fullName;
        $this->phoneNumber = $phoneNumber;
        $this->gender      = $gender;
        $this->userImage   = $userImage;
    }

    public function getIdAccount()
    {
        return $this->idAccount;
    }
    public function getFullName()
    {
        return $this->fullName;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getUserImage()
    {
        return $this->userImage;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }
    public function setUserImage($userImage)
    {
        $this->userImage = $userImage;
        return $this;
    }

    public function getInvoices()
    {
        $repo = new InvoiceRepository();
        return $repo->getByUserAccountId($this->idAccount);
    }

    // Lấy danh sách booking rooms trực tiếp từ repository khi cần
    public function getBookingRooms()
    {
        $bookingRoomRepo = new BookingRoomRepository();
        return $bookingRoomRepo->getByUserAccountId($this->idAccount);
    }

    // Lấy danh sách feedback tương tự
    public function getFeedbacks()
    {
        $feedbackRepo = new FeedBackRepository();
        return $feedbackRepo->getByUserAccountId($this->idAccount);
    }
}
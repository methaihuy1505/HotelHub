<?php
class InvoiceDetail
{
    protected $invoiceDetailID;
    protected $serviceDate;
    protected $bookingRoomID;

    public function __construct($invoiceDetailID, $serviceDate, $bookingRoomID)
    {
        $this->invoiceDetailID = $invoiceDetailID;
        $this->serviceDate     = $serviceDate;
        $this->bookingRoomID   = $bookingRoomID;
    }

    public function getInvoiceDetailID()
    {return $this->invoiceDetailID;}
    public function getServiceDate()
    {return $this->serviceDate;}
    public function getBookingRoomID()
    {return $this->bookingRoomID;}

    public function setServiceDate($serviceDate)
    {$this->serviceDate = $serviceDate;return $this;}
    public function setBookingRoomID($bookingRoomID)
    {$this->bookingRoomID = $bookingRoomID;return $this;}

    public function getBookingRoom()
    {
        $repo = new BookingRoomRepository();
        return $repo->find($this->bookingRoomID);
    }
}
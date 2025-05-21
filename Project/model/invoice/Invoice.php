<?php
class Invoice
{
    protected $invoiceID;
    protected $invoiceDetailID;
    protected $discount;
    protected $tax;
    protected $finalAmount;
    protected $status;
    protected $paymentType;
    protected $invoiceDate;
    protected $paymentDate;

    public function __construct($invoiceID, $invoiceDetailID, $discount, $tax, $finalAmount, $status, $paymentType, $invoiceDate, $paymentDate)
    {
        $this->invoiceID       = $invoiceID;
        $this->invoiceDetailID = $invoiceDetailID;
        $this->discount        = $discount;
        $this->tax             = $tax;
        $this->finalAmount     = $finalAmount;
        $this->status          = $status;
        $this->paymentType     = $paymentType;
        $this->invoiceDate     = $invoiceDate;
        $this->paymentDate     = $paymentDate;
    }

    public function getInvoiceID()
    {return $this->invoiceID;}
    public function getInvoiceDetailID()
    {return $this->invoiceDetailID;}
    public function getDiscount()
    {return $this->discount;}
    public function getTax()
    {return $this->tax;}
    public function getFinalAmount()
    {return $this->finalAmount;}
    public function getStatus()
    {return $this->status;}
    public function getPaymentType()
    {return $this->paymentType;}
    public function getInvoiceDate()
    {return $this->invoiceDate;}
    public function getPaymentDate()
    {return $this->paymentDate;}

    public function setInvoiceDetailID($invoiceDetailID)
    {$this->invoiceDetailID = $invoiceDetailID;return $this;}
    public function setDiscount($discount)
    {$this->discount = $discount;return $this;}
    public function setTax($tax)
    {$this->tax = $tax;return $this;}
    public function setFinalAmount($finalAmount)
    {$this->finalAmount = $finalAmount;return $this;}
    public function setStatus($status)
    {$this->status = $status;return $this;}
    public function setPaymentType($paymentType)
    {$this->paymentType = $paymentType;return $this;}
    public function setInvoiceDate($invoiceDate)
    {$this->invoiceDate = $invoiceDate;return $this;}
    public function setPaymentDate($paymentDate)
    {$this->paymentDate = $paymentDate;return $this;}

    public function getStatusInvoiceObj()
    {
        $repo = new InvoiceStatusRepository();
        return $repo->find($this->status);
    }
    public function getPaymentTypeObj()
    {
        $repo = new PaymentTypeRepository();
        return $repo->find($this->paymentType);
    }
    public function getInvoiceDetail()
    {
        $repo = new InvoiceDetailRepository();
        return $repo->find($this->invoiceDetailID);
    }
}

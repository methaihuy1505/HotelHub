<?php
class Room
{

    protected $roomId;
    protected $roomType;
    protected $roomNumber;
    protected $discount_percent;
    protected $price;
    protected $sale_price;
    protected $status;
    protected $describe;
    protected $rating;
    protected $feedbackCount;
    protected $featured_image;
    protected $amenities = [];

    public function __construct($roomId, $roomType, $roomNumber, $discount_percent, $price, $status, $describe, $rating, $feedbackCount)
    {
        $this->roomId           = $roomId;
        $this->roomType         = $roomType;
        $this->roomNumber       = $roomNumber;
        $this->discount_percent = $discount_percent;
        $this->price            = $price;
        $this->sale_price       = $price - $price * ($discount_percent / 100);
        $this->status           = $status;
        $this->describe         = $describe;
        $this->rating           = $rating;
        $this->feedbackCount    = $feedbackCount;
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function getRoomType()
    {
        return $this->roomType;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function getDiscountPercent()
    {
        return $this->discount_percent;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSalePrice()
    {
        return $this->sale_price;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDescribe()
    {
        return $this->describe;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getFeedbackCount()
    {
        return $this->feedbackCount;
    }

    public function getFeaturedImage()
    {
        return $this->featured_image;
    }

    public function getAmenities()
    {
        return $this->amenities;
    }

    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
        return $this;
    }

    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    public function setDiscountPercent($discount_percent)
    {
        $this->discount_percent = $discount_percent;
        $this->sale_price       = $this->price - $this->price * ($discount_percent / 100);
        return $this;
    }

    public function setPrice($price)
    {
        $this->price      = $price;
        $this->sale_price = $price - $price * ($this->discount_percent / 100);
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setDescribe($describe)
    {
        $this->describe = $describe;
        return $this;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    public function setFeedbackCount($feedbackCount)
    {
        $this->feedbackCount = $feedbackCount;
        return $this;
    }

    public function setFeaturedImage($featured_image)
    {
        $this->featured_image = $featured_image;
        return $this;
    }

    public function setAmenities($amenities)
    {
        $this->amenities = $amenities;
    }

    public function getRoomTypeDetail()
    {
        $roomTypeRepo = new RoomTypeRepository();
        return $roomTypeRepo->find($this->roomType);
    }

    public function getFeedbacks()
    {
        $feedbackRepo = new FeedBackRepository();
        return $feedbackRepo->getByRoomId($this->roomId);
    }
}
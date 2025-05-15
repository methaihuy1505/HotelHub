<?php 
class Room {

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

    function __construct($roomId, $roomType, $roomNumber, $discount_percent, $price, $status, $describe, $rating, $feedbackCount) {
        $this->roomId = $roomId;
        $this->roomType = $roomType;
        $this->roomNumber = $roomNumber;
        $this->discount_percent = $discount_percent;
        $this->price = $price;
        $this->sale_price = $price - $price * ($discount_percent / 100);
        $this->status = $status;
        $this->describe = $describe;
        $this->rating = $rating;
        $this->feedbackCount = $feedbackCount;
    }

    function getRoomId() {
        return $this->roomId;
    }

    function getRoomType() {
        return $this->roomType;
    }

    function getRoomNumber() {
        return $this->roomNumber;
    }

    function getDiscountPercent() {
        return $this->discount_percent;
    }

    function getPrice() {
        return $this->price;
    }

    function getSalePrice() {
        return $this->sale_price;
    }

    function getStatus() {
        return $this->status;
    }

    function getDescribe() {
        return $this->describe;
    }

    function getRating() {
        return $this->rating;
    }

    function getFeedbackCount() {
        return $this->feedbackCount;
    }

    function setRoomType($roomType) {
        $this->roomType = $roomType;
        return $this;
    }

	 function getFeaturedImage() {
        return $this->featured_image;
    }

    function setRoomNumber($roomNumber) {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    function setDiscountPercent($discount_percent) {
        $this->discount_percent = $discount_percent;
        $this->sale_price = $this->price - $this->price * ($discount_percent / 100);
        return $this;
    }

    function setPrice($price) {
        $this->price = $price;
        $this->sale_price = $price - $price * ($this->discount_percent / 100);
        return $this;
    }

    function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    function setDescribe($describe) {
        $this->describe = $describe;
        return $this;
    }

    function setRating($rating) {
        $this->rating = $rating;
        return $this;
    }

    function setFeedbackCount($feedbackCount) {
        $this->feedbackCount = $feedbackCount;
        return $this;
    }

	function setFeaturedImage($featured_image) {
        $this->featured_image = $featured_image;
        return $this;
    }

    function getRoomTypeDetail() {
        $roomTypeRepo = new RoomTypeRepository();
        return $roomTypeRepo->find($this->roomType);
    }

    function getFeedbacks() {
        $feedbackRepo = new FeedBackRepository();
        return $feedbackRepo->getByRoomId($this->roomId);
    }
}
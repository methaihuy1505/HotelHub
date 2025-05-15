<?php 
class Feedback {
    protected $id;
    protected $roomId;
    protected $userAccount;
    protected $rate;
    protected $comment;

     function __construct($id, $roomId, $userAccount, $rate, $comment) {
        $this->id = $id;
        $this->roomId = $roomId;
        $this->userAccount = $userAccount;
        $this->rate = $rate;
        $this->comment = $comment;
    }

     function getId() {
        return $this->id;
    }

     function getRoomId() {
        return $this->roomId;
    }

     function getUserAccount() {
        return $this->userAccount;
    }

     function getRate() {
        return $this->rate;
    }

     function getComment() {
        return $this->comment;
    }

     function setRoomId($roomId) {
        $this->roomId = $roomId;
    }

     function setUserAccount($userAccount) {
        $this->userAccount = $userAccount;
    }

     function setRate($rate) {
        $this->rate = $rate;
    }

     function setComment($comment) {
        $this->comment = $comment;
    }
}
?>
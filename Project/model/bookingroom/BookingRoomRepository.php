<?php

class BookingRoomRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $items = [];
        $sql   = "SELECT * FROM bookingroom";
        if ($condition) {
            $sql .= " WHERE $condition";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = new BookingRoom(
                    $row['bookingRoomId'],
                    $row['customerNumbers'],
                    $row['checkinDate'],
                    $row['checkoutDate'],
                    $row['status'],
                    $row['roomID'],
                    $row['serviceID']
                );
                $items[] = $item;
            }
        }
        return $items;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($bookingRoomId)
    {
        $condition = "bookingRoomId = '$bookingRoomId'";
        $items     = $this->fetchAll($condition);
        return current($items);
    }

    public function save($data)
    {
        global $conn;
        $bookingRoomId   = $data['bookingRoomId'];
        $customerNumbers = $data['customerNumbers'];
        $checkinDate     = $data['checkinDate'];
        $checkoutDate    = $data['checkoutDate'];
        $status          = $data['status'];
        $roomID          = $data['roomID'];
        $serviceID       = $data['serviceID'];

        $sql = "INSERT INTO bookingroom (bookingRoomId, customerNumbers, checkinDate, checkoutDate, status, roomID, serviceID) VALUES ('$bookingRoomId', $customerNumbers, '$checkinDate', '$checkoutDate', '$status', '$roomID', '$serviceID')";

        if ($conn->query($sql) === true) {
            return $bookingRoomId;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($bookingRoom)
    {
        global $conn;
        $bookingRoomId   = $bookingRoom->getBookingRoomId();
        $customerNumbers = $bookingRoom->getCustomerNumbers();
        $checkinDate     = $bookingRoom->getCheckinDate();
        $checkoutDate    = $bookingRoom->getCheckoutDate();
        $status          = $bookingRoom->getStatus();
        $roomID          = $bookingRoom->getRoomID();
        $serviceID       = $bookingRoom->getServiceID();

        $sql = "UPDATE bookingroom SET customerNumbers=$customerNumbers, checkinDate='$checkinDate', checkoutDate='$checkoutDate', status='$status', roomID='$roomID', serviceID='$serviceID' WHERE bookingRoomId='$bookingRoomId'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($bookingRoom)
    {
        global $conn;
        $bookingRoomId = $bookingRoom->getBookingRoomId();
        $sql           = "DELETE FROM bookingroom WHERE bookingRoomId='$bookingRoomId'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
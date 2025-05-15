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
        if ($result && $result->num_rows > 0) {
            $roomMapRepo    = new BookingRoomMapRepository();
            $serviceMapRepo = new BookingServiceMapRepository();

            while ($row = $result->fetch_assoc()) {
                $item = new BookingRoom(
                    $row['bookingRoomId'],
                    $row['customerNumbers'],
                    $row['checkinDate'],
                    $row['checkoutDate'],
                    $row['status'],
                    $row['userAccountID']
                );

                // Lấy danh sách room và service
                $item->setRooms($roomMapRepo->getRoomsByBooking($row['bookingRoomId']));
                $item->setServices($serviceMapRepo->getServicesByBooking($row['bookingRoomId']));

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

    public function getByUserAccountId($userAccountID)
    {
        $condition = "userAccountID = '$userAccountID'";
        return $this->fetchAll($condition);
    }

    public function save($data)
    {
        global $conn;
        $bookingRoomId   = $data['bookingRoomId'];
        $customerNumbers = $data['customerNumbers'];
        $checkinDate     = $data['checkinDate'];
        $checkoutDate    = $data['checkoutDate'];
        $status          = $data['status'];
        $userAccountID   = $data['userAccountID'];

        $sql = "INSERT INTO bookingroom (bookingRoomId, customerNumbers, checkinDate, checkoutDate, status, userAccountID)
                VALUES ('$bookingRoomId', $customerNumbers, '$checkinDate', '$checkoutDate', '$status', $userAccountID)";

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
        $userAccountID   = $bookingRoom->getUserAccountID();

        $sql = "UPDATE bookingroom
                SET customerNumbers = $customerNumbers,
                    checkinDate = '$checkinDate',
                    checkoutDate = '$checkoutDate',
                    status = '$status',
                    userAccountID = $userAccountID
                WHERE bookingRoomId = '$bookingRoomId'";

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
        $sql           = "DELETE FROM bookingroom WHERE bookingRoomId = '$bookingRoomId'";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
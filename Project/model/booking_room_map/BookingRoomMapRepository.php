<?php
class BookingRoomMapRepository extends BaseRepository
{
    // Gán phòng vào một booking
    public function addRoomToBooking($bookingRoomId, $roomId)
    {
        global $conn;
        $sql = "INSERT INTO booking_room_map (bookingRoomId, roomId) VALUES ($bookingRoomId, $roomId)";
        return $conn->query($sql);
    }

    // Xóa phòng khỏi booking
    public function removeRoomFromBooking($bookingRoomId, $roomId)
    {
        global $conn;
        $sql = "DELETE FROM booking_room_map WHERE bookingRoomId = $bookingRoomId AND roomId = $roomId";
        return $conn->query($sql);
    }

    // Lấy danh sách phòng của 1 booking
    public function getRoomsByBooking($bookingRoomId)
    {
        global $conn;
        $sql = "SELECT r.* FROM room r
                JOIN booking_room_map m ON r.roomId = m.roomId
                WHERE m.bookingRoomId = $bookingRoomId";

        $result = $conn->query($sql);
        $rooms  = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rooms[] = new Room(
                    $row['roomId'],
                    $row['roomType'],
                    $row['roomNumber'],
                    $row['price'],
                    $row['status'],
                    $row['describeDetail'],
                    $row['discount_percent'],
                    $row['sale_price'],
                    $row['rating'],
                    $row['featured_image'],
                    $row['feedbackCount']
                );
            }
        }

        return $rooms;
    }
}
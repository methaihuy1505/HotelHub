<?php
class BookingServiceMapRepository extends BaseRepository
{
    // Thêm dịch vụ vào booking
    public function addServiceToBooking($bookingRoomId, $serviceId)
    {
        global $conn;
        $sql = "INSERT INTO booking_service_map (bookingRoomId, serviceID) VALUES ($bookingRoomId, $serviceId)";
        return $conn->query($sql);
    }

    // Xóa dịch vụ khỏi booking
    public function removeServiceFromBooking($bookingRoomId, $serviceId)
    {
        global $conn;
        $sql = "DELETE FROM booking_service_map WHERE bookingRoomId = $bookingRoomId AND serviceID = $serviceId";
        return $conn->query($sql);
    }

    // Lấy danh sách dịch vụ của một booking
    public function getServicesByBooking($bookingRoomId)
    {
        global $conn;
        $sql = "SELECT s.* FROM service s
                JOIN booking_service_map m ON s.serviceID = m.serviceID
                WHERE m.bookingRoomId = $bookingRoomId";

        $result   = $conn->query($sql);
        $services = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $services[] = new Service(
                    $row['serviceID'],
                    $row['serviceName'],
                    $row['serviceTypeID'],
                    $row['price'],
                    $row['describeDetail'],
                    $row['featured_img']
                );
            }
        }

        return $services;
    }
}
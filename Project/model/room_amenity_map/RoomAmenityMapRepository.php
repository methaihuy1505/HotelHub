<?php
class RoomAmenityMapRepository extends BaseRepository
{
    public function addAmenityToRoom($roomId, $amenityId)
    {
        global $conn;
        $sql = "INSERT INTO room_amenity_map (room_id, amenity_id) VALUES ($roomId, $amenityId)";
        return $conn->query($sql);
    }

    public function removeAmenityFromRoom($roomId, $amenityId)
    {
        global $conn;
        $sql = "DELETE FROM room_amenity_map WHERE room_id = $roomId AND amenity_id = $amenityId";
        return $conn->query($sql);
    }

    public function getAmenitiesByRoom($roomId)
    {
        global $conn;
        $sql = "SELECT a.* FROM amenities a
                JOIN room_amenity_map m ON a.id = m.amenity_id
                WHERE m.room_id = $roomId";

        $result    = $conn->query($sql);
        $amenities = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $amenities[] = new Amenities($row['id'], $row['name']);
            }
        }

        return $amenities;
    }

    public function getRoomsByAmenity($amenityId)
    {
        global $conn;
        $sql = "SELECT r.* FROM room r
                JOIN room_amenity_map m ON r.roomId = m.room_id
                WHERE m.amenity_id = $amenityId";

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
                    $row['describe'],
                    $row['discount_percent'],
                    $row['sale_price'],
                    $row['rating'],
                    $row['feedbackCount'],
                    $row['featured_image']
                );
            }
        }

        return $rooms;
    }
}
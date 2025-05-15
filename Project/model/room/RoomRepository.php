<?php
class RoomRepository extends BaseRepository
{

    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $rooms = [];

        $sql = "SELECT * FROM room";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        if ($sort) {
            $sql .= " $sort";
        }
        if ($limit) {
            $sql .= " $limit";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $roomMapRepo = new RoomAmenityMapRepository();
            while ($row = $result->fetch_assoc()) {
                $room = new Room(
                    $row["roomId"], $row["roomType"], $row["roomNumber"],
                    $row["discount_percent"], $row["price"], $row["status"],
                    $row["describeDetail"], $row["rating"], $row["feedbackCount"],
                    $row["featured_image"]
                );
                $amenities = $roomMapRepo->getAmenitiesByRoomId($row["roomId"]);
                $room->setAmenities($amenities);
                $rooms[] = $room;
            }
        }

        return $rooms;
    }

    public function getAll()
    {
        return $this->getBy();
    }

    public function getBy($array_conds = [], $array_sorts = [], $page = null, $qty_per_page = null)
    {
        if ($page) {
            $page_index = $page - 1;
        }

        $temp = [];
        foreach ($array_conds as $column => $cond) {
            $type = $cond['type'];
            $val  = $cond['val'];
            $str  = "$column $type ";
            if (in_array($type, ["BETWEEN", "LIKE"])) {
                $str .= "$val";
            } else {
                $str .= "'$val'";
            }
            $temp[] = $str;
        }
        $condition = count($temp) ? implode(" AND ", $temp) : null;

        $temp = [];
        foreach ($array_sorts as $key => $sort) {
            $temp[] = "$key $sort";
        }
        $sort = count($temp) ? "ORDER BY " . implode(" , ", $temp) : null;

        $limit = null;
        if ($qty_per_page) {
            $start = $page_index * $qty_per_page;
            $limit = "LIMIT $start, $qty_per_page";
        }

        return $this->fetchAll($condition, $sort, $limit);
    }

    public function find($id)
    {
        $condition = "roomId = $id";
        $rooms     = $this->fetchAll($condition);
        return current($rooms);
    }

    public function save($data)
    {
        global $conn;
        $roomType         = $data["roomType"];
        $roomNumber       = $data["roomNumber"];
        $discount_percent = $data["discount_percent"];
        $price            = $data["price"];
        $status           = $data["status"];
        $describe         = $data["describeDetail"];
        $rating           = $data["rating"];
        $feedbackCount    = $data["feedbackCount"];
        $featured_image   = $data["featured_image"];

        $sql = "INSERT INTO room (roomType, roomNumber, discount_percent, price, status, describeDetail, rating, feedbackCount, featured_image)
                VALUES ($roomType, '$roomNumber', $discount_percent, $price, '$status', '$describe', $rating, $feedbackCount, '$featured_image')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(Room $room)
    {
        global $conn;

        $roomId           = $room->getId();
        $roomType         = $room->getRoomTypeId();
        $roomNumber       = $room->getRoomNumber();
        $discount_percent = $room->getDiscountPercent();
        $price            = $room->getPrice();
        $status           = $room->getStatus();
        $describe         = $room->getDescription();
        $rating           = $room->getRating();
        $feedbackCount    = $room->getFeedbackCount();
        $featured_image   = $room->getFeaturedImage();

        $sql = "UPDATE room SET
                roomType = $roomType,
                roomNumber = '$roomNumber',
                discount_percent = $discount_percent,
                price = $price,
                status = '$status',
                describeDetail = '$describe',
                rating = $rating,
                feedbackCount = $feedbackCount,
                featured_image = '$featured_image'
                WHERE roomId = $roomId";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(Room $room)
    {
        global $conn;
        $roomId = $room->getId();
        $sql    = "DELETE FROM room WHERE roomId = $roomId";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function getByPattern($pattern)
    {
        $condition = "roomNumber LIKE '%$pattern%'";
        return $this->fetchAll($condition);
    }
}
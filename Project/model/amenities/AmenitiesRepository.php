<?php

class AmenitiesRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $amenities = [];
        $sql       = "SELECT * FROM amenities";
        if ($condition) {
            $sql .= " WHERE $condition";
        }

        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $roomMapRepo = new RoomAmenityMapRepository();
            while ($row = $result->fetch_assoc()) {
                $amenity = new Amenities($row['id'], $row['name']);
                $rooms   = $roomMapRepo->getRoomsByAmenity($row['id']);
                $amenity->setRooms($rooms);
                $amenities[] = $amenity;
            }
        }
        return $amenities;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($id)
    {
        $condition = "id = $id";
        $result    = $this->fetchAll($condition);
        return current($result);
    }

    public function save($data)
    {
        global $conn;
        $name = $data['name'];
        $sql  = "INSERT INTO amenities (name) VALUES ('$name')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($amenity)
    {
        global $conn;
        $id   = $amenity->getId();
        $name = $amenity->getName();
        $sql  = "UPDATE amenities SET name = '$name' WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($amenity)
    {
        global $conn;
        $id  = $amenity->getId();
        $sql = "DELETE FROM amenities WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
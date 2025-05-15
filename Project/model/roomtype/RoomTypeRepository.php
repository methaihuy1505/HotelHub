<?php

class RoomTypeRepository extends BaseRepository
{

    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $roomTypes = [];

        $sql = "SELECT * FROM roomtype";
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
            while ($row = $result->fetch_assoc()) {
                $roomType = new RoomType(
                    $row["roomTypeId"],
                    $row["typeName"],
                    $row["roomDescribe"],
                    $row["priceRange"]// Lấy dữ liệu priceRange
                );
                $roomTypes[] = $roomType;
            }
        }

        return $roomTypes;
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
        $condition = "roomTypeId = $id";
        $roomTypes = $this->fetchAll($condition);
        return current($roomTypes);
    }

    public function save($data)
    {
        global $conn;
        $typeName   = $data["typeName"];
        $describe   = $data["roomDescribe"];
        $priceRange = $data["priceRange"]; // Lấy giá trị priceRange từ dữ liệu đầu vào

        $sql = "INSERT INTO roomtype (typeName, roomDescribe, priceRange) VALUES ('$typeName', '$describe', '$priceRange')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(RoomType $roomType)
    {
        global $conn;
        $id         = $roomType->getRoomTypeId();
        $typeName   = $roomType->getTypeName();
        $describe   = $roomType->getDescribe();
        $priceRange = $roomType->getPriceRange(); // Thêm priceRange vào truy vấn

        $sql = "UPDATE roomtype SET
                typeName='$typeName',
                roomDescribe='$describe',
                priceRange='$priceRange'
                WHERE roomTypeId=$id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(RoomType $roomType)
    {
        global $conn;
        $id  = $roomType->getRoomTypeId();
        $sql = "DELETE FROM roomtype WHERE roomTypeId=$id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
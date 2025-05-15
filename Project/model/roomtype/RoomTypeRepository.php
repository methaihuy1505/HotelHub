<?php
class RoomTypeRepository extends BaseRepository {

    protected function fetchAll($condition = null, $sort = null, $limit = null) {
        global $conn;
        $roomTypes = array();

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
                    $row["describe"]
                );
                $roomTypes[] = $roomType;
            }
        }

        return $roomTypes;
    }

    public function getAll() {
        return $this->getBy();
    }

    public function getBy($array_conds = array(), $array_sorts = array(), $page = null, $qty_per_page = null) {
        if ($page) {
            $page_index = $page - 1;
        }

        $temp = array();
        foreach($array_conds as $column => $cond) {
            $type = $cond['type'];
            $val = $cond['val'];
            $str = "$column $type ";
            if (in_array($type, array("BETWEEN", "LIKE"))) {
                $str .= "$val";
            } else {
                $str .= "'$val'";
            }
            $temp[] = $str;
        }

        $condition = count($temp) ? implode(" AND ", $temp) : null;

        $temp = array();
        foreach($array_sorts as $key => $sort) {
            $temp[] = "$key $sort";
        }
        $sort = count($temp) ? "ORDER BY ". implode(" , ", $temp) : null;

        $limit = null;
        if ($qty_per_page) {
            $start = $page_index * $qty_per_page;
            $limit = "LIMIT $start, $qty_per_page";
        }

        return $this->fetchAll($condition, $sort, $limit);
    }

    public function find($id) {
        $condition = "roomTypeId = $id";
        $roomTypes = $this->fetchAll($condition);
        return current($roomTypes);
    }

    public function save($data) {
        global $conn;
        $typeName = $data["typeName"];
        $describe = $data["describe"];

        $sql = "INSERT INTO roomtype (typeName, describe) VALUES ('$typeName', '$describe')";

        if ($conn->query($sql) === TRUE) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(RoomType $roomType) {
        global $conn;
        $id = $roomType->getRoomTypeId();
        $typeName = $roomType->getTypeName();
        $describe = $roomType->getDescribe();

        $sql = "UPDATE roomtype SET 
                typeName='$typeName',
                describe='$describe'
                WHERE roomTypeId=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(RoomType $roomType) {
        global $conn;
        $id = $roomType->getRoomTypeId();
        $sql = "DELETE FROM roomtype WHERE roomTypeId=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
?>
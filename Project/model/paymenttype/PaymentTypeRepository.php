<?php
// Class PaymentTypeRepository
class PaymentTypeRepository extends BaseRepository
{
    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $paymentTypes = [];

        $sql = "SELECT * FROM paymenttype";
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

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $paymentType    = new PaymentType($row['id'], $row['name']);
                $paymentTypes[] = $paymentType;
            }
        }

        return $paymentTypes;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function getBy($array_conds = [], $array_sorts = [], $page = null, $qty_per_page = null)
    {
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
        if ($page !== null && $qty_per_page !== null) {
            $page_index = max(0, $page - 1);
            $start      = $page_index * $qty_per_page;
            $limit      = "LIMIT $start, $qty_per_page";
        }

        return $this->fetchAll($condition, $sort, $limit);
    }

    public function find($id)
    {
        $condition    = "id = $id";
        $paymentTypes = $this->fetchAll($condition);
        return current($paymentTypes);
    }

    public function save($data)
    {
        global $conn;
        $name = $data['name'] ?? '';

        $sql = "INSERT INTO paymenttype (name) VALUES ('$name')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(PaymentType $paymentType)
    {
        global $conn;
        $id   = $paymentType->getId();
        $name = $paymentType->getName();

        $sql = "UPDATE paymenttype SET name = '$name' WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(PaymentType $paymentType)
    {
        global $conn;
        $id = $paymentType->getId();

        $sql = "DELETE FROM paymenttype WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}

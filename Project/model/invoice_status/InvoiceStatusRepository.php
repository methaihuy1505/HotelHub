<?php
class InvoiceStatusRepository extends BaseRepository
{
    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $statuses = [];

        $sql = "SELECT * FROM invoice_status";
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
                $status     = new InvoiceStatus($row['id'], $row['name']);
                $statuses[] = $status;
            }
        }

        return $statuses;
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
        $condition = "id = $id";
        $statuses  = $this->fetchAll($condition);
        return current($statuses);
    }

    public function save($data)
    {
        global $conn;
        $name = $data['name'] ?? '';

        $sql = "INSERT INTO invoice_status (name) VALUES ('$name')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(InvoiceStatus $status)
    {
        global $conn;
        $id   = $status->getId();
        $name = $status->getName();

        $sql = "UPDATE invoice_status SET name = '$name' WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(InvoiceStatus $status)
    {
        global $conn;
        $id = $status->getId();

        $sql = "DELETE FROM invoice_status WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}

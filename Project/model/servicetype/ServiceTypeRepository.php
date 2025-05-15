<?php
class ServiceTypeRepository extends BaseRepository
{
    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $types = [];
        $sql   = "SELECT * FROM servicetype";

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
                $type    = new ServiceType($row["idServiceType"], $row["typeName"], $row["serviceDescribe"]);
                $types[] = $type;
            }
        }

        return $types;
    }

    public function find($id)
    {
        $condition = "idServiceType = $id";
        $types     = $this->fetchAll($condition);
        return current($types);
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
            // Nếu kiểu điều kiện là BETWEEN hoặc LIKE thì giữ nguyên val, còn lại thêm dấu nháy đơn
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

    public function save($data)
    {
        global $conn;
        $sql = "INSERT INTO servicetype (typeName, serviceDescribe)
                VALUES ('{$data['typeName']}', '{$data['serviceDescribe']}')";
        return $conn->query($sql) ? $conn->insert_id : false;
    }

    public function update(ServiceType $type)
    {
        global $conn;
        $sql = "UPDATE servicetype SET
                typeName = '{$type->getTypeName()}',
                serviceDescribe = '{$type->getDescribe()}'
                WHERE idServiceType = {$type->getIdServiceType()}";
        return $conn->query($sql);
    }

    public function delete(ServiceType $type)
    {
        global $conn;
        $sql = "DELETE FROM servicetype WHERE idServiceType = {$type->getIdServiceType()}";
        return $conn->query($sql);
    }
}
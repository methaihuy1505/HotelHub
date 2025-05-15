<?php

class ServiceRepository extends BaseRepository
{
    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $services = [];
        $sql      = "SELECT * FROM service";

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
                $service = new Service(
                    $row["serviceID"], $row["serviceName"], $row["serviceTypeID"],
                    $row["price"], $row["describeDetail"], $row["featured_img"]
                );
                $services[] = $service;
            }
        }

        return $services;
    }

    public function find($id)
    {
        $condition = "serviceID = $id";
        $services  = $this->fetchAll($condition);
        return current($services);
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
        $sql = "INSERT INTO service (serviceName, serviceTypeID, price, describeDetail, featured_img)
                VALUES ('{$data['serviceName']}', '{$data['serviceTypeID']}', '{$data['price']}',
                        '{$data['describeDetail']}', '{$data['featured_img']}')";
        return $conn->query($sql) ? $conn->insert_id : false;
    }

    public function update(Service $service)
    {
        global $conn;
        $sql = "UPDATE service SET
                serviceName = '{$service->getServiceName()}',
                serviceTypeID = '{$service->getServiceTypeID()}',
                price = '{$service->getPrice()}',
                describeDetail = '{$service->getDescribe()}',
                featured_img = '{$service->getFeaturedImg()}'
                WHERE serviceID = {$service->getServiceID()}";
        return $conn->query($sql);
    }

    public function delete(Service $service)
    {
        global $conn;
        $sql = "DELETE FROM service WHERE serviceID = {$service->getServiceID()}";
        return $conn->query($sql);
    }
}
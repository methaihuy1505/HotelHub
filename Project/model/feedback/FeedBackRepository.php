<?php

class FeedbackRepository extends BaseRepository
{

    protected function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $feedbacks = [];

        $sql = "SELECT * FROM feedback";
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
                $feedback = new Feedback(
                    $row["id"],
                    $row["roomID"],
                    $row["userAccount"],
                    $row["rate"],
                    $row["comment"]
                );
                $feedbacks[] = $feedback;
            }
        }

        return $feedbacks;
    }

    public function getAll()
    {
        return $this->fetchAll();
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
    public function getByRoomId($roomId)
    {
        $condition = "roomID = $roomId";
        return $this->fetchAll($condition);
    }
    public function getByUserAccountId($userAccountID)
    {
        $condition = "userAccount = $userAccountID";
        return $this->fetchAll($condition);
    }

    public function find($id)
    {
        $condition = "id = $id";
        $feedbacks = $this->fetchAll($condition);
        return current($feedbacks);
    }

    public function save($data)
    {
        global $conn;

        $roomID      = $data["roomID"];
        $userAccount = $data["userAccount"];
        $rate        = $data["rate"];
        $comment     = $data["comment"];

        $sql = "INSERT INTO feedback (roomID, userAccount, rate, comment)
                VALUES ($roomID, '$userAccount', $rate, '$comment')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(Feedback $feedback)
    {
        global $conn;

        $id          = $feedback->getId();
        $roomID      = $feedback->getRoomId();
        $userAccount = $feedback->getUserAccount();
        $rate        = $feedback->getRate();
        $comment     = $feedback->getComment();

        $sql = "UPDATE feedback SET
                roomID = $roomID,
                userAccount = '$userAccount',
                rate = $rate,
                comment = '$comment'
                WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(Feedback $feedback)
    {
        global $conn;
        $id = $feedback->getId();

        $sql = "DELETE FROM feedback WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
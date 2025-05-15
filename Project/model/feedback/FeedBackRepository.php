<?php

class FeedbackRepository extends BaseRepository {

    protected function fetchAll($condition = null, $sort = null, $limit = null) {
        global $conn;
        $feedbacks = array();

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

    function getAll() {
        return $this->fetchAll();
    }

    function getByRoomId($roomId) {
        $condition = "roomID = $roomId";
        return $this->fetchAll($condition);
    }

    function find($id) {
        $condition = "id = $id";
        $feedbacks = $this->fetchAll($condition);
        return current($feedbacks);
    }

    function save($data) {
        global $conn;

        $roomID = $data["roomID"];
        $userAccount = $data["userAccount"];
        $rate = $data["rate"];
        $comment = $data["comment"];

        $sql = "INSERT INTO feedback (roomID, userAccount, rate, comment)
                VALUES ($roomID, '$userAccount', $rate, '$comment')";

        if ($conn->query($sql) === TRUE) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    function update(Feedback $feedback) {
        global $conn;

        $id = $feedback->getId();
        $roomID = $feedback->getRoomId();
        $userAccount = $feedback->getUserAccount();
        $rate = $feedback->getRate();
        $comment = $feedback->getComment();

        $sql = "UPDATE feedback SET
                roomID = $roomID,
                userAccount = '$userAccount',
                rate = $rate,
                comment = '$comment'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    function delete(Feedback $feedback) {
        global $conn;
        $id = $feedback->getId();

        $sql = "DELETE FROM feedback WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
?>
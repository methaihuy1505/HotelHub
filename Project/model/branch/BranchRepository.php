<?php
class BranchRepository extends BaseRepository
{
    public function getAll()
    {
        global $conn;
        $branches = [];
        $sql      = "SELECT * FROM branch";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $branch     = new Branch($row['id'], $row['name']);
                $branches[] = $branch;
            }
        }

        return $branches;
    }

    public function find($id)
    {
        global $conn;
        $sql    = "SELECT * FROM branch WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Branch($row['id'], $row['name']);
        }

        return null;
    }

    public function save($branch)
    {
        global $conn;
        $name = $branch->getName();

        $sql = "INSERT INTO branch (name) VALUES ('$name')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($branch)
    {
        global $conn;
        $id   = $branch->getId();
        $name = $branch->getName();

        $sql = "UPDATE branch SET name = '$name' WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($branch)
    {
        global $conn;
        $id = $branch->getId();

        $sql = "DELETE FROM branch WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}

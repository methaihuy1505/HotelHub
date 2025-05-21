<?php
class RoleRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $roles = [];
        $sql   = "SELECT * FROM role";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $role    = new Role($row['id'], $row['name']);
                $roles[] = $role;
            }
        }

        return $roles;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($id)
    {
        $condition = "id = $id";
        $roles     = $this->fetchAll($condition);
        return current($roles);
    }

    public function save($data)
    {
        global $conn;
        $name = $data['name'];

        $sql = "INSERT INTO role (name) VALUES ('$name')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update(Role $role)
    {
        global $conn;
        $id   = $role->getId();
        $name = $role->getName();

        $sql = "UPDATE role SET name = '$name' WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete(Role $role)
    {
        global $conn;
        $id = $role->getId();

        $sql = "DELETE FROM role WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        }

        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}

<?php
class UserRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $users = [];
        $sql   = "SELECT * FROM user";
        if ($condition) {
            $sql .= " WHERE $condition";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User(
                    $row['loginID'],
                    $row['password'],
                    $row['email'],
                    $row['userAccountID'],
                    $row['loginBy'],
                    $row['isActive'],
                    (int) $row['role']// ép kiểu int luôn
                );
                $users[] = $user;
            }
        }
        return $users;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($loginID)
    {
        $condition = "loginID = '$loginID'";
        $users     = $this->fetchAll($condition);
        return current($users);
    }

    public function findEmailAndPassword($email, $password)
    {
        $condition = "email = '$email' AND password = '$password'";
        $users     = $this->fetchAll($condition);
        return current($users);
    }

    public function save($data)
    {
        global $conn;
        $loginID       = $data['loginID'];
        $password      = $data['password'];
        $email         = $data['email'];
        $userAccountID = $data['userAccountID'];
        $loginBy       = $data['loginBy'];
        $isActive      = $data['isActive'] ?? 0;
        $role          = $data['role'];

        $sql = "INSERT INTO user (loginID, password, email, userAccountID, loginBy, isActive, role)
                VALUES ('$loginID', '$password', '$email', '$userAccountID', '$loginBy', $isActive, $role)";

        if ($conn->query($sql) === true) {
            return $loginID;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($user)
    {
        global $conn;
        $loginID       = $user->getLoginID();
        $password      = $user->getPassword();
        $email         = $user->getEmail();
        $userAccountID = $user->getUserAccountID();
        $loginBy       = $user->getLoginBy();
        $isActive      = $user->getIsActive();
        $role          = $user->getRole();

        $sql = "UPDATE user SET password='$password', email='$email', userAccountID='$userAccountID',
                loginBy='$loginBy', isActive=$isActive, role=$role WHERE loginID='$loginID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($user)
    {
        global $conn;
        $loginID = $user->getLoginID();
        $sql     = "DELETE FROM user WHERE loginID='$loginID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}

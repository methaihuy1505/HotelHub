<?php
class UserAccountRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $userAccounts = [];
        $sql          = "SELECT * FROM useraccount";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userAccount = new UserAccount(
                    $row['idAccount'],
                    $row['fullName'],
                    $row['phoneNumber'],
                    $row['gender'],
                    $row['userImage']
                );
                $userAccounts[] = $userAccount;
            }
        }
        return $userAccounts;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($idAccount)
    {
        $condition    = "idAccount = '$idAccount'";
        $userAccounts = $this->fetchAll($condition);
        return current($userAccounts) ?: null;
    }

    public function save($data)
    {
        global $conn;
        $fullName    = $conn->real_escape_string($data['fullName']);
        $phoneNumber = $conn->real_escape_string($data['phoneNumber']);
        $gender      = $conn->real_escape_string($data['gender']);
        $userImage   = $conn->real_escape_string($data['userImage']);

        $sql = "INSERT INTO useraccount (fullName, phoneNumber, gender, userImage)
                VALUES ('$fullName', '$phoneNumber', '$gender', '$userImage')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($userAccount)
    {
        global $conn;
        $idAccount   = $conn->real_escape_string($userAccount->getIdAccount());
        $fullName    = $conn->real_escape_string($userAccount->getFullName());
        $phoneNumber = $conn->real_escape_string($userAccount->getPhoneNumber());
        $gender      = $conn->real_escape_string($userAccount->getGender());
        $userImage   = $conn->real_escape_string($userAccount->getUserImage());

        $sql = "UPDATE useraccount SET
                    fullName = '$fullName',
                    phoneNumber = '$phoneNumber',
                    gender = '$gender',
                    userImage = '$userImage'
                WHERE idAccount = '$idAccount'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($userAccount)
    {
        global $conn;
        $idAccount = $conn->real_escape_string($userAccount->getIdAccount());
        $sql       = "DELETE FROM useraccount WHERE idAccount='$idAccount'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
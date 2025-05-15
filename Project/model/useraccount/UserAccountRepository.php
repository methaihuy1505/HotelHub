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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userAccount = new UserAccount(
                    $row['idAccount'],
                    $row['fullName'],
                    $row['phoneNumber'],
                    $row['gender'],
                    $row['bookingRoomID'],
                    $row['invoiceID'],
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
        return current($userAccounts);
    }

    public function save($data)
    {
        global $conn;
        $fullName      = $data['fullName'];
        $phoneNumber   = $data['phoneNumber'];
        $gender        = $data['gender'];
        $bookingRoomID = $data['bookingRoomID'] ?? 'NULL';
        $invoiceID     = $data['invoiceID'] ?? 'NULL';
        $userImage     = $data['userImage'];

        $bookingRoomID = $bookingRoomID === null ? "NULL" : "'$bookingRoomID'";
        $invoiceID     = $invoiceID === null ? "NULL" : "'$invoiceID'";

        $sql = "INSERT INTO useraccount (fullName, phoneNumber, gender, bookingRoomID, invoiceID, userImage)
                VALUES ('$fullName', '$phoneNumber', '$gender', $bookingRoomID, $invoiceID, '$userImage')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($userAccount)
    {
        global $conn;
        $idAccount     = $userAccount->getIdAccount();
        $fullName      = $userAccount->getFullName();
        $phoneNumber   = $userAccount->getPhoneNumber();
        $gender        = $userAccount->getGender();
        $bookingRoomID = $userAccount->getBookingRoomID();
        $invoiceID     = $userAccount->getInvoiceID();
        $userImage     = $userAccount->getUserImage();

        $bookingRoomID = empty($bookingRoomID) ? "NULL" : "'$bookingRoomID'";
        $invoiceID     = empty($invoiceID) ? "NULL" : "'$invoiceID'";

        $sql = "UPDATE useraccount SET fullName='$fullName', phoneNumber='$phoneNumber', gender='$gender',
                bookingRoomID=$bookingRoomID, invoiceID=$invoiceID, userImage='$userImage' WHERE idAccount='$idAccount'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($userAccount)
    {
        global $conn;
        $idAccount = $userAccount->getIdAccount();
        $sql       = "DELETE FROM useraccount WHERE idAccount='$idAccount'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
<?php
class InvoiceDetailRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $invoiceDetails = [];
        $sql            = "SELECT * FROM invoicedetail";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $invoiceDetail = new InvoiceDetail(
                    $row['invoiceDetailID'],
                    $row['serviceDate'],
                    $row['bookingRoomID']
                );
                $invoiceDetails[] = $invoiceDetail;
            }
        }
        return $invoiceDetails;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find($invoiceDetailID)
    {
        $condition      = "invoiceDetailID = '$invoiceDetailID'";
        $invoiceDetails = $this->fetchAll($condition);
        return current($invoiceDetails);
    }

    public function save($data)
    {
        global $conn;
        $serviceDate   = $data['serviceDate'];
        $bookingRoomID = $data['bookingRoomID'];

        $sql = "INSERT INTO invoicedetail (serviceDate, bookingRoomID) VALUES ('$serviceDate', '$bookingRoomID')";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($invoiceDetail)
    {
        global $conn;
        $invoiceDetailID = $invoiceDetail->getInvoiceDetailID();
        $serviceDate     = $invoiceDetail->getServiceDate();
        $bookingRoomID   = $invoiceDetail->getBookingRoomID();

        $sql = "UPDATE invoicedetail SET serviceDate='$serviceDate', bookingRoomID='$bookingRoomID' WHERE invoiceDetailID='$invoiceDetailID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($invoiceDetail)
    {
        global $conn;
        $invoiceDetailID = $invoiceDetail->getInvoiceDetailID();
        $sql             = "DELETE FROM invoicedetail WHERE invoiceDetailID='$invoiceDetailID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
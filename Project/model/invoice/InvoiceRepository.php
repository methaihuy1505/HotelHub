<?php
class InvoiceRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $invoices = [];
        $sql      = "SELECT * FROM invoice";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $invoice = new Invoice(
                    $row['invoiceID'],
                    $row['invoiceDetailID'],
                    $row['discount'],
                    $row['tax'],
                    $row['finalAmount'],
                    $row['status'],
                    $row['paymentType'],
                    $row['invoiceDate'],
                    $row['paymentDate']
                );
                $invoices[] = $invoice;
            }
        }
        return $invoices;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function getByUserAccountId($userAccountId)
    {
        global $conn;

        $invoices = [];

        $sql = "
        SELECT i.*
        FROM invoice i
        JOIN invoicedetail id ON i.invoiceDetailID = id.invoiceDetailID
        JOIN bookingroom b ON id.bookingRoomID = b.bookingRoomID
        WHERE b.userAccountID = '$userAccountId'
    ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $invoice = new Invoice(
                    $row['invoiceID'],
                    $row['invoiceDetailID'],
                    $row['discount'],
                    $row['tax'],
                    $row['finalAmount'],
                    $row['status'],
                    $row['paymentType'],
                    $row['invoiceDate'],
                    $row['paymentDate']
                );
                $invoices[] = $invoice;
            }
        }

        return $invoices;
    }

    public function find($invoiceID)
    {
        $condition = "invoiceID = '$invoiceID'";
        $invoices  = $this->fetchAll($condition);
        return current($invoices);
    }

    public function save($data)
    {
        global $conn;
        $invoiceDetailID = $data['invoiceDetailID'] ?? 'NULL';
        $discount        = $data['discount'] ?? 0;
        $tax             = $data['tax'] ?? 0;
        $finalAmount     = $data['finalAmount'] ?? 0;
        $status          = $data['status'] ?? 0;
        $paymentType     = $data['paymentType'] ?? '';
        $invoiceDate     = $data['invoiceDate'] ?? date('Y-m-d');
        $paymentDate     = $data['paymentDate'] ?? null;

        $invoiceDetailID = empty($invoiceDetailID) ? "NULL" : "'$invoiceDetailID'";
        $paymentDate     = $paymentDate ? "'$paymentDate'" : "NULL";

        $sql = "INSERT INTO invoice (invoiceDetailID, discount, tax, finalAmount, status, paymentType, invoiceDate, paymentDate) VALUES
                ($invoiceDetailID, $discount, $tax, $finalAmount, $status, '$paymentType', '$invoiceDate', $paymentDate)";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function update($invoice)
    {
        global $conn;
        $invoiceID       = $invoice->getInvoiceID();
        $invoiceDetailID = $invoice->getInvoiceDetailID();
        $discount        = $invoice->getDiscount();
        $tax             = $invoice->getTax();
        $finalAmount     = $invoice->getFinalAmount();
        $status          = $invoice->getStatus();
        $paymentType     = $invoice->getPaymentType();
        $invoiceDate     = $invoice->getInvoiceDate();
        $paymentDate     = $invoice->getPaymentDate();

        $invoiceDetailID = empty($invoiceDetailID) ? "NULL" : "'$invoiceDetailID'";
        $paymentDate     = $paymentDate ? "'$paymentDate'" : "NULL";

        $sql = "UPDATE invoice SET invoiceDetailID=$invoiceDetailID, discount=$discount, tax=$tax, finalAmount=$finalAmount,
                status=$status, paymentType='$paymentType', invoiceDate='$invoiceDate', paymentDate=$paymentDate WHERE invoiceID='$invoiceID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    public function delete($invoice)
    {
        global $conn;
        $invoiceID = $invoice->getInvoiceID();
        $sql       = "DELETE FROM invoice WHERE invoiceID='$invoiceID'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
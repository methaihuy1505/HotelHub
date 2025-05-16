<?php
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
if ($conn->connect_error) {
    die("Kết nối thất bại tới: " . DBNAME);
}
mysqli_set_charset($conn, "utf8");
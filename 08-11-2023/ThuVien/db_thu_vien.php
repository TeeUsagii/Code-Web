<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "thuvien";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $conn->connect_error);
}
?>
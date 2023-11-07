<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "studentdb";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $mysqli->connect_error);
}
?>
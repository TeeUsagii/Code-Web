<?php
// Kết nối đến cơ sở dữ liệu
require 'db_sinh_vien.php';

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $mysqli->connect_error);
}

// Lấy dữ liệu từ biểu mẫu HTML
$name = $_POST['name'];
$age = $_POST['age'];
$class = $_POST['class'];

// Thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO students (name, age, class) VALUES ('$name', $age, '$class')";

if ($mysqli->query($sql) === TRUE) {
    echo "Thêm sinh viên thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
<html>
<a href="index.html">Quay lại</a>
</html>
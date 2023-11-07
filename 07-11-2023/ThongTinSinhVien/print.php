<?php
// Kết nối đến cơ sở dữ liệu
require 'db_sinh_vien.php';

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $mysqli->connect_error);
}

echo "<h1>Danh sách sinh viên</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Lớp</th>
        </tr>";

$result = $mysqli->query("SELECT * FROM students");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['class'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Không có sinh viên nào trong cơ sở dữ liệu.";
}

$mysqli->close();

echo "</table>";
?>

<html>
<a href="index.html">Quay lại</a>
</html>
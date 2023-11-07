<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $soLuongSinhVien = $_POST["soLuongSinhVien"];
    session_start(); // Bắt đầu session
    $_SESSION['soLuongSinhVien'] = $soLuongSinhVien;
    
    echo "<form action='xuly.php' method='post'>";
    for ($i = 1; $i <= $soLuongSinhVien; $i++) {
        echo "<h2>Thông tin sinh viên #" . $i . "</h2>";
        echo "<label for='hoDem$i'>Họ đệm:</label>";
        echo "<input type='text' name='hoDem$i' required><br>";
        echo "<label for='ten$i'>Tên:</label>";
        echo "<input type='text' name='ten$i' required><br>";
        echo "<label for='namSinh$i'>Năm sinh:</label>";
        echo "<input type='text' name='namSinh$i' required><br>";
    }
    echo "<input type='submit' value='Lưu thông tin'>";
    echo "</form>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin mượn sách</title>
</head>

<body>
    <h1>Thông tin mượn sách</h1>

    <?php
    require 'db_thu_vien.php';

    // Truy vấn dữ liệu từ bảng QUANLYMUON
    $sql = "SELECT * FROM QUANLYMUON";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>Ma_phieu</th>
            <th>Ma_doc_gia</th>
            <th>Ma_sach</th>
            <th>Ngay_muon</th>
            <th>Ngay_hen_tra</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Ma_phieu"] . "</td>
                <td>" . $row["Ma_doc_gia"] . "</td>
                <td>" . $row["Ma_sach"] . "</td>
                <td>" . $row["Ngay_muon"] . "</td>
                <td>" . $row["Ngay_hen_tra"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }

    $conn->close();
    ?>
</body>

</html>
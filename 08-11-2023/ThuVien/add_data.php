<!DOCTYPE html>
<html>
<head>
    <title>Nhập thông tin</title>
</head>
<body>
    <h1>Nhập thông tin mới</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require('db_thu_vien.php');

        // Lấy dữ liệu từ biểu mẫu HTML
        $Ma_phieu = isset($_POST["Ma_phieu"]) ? $_POST["Ma_phieu"] : null;
        $Ma_doc_gia = isset($_POST["Ma_doc_gia"]) ? $_POST["Ma_doc_gia"] : null;
        $Ma_sach = isset($_POST["Ma_sach"]) ? $_POST["Ma_sach"] : null;
        $Ngay_muon = isset($_POST["Ngay_muon"]) ? $_POST["Ngay_muon"] : null;
        $Ngay_hen_tra = isset($_POST["Ngay_hen_tra"]) ? $_POST["Ngay_hen_tra"] : null;

        if ($Ma_phieu && $Ma_doc_gia && $Ma_sach && $Ngay_muon && $Ngay_hen_tra) {
            // Thêm dữ liệu mới vào bảng QUANLYMUON
            $sql = "INSERT INTO QUANLYMUON (Ma_phieu, Ma_doc_gia, Ma_sach, Ngay_muon, Ngay_hen_tra) VALUES ('$Ma_phieu', '$Ma_doc_gia', '$Ma_sach', '$Ngay_muon', '$Ngay_hen_tra')";

            if ($conn->query($sql) === TRUE) {
                echo "Dữ liệu đã được thêm thành công!";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Vui lòng điền đầy đủ thông tin vào biểu mẫu.";
        }

        $conn->close();
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ma_phieu: <input type="number" name="Ma_phieu"><br>
        Ma_doc_gia: <input type" number" name="Ma_doc_gia"><br>
        Ma_sach: <input type="number" name="Ma_sach"><br>
        Ngay_muon: <input type="date" name="Ngay_muon"><br>
        Ngay_hen_tra: <input type="date" name="Ngay_hen_tra"><br>
        <input type="submit" value="Thêm dữ liệu">
    </form>
</body>
</html>

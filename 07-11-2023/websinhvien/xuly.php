<?php
session_start(); // Bắt đầu session

if (isset($_SESSION['soLuongSinhVien'])) {
    $soLuongSinhVien = $_SESSION['soLuongSinhVien'];
}

class SinhVien
{
    public $hoDem;
    public $ten;
    public $namSinh;

    // Định nghĩa các phương thức của lớp SinhVien

    // Hàm hiển thị thông tin sinh viên
    public function xuatThongTin()
    {
        echo "Họ đệm: " . $this->hoDem . "<br>";
        echo "Tên: " . $this->ten . "<br>";
        echo "Năm sinh: " . $this->namSinh . "<br>";
    }

    // Hàm tính tuổi
    public function tinhTuoi()
    {
        $namHienTai = date("Y");
        $tuoi = $namHienTai - $this->namSinh;
        return $tuoi;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sinhVienList = [];
    $tuoiTheoNam = []; // Mảng lưu tỉ lệ tuổi theo năm sinh

    for ($i = 1; $i <= $soLuongSinhVien; $i++) {
        $hoDem = $_POST["hoDem$i"];
        $ten = $_POST["ten$i"];
        $namSinh = $_POST["namSinh$i"];

        $sinhVien = new SinhVien();
        $sinhVien->hoDem = $hoDem;
        $sinhVien->ten = $ten;
        $sinhVien->namSinh = $namSinh;

        $sinhVienList[] = $sinhVien;

        // Tính tuổi và lưu vào mảng tỉ lệ tuổi theo năm sinh
        $tuoi = $sinhVien->tinhTuoi();
        if (!isset($tuoiTheoNam[$namSinh])) {
            $tuoiTheoNam[$namSinh] = 0;
        }
        $tuoiTheoNam[$namSinh] += $tuoi;
    }

    // Sắp xếp danh sách sinh viên theo tuổi tăng dần
    usort($sinhVienList, function ($a, $b) {
        return $a->tinhTuoi() - $b->tinhTuoi();
    });

    // Tính tuổi trung bình của tất cả sinh viên
    $tuoiTrungBinh = 0;
    foreach ($sinhVienList as $sinhVien) {
        $tuoiTrungBinh += $sinhVien->tinhTuoi();
    }
    $tuoiTrungBinh /= count($sinhVienList);


    // Hiển thị thông tin của tất cả sinh viên theo thứ tự tuổi tăng dần
    echo "Thông tin Sinh viên theo thứ tự tuổi tăng dần:<br>";
    foreach ($sinhVienList as $sinhVien) {
        $sinhVien->xuatThongTin();
        echo "Tuổi: " . $sinhVien->tinhTuoi() . " tuổi<br><br>";
    }

    // Hiển thị tuổi trung bình
    echo "Tuổi trung bình của tất cả sinh viên: " . round($tuoiTrungBinh, 2) . " tuổi<br><br>";

    // Tìm tuổi có tỉ lệ nhiều nhất
$maxTuoi = 0; // Tuổi có tỉ lệ nhiều nhất

foreach ($tuoiTheoNam as $namSinh => $tongTuoi) {
    $tiLe = $tongTuoi / $soLuongSinhVien;
    if ($tiLe > $maxTuoiTiLe) {
        $maxTuoiTiLe = $tiLe;
        $maxTuoi = $namSinh;
    }
}

// In ra tuổi có tỉ lệ nhiều nhất
echo "Tuổi có tỉ lệ nhiều nhất trong sinh viên là tuổi $maxTuoi<br><br>";


}
?>

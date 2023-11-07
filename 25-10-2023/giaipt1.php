<?php
function giaiPhuongTrinhBac1($a, $b)
{
    if ($a == 0) {
        echo "Đối số đầu tiên không thể bằng 0. Không phải phương trình bậc 1.";
    } else {
        $x = -$b / $a;
        echo "Nghiệm của phương trình {$a}x + {$b} = 0 là x = {$x}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị a và b từ biểu mẫu
    $a = $_POST["a"];
    $b = $_POST["b"];

    // Gọi hàm giaiPhuongTrinhBac1 để giải phương trình
    giaiPhuongTrinhBac1($a, $b);
}
?>
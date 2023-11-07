<?php
class So
{
    //thuoc tinh so thuc
    private $value;
    
    //khoi tao gia tri va luu du lieu so thuc
    public function __construct($value)
    {
        $this->value = $value;
    }
    //kiem tra so nguyen to
    public function isNguyenTo()
    {
        if ($this->value <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($this->value); $i++) {
            if ($this->value % $i === 0) {
                return false;
            }
        }
        return true;
    }
    //tra ve gia tri cua so
    public function getValue()
    {
        return $this->value;
    }
}

    // xu li du lieu gui tu form sau khi an nut kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = (int)$_POST['n'];
    $soArray = array();

    for ($i = 0; $i < $n; $i++) {
        $soKey = "so_$i";
        if (isset($_POST[$soKey])) {
            $soValue = (float)$_POST[$soKey];
            $soValue = intval($soValue);
            $so = new So($soValue);
            $soArray[] = $so;
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Kiểm tra số nguyên tố</title>

    <style>
        input {
            width: 200px;
            padding: 5px;
            margin: 5px;
        }

        html {
            font-size: 22px;
        }
    </style>
    <script>
        function toggleInputFields() {
            var n = document.getElementById("n").value;
            var inputContainer = document.getElementById("inputContainer");

            inputContainer.innerHTML = ""; // xoa noi dung cua inputContainer

            for (var i = 0; i < n; i++) {
                var inputField = document.createElement("div");
                inputField.innerHTML = "<label for='so_" + i + "'>Nhập số thực thứ " + i + ": </label>" +
                    "<input type='number' step='0.01' name='so_" + i + "' required><br>";
                inputContainer.appendChild(inputField);
            }
        }
    </script>
</head>

<body>
    <form method="POST">
        <label for="n">Nhập số lượng số: </label>
        <input type="number" name="n" id="n" required onchange="toggleInputFields();">
        <br>

        <div id="inputContainer"></div>
        <br>
        <input type='submit' value='Kiểm tra'>
    </form>

    <?php
    if (isset($soArray)) {
        echo "<h2>Kết quả:</h2>";
        foreach ($soArray as $index => $so) {
            $value = $so->getValue();
            $isNguyenTo = $so->isNguyenTo() ? "là số nguyên tố" : "không phải số nguyên tố";
            echo "Số thực thứ " . ($index +1) . ": \"$value\" $isNguyenTo<br>";
        }
    }
    ?>

</body>

</html>
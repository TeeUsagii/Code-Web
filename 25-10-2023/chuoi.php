<?php
        if (isset($_POST['concat'])) {
            $text1 = $_POST['text1'];
            $text2 = $_POST['text2'];
            $result = $text1 . $text2;
            echo "Chuỗi sau khi cộng (ghép): $result";
        } elseif (isset($_POST['compare'])) {
            $text1 = $_POST['text1'];
            $text2 = $_POST['text2'];
            if ($text1 == $text2) {
                echo "Chuỗi 1 và chuỗi 2 giống nhau.";
            } else {
                echo "Chuỗi 1 và chuỗi 2 không giống nhau.";
            }
        } else {
            echo "Vui lòng chọn một tác vụ để thực hiện.";
        }

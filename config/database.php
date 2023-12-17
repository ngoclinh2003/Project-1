<?php
    $conn = mysqli_connect("localhost", "root", "", "d05k13");
    if (!$conn) {
        die ("Kết nối không thành công". mysqli_connect_error());
    }

    mysqli_set_charset($conn, "UTF8");
?>
<?php
    // ประกาศตัวแปร conn เพื่อเชื่อมฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '', 'login_register');

    // ถ้าตัวแปร conn เชิ่อมต่อไม่ได้ให้แสดง error ออกมา
    if(!$conn) {
        die(mysqli_error($conn));
    }

?>
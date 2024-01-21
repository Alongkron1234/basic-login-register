<?php
    include 'connect.php'; // เรียกไฟล์ที่ใช้เชื่อมฐานข้อมูลมาใช้
    if(isset($_POST['submit'])) { // ถ้ามีการกดปุ่ม submit ที่ formจะทำคำสั่งด้านล่าง
        $fullname = $_POST['fullname']; //ประกาศตัวแปร fullname มารับค่า name ที่ส่งมาจาก form
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        if($password !== $repeat_password) {
            array_push($errors, "Password does not match");
        }

        // เพิ่มข้อมูลไปที่ฐานข้อมูล
        $sql = "insert into `users` (full_name,email,password) values('$fullname','$email','$password')";// คำสั่งเพิ่มข้อมูลไปที่ฐานข้อมูล
        $result = mysqli_query($conn, $sql); // สร้างตัวแปรมาเก็บว่าเพิ่มข้อมูลเรียบร้อยมั้ย
        if($result) { // ถ้าเพิ่มเรียบร้อย
            header('location: login.php'); // ให้ไปหน้า index.php
        }else {
            die(mysqli_error($conn));  // ถ้าไม่เรียบร้อยให้แสดง error
        }
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
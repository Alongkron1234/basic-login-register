<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        if(isset($_POST['registerpage'])){  // ถ้าปุ่มที่ name='registerpage' ถูกกดให้ไปหน้า register.php
            header("Location: register.php");
        }
    ?>

    <?php
        include 'connect.php';  // เรียกไฟล์ที่เชื่อมฐานข้อมูล
        if(isset($_POST["login"])) {  //ถ้ามีการกดปุ่ม submit ที่ name='login' จะทำคำสั่งด้านล่าง
            $email = $_POST["email"];  // เก็บค่า email
            $password = $_POST["password"]; // เก็บค่า password

            $sql = "SELECT * FROM users WHERE email = '$email'"; // เอา email ที่เก็บไปค้นหาในฐานข้อมูล
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);  //สร้างตัวแปร user มาเก็บผลลัพธ์ที่ค้นหาก็คือจะเป็นพวก id, fullname, email, password, repeat_passowrd ตาม columns ในฐานข้อมูล
            if($user) {  // ถ้า user มีค่าทำตามคำสั่งด้านล่าง
                if($password == $user["password"]) {   // เอา password ที่รับเข้ามาเช้คกับ password ที่เอา email ไปหาในฐานข้อมูลว่าตรงกันมั้ย
                    header("Location: index.php");   // ถ้าตรงกันก็ให้ไปหน้า index.php
                    exit();
                }else {
                    echo "<div class='alert alert-danger'>Password does not match</div>"; //ถ้าไม่ตรงก็ขึ้นเตือน
                }
            }else {
                echo "<div class='alert alert-danger'>Email does not match</div>";  // ถ้าไม่มี user ในฐานข้อมูล (ก็คือไม่มี email)
            }
        }
    ?>

    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            
            <div class="form-btn">
                <input type="submit" value="register" name="registerpage" class="btn btn-secondary">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
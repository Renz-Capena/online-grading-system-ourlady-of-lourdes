<?php
    require "connection.php";
    $con = connect();
    session_start();

    if(isset($_POST['login_btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $command = "SELECT * FROM `teachers` WHERE email_teacher='$email' AND password_teacher='$pass'";
        $list = $con->query($command);
        $row = $list->fetch_assoc();
        $valid = $list->num_rows;

        $command_1 = "SELECT * FROM `students` WHERE email='$email' AND password='$pass'";
        $list_1 = $con->query($command_1);
        $row_1 = $list_1->fetch_assoc();
        $valid_1 = $list_1->num_rows;

        $command_2 = "SELECT * FROM `users` WHERE email='$email' AND password='$pass'";
        $list_2 = $con->query($command_2);
        $row_2 = $list_2->fetch_assoc();
        $valid_2 = $list_2->num_rows;

        // echo $valid;
        // echo $valid_1;
        // echo $valid_2;


        if($valid == 1){
            
            $_SESSION['status'] = $row['status'];
            header("location: home_teacher.php");
            
        }else if($valid_1 == 1){

            $_SESSION['status'] = $row_1['status'];
            header("location: home_student.php");

        }else if($valid_2 == 1){

            $_SESSION['status'] = $row_2['status'];
            header("location: home_admin.php");

        }else{

            echo "<script>alert('Wrong Email or Password')</script>";

        }

        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="heading_wrapper">
        <img src="img/logo.png">
        <h2>Our Lady of Lourdes College of Valenzuela online Grading System</h2>
        <h4>by: <a href="https://www.facebook.com/renzcollin.capena/">Renz Collin D. Capeña</a></h4>
    </div>
    <img src="img/bg.jpg" class="img_bg">

    <form method="post" class="login_form">
        <h3 class="login_head">Log in</h3>
        <div class="container_info_login">
            <label>Email : </label>
            <input type="text" name="email" required>
            <br><br>
            <label>Pass : </label>
            <input type="password" name="pass" required>
        </div>
        <button class="login" name="login_btn">LOG IN</button><br>
    </form>

</body>
</html>
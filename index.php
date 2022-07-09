<?php
    require "connection.php";
    $con = connect();
    session_start();

    // echo $_SESSION['status'];
    if(empty($_SESSION['status'])){

        $_SESSION['status'] = 'invalid';
    }
    
    if($_SESSION['status'] == 'admin'){

        header("location: home_admin.php");
    }
    if($_SESSION['status'] == 'teacher'){

        header("location: home_teacher.php");
    }

    if($_SESSION['status'] == 'student'){
        
        header("location: home_student.php");
    }

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


        if($valid == 1){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['status'] = $row['status'];
            header("location: home_teacher.php");
            
        }else if($valid_1 == 1){

            $_SESSION['status'] = $row_1['status'];
            $_SESSION['user_id'] = $row_1['id'];
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
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAYFBMVEX///9AQEAoKCj09PQ9PT0vLy8sLCw6OjpUVFTd3d3Jycl4eHg1NTUpKSn5+fk4ODgiIiJcXFydnZ1+fn7Pz8/t7e3k5OS5ubmIiIhwcHDg4OBLS0tFRUWSkpKurq5iYmK5pxemAAACUElEQVR4nO3dCXKrMBBFUQkL4UHMGOyM+99l7Pyqv4Pul5B7dnALyg7tRgkBAAAAAAAAAAAAAAAAAABArzt46zzzlrlU/sq8OPVdx7aJCk07Xj0CT6K+f40n+8Brm2SBMabW/iqOuiv41IzWgUsrDYyxtf64mbWX8HERZ+PCIg6MsdgGdpU6MFa2X/2HH1B4oJBCCtUopJBCCn994f7/agtJ+fz7lJJtYLj14sL+Zlx4Ut+mlfmk5q69iP3dOjB0vXQS1TsMhq+N7jm/JJeBaTcPRXEdUxmsZzT/rdNYcu0rl3FavQIBAAAAAMBudOvJ2+q5frmNVfZXjZtT3ynWmpFpqqPDamII50E3Ek7D2T7wZZD1PQ0v5oWv2p/X0qt14DlLA2PM1vfpRb59eTEurMWBMda2gfv/HX//uxgUUkghhRRSSOFfKAw/oNA2MLzJty/fjAvf5duX78aFq3aIEeNgvhh1076fV6wXaB9elU/5jfmY5qE76p7z66PP4Huq6ib5a+pqcul76LZ5PHob58314AgAAAAAALAL63L2tji+QdpNfev8juxT209Og5pzVg2Fi/nK17cP5Vx/+LAPXMTbl/antDbi7Uvro03Cpl7dq62Xve/y7Uvroz/UC7QxZttAti89Ctk2oZBCdSCFFFJI4e8v/APbl+KX8xxez5vUB+sX672oq3z70vxcwUn7kF87rLZ9Ku/T8mkfGMI9qz5tUrY/vfTblnJp/JWcvI4cCGGZ5ou3efL6h1YAAAAAAAAAAAAAAAAAAAAAAAD79gWaO1Pdj84d6wAAAABJRU5ErkJggg==" class="burger_menu">
        <div class="btn_wrapper">
            <a class="btn" href="index.php">HOME</a>
            <a class="btn" href="users_list.php">USERS</a>
            <a class="btn about_nav" href="#about">ABOUT</a>
            <button class="btn" id="login_btn">LOG IN</button>
        </div>
    </div>
    <img src="img/bg.jpg" class="img_bg">

    <div class="login_form">
        <form method="post">
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
        <br>
        <button id="close_form_btn">CLOSE</button>
    </div>

    <section class="section_1">
        <p class="school_name">OUR LADY OF LOURDES COLLEGE OF VALENZUELA <br><br>ONLINE GRADING SYSTEM</p>
    </section>

    <section class="about" id="about">
        <div class="column_1">
            <img src="img/ollc.jpg" alt="">
            <div>
                <h1>ABOUT</h1>
                <br>
                <p>The Our Lady of Lourdes College is a privately owned and managed educational institution. As originally conceived by Mr. and Mrs. Alfredo Demetillo it continues to be service oriented in fulfilling its mission to serve the growing population of Valenzuela City and the neighboring communities.</p>
            </div>
        </div>
        <div class="column_2">
            <div>
                <h2>MISSION</h2>
                <p>The Our Lady of Lourdes College is a privately owned and managed educational institution. As originally conceived by Mr. and Mrs. Alfredo Demetillo it continues to be service oriented in fulfilling its mission to serve the growing population of Valenzuela City and the neighboring communities.</p>
            </div>
            <div>
                <h2>VISION</h2>
                <p>The Our Lady of Lourdes College is a privately owned and managed educational institution. As originally conceived by Mr. and Mrs. Alfredo Demetillo it continues to be service oriented in fulfilling its mission to serve the growing population of Valenzuela City and the neighboring communities.</p>
            </div>
        </div>
    </section>

    <section class="section_created_by">
        <div class="card_profile_me">
            <img src="img/me.png" alt="">
            <br><br>
            <a class="href_profile" href="https://www.facebook.com/renzcollin.capena/">Renz Collin D. Capeña</a>
            <br><br>
            <i>Web Developer</i>
            <div class="description_me">
                <p>Hello I'm <b><i>Renz Colin D. Capeña</i></b> the creator of this website . I build this website fromm scratch using HTML, CSS, JAVASRIPT and PHP I hope you enjoy it. Also I build this website to enhance my knowledge about Cread, Read, Update and Delete(CRUD) in database. This website is about simple Online grading system of Our lady of Luordes College of Valenzuela. This website have a 3 user that is admin, teacher and student.
                <br><br>
                - The admin can create a teachers account and students account the admin also can edit and delete the accounts.
                <br><br>
                - The teachers account can manage the grades of the students the teacher account can create and update the grades of the students.
                <br><br>
                - The students account can only view the grades.</p>
            </div>
        </div>
    </section>
    <footer>
        <p>This website is for educational purpose only</p>
    </footer>




    <script src="js/index.js"></script>
</body>
</html>
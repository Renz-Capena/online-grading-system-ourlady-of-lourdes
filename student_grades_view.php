<?php 
    require "connection.php";
    $con = connect();

    $student_id = $_GET['id'];

    $command = "SELECT * FROM `grades` WHERE user_id='$student_id'";
    $list = $con->query($command);
    $row = $list->fetch_assoc();

    $command_user = "SELECT * FROM `students` WHERE id='$student_id'";
    $list_user = $con->query($command_user);
    $row_user = $list_user->fetch_assoc();

    if(isset($_POST['update_btn'])){

        $f_1 = $_POST['f_1'];
        $f_2 = $_POST['f_2'];
        $f_3 = $_POST['f_3'];
        $f_4 = $_POST['f_4'];

        $e_1 = $_POST['e_1'];
        $e_2 = $_POST['e_2'];
        $e_3 = $_POST['e_3'];
        $e_4 = $_POST['e_4'];

        $s_1 = $_POST['s_1'];
        $s_2 = $_POST['s_2'];
        $s_3 = $_POST['s_3'];
        $s_4 = $_POST['s_4'];
    

        $m_1 = $_POST['m_1'];
        $m_2 = $_POST['m_2'];
        $m_3 = $_POST['m_3'];
        $m_4 = $_POST['m_4'];

        $h_1 = $_POST['h_1'];
        $h_2 = $_POST['h_2'];
        $h_3 = $_POST['h_3'];
        $h_4 = $_POST['h_4'];

        $p_1 = $_POST['p_1'];
        $p_2 = $_POST['p_2'];
        $p_3 = $_POST['p_3'];
        $p_4 = $_POST['p_4'];

        $command = "UPDATE `grades` SET `f_1`='$f_1',`f_2`='$f_2',`f_3`='$f_3',`f_4`='$f_4',`e_1`='$e_1',`e_2`='$e_2',`e_3`='$e_3',`e_4`='$e_4',`s_1`='$s_1',`s_2`='$s_2',`s_3`='$s_3',`s_4`='$s_4',`m_1`='$m_1',`m_2`='$m_2',`m_3`='$m_3',`m_4`='$m_4',`h_1`='$h_1',`h_2`='$h_2',`h_3`='$h_3',`h_4`='$h_4',`p_1`='$p_1',`p_2`='$p_2',`p_3`='$p_3',`p_4`='$p_4' WHERE user_id='$student_id'";
        $con->query($command);

        header("location: home_teacher.php");
    }

    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);

        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/students_view_card.css">
</head>
<body>
    <nav>
        <div class="ollc-logo">
            <img src="img/logo.png">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <form method="post">
                <button name="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>
    <!----------------------------------------- section -->
    <img src="img/bg.jpg" class="image_bg">
    <section>
        <div class="form_grade_wrapper">
            <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>STUDENT: <?php echo $row_user['f_name']?> <?php echo $row_user['l_name'] ?></th>
                                <th>1st</th>
                                <th>2nd</th>
                                <th>3rd</th>
                                <th>4th</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subjects">Filipino</td>
                                <td><input type="number" name="f_1" value="<?php echo $row['f_1'] ?>"></td>
                                <td><input type="number" name="f_2" value="<?php echo $row['f_2'] ?>"></td>
                                <td><input type="number" name="f_3" value="<?php echo $row['f_3'] ?>"></td>
                                <td><input type="number" name="f_4" value="<?php echo $row['f_4'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="subjects">English</td>
                                <td><input type="number" name="e_1" value="<?php echo $row['e_1'] ?>"></td>
                                <td><input type="number" name="e_2" value="<?php echo $row['e_2'] ?>"></td>
                                <td><input type="number" name="e_3" value="<?php echo $row['e_3'] ?>"></td>
                                <td><input type="number" name="e_4" value="<?php echo $row['e_4'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="subjects">Science</td>
                                <td><input type="number" name="s_1" value="<?php echo $row['s_1'] ?>"></td>
                                <td><input type="number" name="s_2" value="<?php echo $row['s_2'] ?>"></td>
                                <td><input type="number" name="s_3" value="<?php echo $row['s_3'] ?>"></td>
                                <td><input type="number" name="s_4" value="<?php echo $row['s_4'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="subjects">Mathematics</td>
                                <td><input type="number" name="m_1" value="<?php echo $row['m_1'] ?>"></td>
                                <td><input type="number" name="m_2" value="<?php echo $row['m_2'] ?>"></td>
                                <td><input type="number" name="m_3" value="<?php echo $row['m_3'] ?>"></td>
                                <td><input type="number" name="m_4" value="<?php echo $row['m_4'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="subjects">History</td>
                                <td><input type="number" name="h_1" value="<?php echo $row['h_1'] ?>"></td>
                                <td><input type="number" name="h_2" value="<?php echo $row['h_2'] ?>"></td>
                                <td><input type="number" name="h_3" value="<?php echo $row['h_3'] ?>"></td>
                                <td><input type="number" name="h_4" value="<?php echo $row['h_4'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="subjects">Physical Education</td>
                                <td><input type="number" name="p_1" value="<?php echo $row['p_1'] ?>"></td>
                                <td><input type="number" name="p_2" value="<?php echo $row['p_2'] ?>"></td>
                                <td><input type="number" name="p_3" value="<?php echo $row['p_3'] ?>"></td>
                                <td><input type="number" name="p_4" value="<?php echo $row['p_4'] ?>"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn" name="update_btn">UPDATE</button>
                    <a class="btn" href="home_teacher.php">BACK</a>
            </form>
        </div>
    </section>
</body>
</html>
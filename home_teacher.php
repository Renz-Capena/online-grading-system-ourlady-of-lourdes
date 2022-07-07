<?php
    require "connection.php";
    $con = connect();
    session_start();

    echo $_SESSION['status'];

    if(empty($_SESSION['status'])){

        header("location: index.php");
    }
    if($_SESSION['status'] == 'admin'){

        header("location: home_admin.php");
    }

    if($_SESSION['status'] == 'student'){
        
        header("location: home_student.php");
    }


    $command_recorded = "SELECT * FROM `students` WHERE card='RECORDED'";
    $list_recorded = $con->query($command_recorded);
    $row_recorded = $list_recorded->fetch_assoc();
    $numrow_recorded = $list_recorded->num_rows;

    $command_no_recorded = "SELECT * FROM `students` WHERE card='NO RECORD'";
    $list_no_recorded = $con->query($command_no_recorded);
    $row_no_recorded = $list_no_recorded->fetch_assoc();
    $numrow_no_record = $list_no_recorded->num_rows;

    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);
        // unset($_SESSION['user_id']);

        header("location: index.php");
    }

    if(isset($_POST['create_grade'])){

        $student_id = $_POST['student_id'];

        $command_validate = "SELECT * FROM `students` WHERE id='$student_id' AND card='NO RECORD'";
        $list = $con->query($command_validate);
        $row = $list->fetch_assoc();
        $valid = $list->num_rows;

    
        if($valid != 0){
        // -----------------------------------------student command update card
            $command_update = "UPDATE `students` SET `card`='RECORDED' WHERE id='$student_id'";
            $con->query($command_update);
        //-------------------------------------------------- grades command

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

            $command = "INSERT INTO `grades`(`user_id`, `f_1`, `f_2`, `f_3`, `f_4`, `e_1`, `e_2`, `e_3`, `e_4`, `s_1`, `s_2`, `s_3`, `s_4`, `m_1`, `m_2`, `m_3`, `m_4`, `h_1`, `h_2`, `h_3`, `h_4`, `p_1`, `p_2`, `p_3`, `p_4`) VALUES ('$student_id','$f_1','$f_2','$f_3','$f_4','$e_1','$e_2','$e_3','$e_4','$s_1','$s_2','$s_3','$s_4','$m_1','$m_2','$m_3','$m_4','$h_1','$h_2','$h_3','$h_4','$p_1','$p_2','$p_3','$p_4')";

            $con->query($command);
            
            header("location: home_teacher.php");
        }else{
            echo "<script>alert('THAT ID IS ALREADY RECORDED OR NO SUCH STUDENT IN THE LIST')</script>";

            
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
    <link rel="stylesheet" href="css/home_teacher.css">
</head>
<body>
    <nav>
        <div class="ollc-logo">
            <img src="img/logo.png">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <a class="create_grade_btn">CREATE GRADE</a>
            <a href="#" class="teacher_btn">REMINDERS BY ADMIN</a>
            <form method="post">
                <button name="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>
    <!-- ----------------------------------------section -->
    <img src="img/bg.jpg" alt="sample" class="image_bg">
    <section>
        <button class="btn recorded">STUDENTS WITH RECORDS</button>
        <button class="btn not_recorded">STUDENTS WITH NO RECORDS</button>
        
        <div class="table_wrapper_both">
            <table class="table_recorded">
                <caption>STUDENTS WITH CARDS</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>GRADE</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>CARD STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($numrow_recorded != 0){ ?>
                        <?php do{ ?>
                            <tr>
                                <td><?php echo $row_recorded['id']?></td>
                                <td><?php echo $row_recorded['f_name']?></td>
                                <td><?php echo $row_recorded['l_name']?></td>
                                <td><?php echo $row_recorded['grade']?></td>
                                <td><?php echo $row_recorded['email']?></td>
                                <td><?php echo $row_recorded['password']?></td>
                                <td><a class="link_view_grades" href="student_grades_view.php?id=<?php echo $row_recorded['id']?>"><?php echo $row_recorded['card']?></a></td>
                            </tr>
                        <?php }while($row_recorded = $list_recorded->fetch_assoc()) ?>
                    <?php }else{ ?>

                            <tr>
                                <td style="text-align:center" colspan="7">NO STUDENT RECORDED YET!</td>
                            </tr>

                    <?php } ?>
                </tbody>
            </table>

            <table class="table_not_record">
                <caption>NO CARDS RECORD</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>GRADE</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>CARD STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($numrow_no_record != 0){ ?>
                        <?php do{ ?>
                        <tr>
                            <td><?php echo $row_no_recorded['id']?></td>
                            <td><?php echo $row_no_recorded['f_name']?></td>
                            <td><?php echo $row_no_recorded['l_name']?></td>
                            <td><?php echo $row_no_recorded['grade']?></td>
                            <td><?php echo $row_no_recorded['email']?></td>
                            <td><?php echo $row_no_recorded['password']?></td>
                            <td><?php echo $row_no_recorded['card']?></td>
                        </tr>
                        <?php }while($row_no_recorded = $list_no_recorded->fetch_assoc()) ?>
                    <?php }else{ ?>
                            <tr>
                                <td style="text-align:center" colspan="7">NO STUDENT YET!</td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="form_grade_wrapper">
        <div class="form_grade_wrapper_1">
            <div class="close_btn_wrapper">
                <button class="close_btn_grade">&#x2716;</button>
            </div>
            <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="subjects">Filipino</td>
                            <td><input type="number" name="f_1" value="0"></td>
                            <td><input type="number" name="f_2" value="0"></td>
                            <td><input type="number" name="f_3" value="0"></td>
                            <td><input type="number" name="f_4" value="0"></td>
                        </tr>
                        <tr>
                            <td class="subjects">English</td>
                            <td><input type="number" name="e_1" value="0"></td>
                            <td><input type="number" name="e_2" value="0"></td>
                            <td><input type="number" name="e_3" value="0"></td>
                            <td><input type="number" name="e_4" value="0"></td>
                        </tr>
                        <tr>
                            <td class="subjects">Science</td>
                            <td><input type="number" name="s_1" value="0"></td>
                            <td><input type="number" name="s_2" value="0"></td>
                            <td><input type="number" name="s_3" value="0"></td>
                            <td><input type="number" name="s_4" value="0"></td>
                        </tr>
                        <tr>
                            <td class="subjects">Mathematics</td>
                            <td><input type="number" name="m_1" value="0"></td>
                            <td><input type="number" name="m_2" value="0"></td>
                            <td><input type="number" name="m_3" value="0"></td>
                            <td><input type="number" name="m_4" value="0"></td>
                        </tr>
                        <tr>
                            <td class="subjects">History</td>
                            <td><input type="number" name="h_1" value="0"></td>
                            <td><input type="number" name="h_2" value="0"></td>
                            <td><input type="number" name="h_3" value="0"></td>
                            <td><input type="number" name="h_4" value="0"></td>
                        </tr>
                        <tr>
                            <td class="subjects">Physical Education</td>
                            <td><input type="number" name="p_1" value="0"></td>
                            <td><input type="number" name="p_2" value="0"></td>
                            <td><input type="number" name="p_3" value="0"></td>
                            <td><input type="number" name="p_4" value="0"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form_settings">
                    <label>ENTER STUDENT ID : </label>
                    <input type="number" name="student_id" required>
                    <button class="btn_1 create_grade_btn" name="create_grade" >CREATE</button>
                </div>
            </tr>
            </form>
            
        </div>
    </div>

    <script src="js/home_teacher.js"></script>
</body>
</html>
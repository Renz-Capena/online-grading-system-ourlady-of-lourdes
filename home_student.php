<?php 
    require "connection.php";
    $con = connect();
    session_start();
    error_reporting(0);

    if(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){

        header("location: index.php");
    }
    if($_SESSION['status'] == 'teacher'){

        header("location: home_teacher.php");
    }

    if($_SESSION['status'] == 'admin'){
        
        header("location: home_admin.php");
    }

    $student_id = $_SESSION['user_id'];

    $command = "SELECT * FROM `grades` WHERE user_id='$student_id'";
    $list = $con->query($command);
    $row = $list->fetch_assoc();
    $num_grades = $list->num_rows;

    $command_user = "SELECT * FROM `students` WHERE id='$student_id'";
    $list_user = $con->query($command_user);
    $row_user = $list_user->fetch_assoc();



    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);
        unset($_SESSION['user_id']);

        header("location: index.php");
    }

    // -----------------------------------------------------reminders

    $command_user_details = "SELECT * FROM `students` WHERE id='$student_id'";
    $list_user_details = $con->query($command_user_details);
    $row_user_details = $list_user_details->fetch_assoc();

    $user_email = $row_user_details['email'];

    $command_reminders = "SELECT * FROM `reminders` WHERE student_email='$user_email'";
    $list_reminders = $con->query($command_reminders);
    $row_reminders = $list_reminders->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home_student.css">
</head>
<body>
    <nav>
        <div class="ollc-logo">
            <img src="img/logo.png">
            <img src="img/burger.png" class="burger_menu">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <button class="teacher_reminder_btn">REMINDERS</button>
            <form method="post">
                <button name="logout_btn" class="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>
    <!------------------------------------------------- section -->
    <img src="img/bg.jpg" class="image_bg">
    <section>
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
                <?php if($num_grades != 0){ ?>
                    <tr>
                        <td class="subjects">Filipino</td>
                        <td><?php echo $row['f_1']?></td>
                        <td><?php echo $row['f_2']?></td>
                        <td><?php echo $row['f_3']?></td>
                        <td><?php echo $row['f_4']?></td>
                    </tr>
                    <tr>
                        <td class="subjects">English</td>
                        <td><?php echo $row['e_1']?></td>
                        <td><?php echo $row['e_2']?></td>
                        <td><?php echo $row['e_3']?></td>
                        <td><?php echo $row['e_4']?></td>
                    </tr>
                    <tr>
                        <td class="subjects">Science</td>
                        <td><?php echo $row['s_1']?></td>
                        <td><?php echo $row['s_2']?></td>
                        <td><?php echo $row['s_3']?></td>
                        <td><?php echo $row['s_4']?></td>
                    </tr>
                    <tr>
                        <td class="subjects">Mathematics</td>
                        <td><?php echo $row['m_1']?></td>
                        <td><?php echo $row['m_2']?></td>
                        <td><?php echo $row['m_3']?></td>
                        <td><?php echo $row['m_4']?></td>
                    </tr>
                    <tr>
                        <td class="subjects">History</td>
                        <td><?php echo $row['h_1']?></td>
                        <td><?php echo $row['h_2']?></td>
                        <td><?php echo $row['h_3']?></td>
                        <td><?php echo $row['h_4']?></td>
                    </tr>
                    <tr>
                        <td class="subjects">Physical Education</td>
                        <td><?php echo $row['p_1']?></td>
                        <td><?php echo $row['p_2']?></td>
                        <td><?php echo $row['p_3']?></td>
                        <td><?php echo $row['p_4']?></td>
                    </tr>
                <?php }else{ ?>
                    <tr>
                        <td colspan="5">NO RECORD YET!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <div class="reminders_wrapper">
        <table class="reminders_table">
            <thead>
                <tr>
                    <th>FROM</th>
                    <th>MESSAGE</th>
                </tr>
            </thead>
            <tbody>
                    <?php do{ ?>
                        <tr class="reminders_td">
                            <td class="td_border"><?php echo $row_reminders['from'] ?><br><?php echo $row_reminders['date']?></td>
                            <td class="td_border"><?php echo $row_reminders['message'] ?></td>
                        </tr>
                    <?php }while($row_reminders = $list_reminders->fetch_assoc()) ?>
                    <tr class="reminders_td">
                        <td colspan="2"><button class="close_reminder_btn">CLOSE</button></td>
                    </tr>
            </tbody>
        </table>

    </div>
    

    <script src="js/home_student.js"></script>
</body>
</html>
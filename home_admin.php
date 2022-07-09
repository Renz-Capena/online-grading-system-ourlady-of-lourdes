<?php 
    require "connection.php";
    $con = connect();
    session_start();

    if(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){

        header("location: index.php");
    }
    if($_SESSION['status'] == 'teacher'){

        header("location: home_teacher.php");
    }

    if($_SESSION['status'] == 'student'){
        
        header("location: home_student.php");
    }

    $command = "SELECT * FROM `students`";
    $list = $con->query($command);
    $row_students = $list->fetch_assoc();
    $numrow_student = $list->num_rows;

    $command_1 = "SELECT * FROM `teachers`";
    $list_1 = $con->query($command_1);
    $row_teacher = $list_1->fetch_assoc();
    $numrow_teacher = $list_1->num_rows;




    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);
        // unset($_SESSION['user_id']);

        header("location: index.php");
    }

    if(isset($_POST['create_btn'])){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $grade = $_POST['grade'];
        $status = $_POST['status'];
        $card = $_POST['card'];
        

        $command = "INSERT INTO `students`(`f_name`, `l_name`, `email`, `password`, `grade`, `status`, `card`) VALUES ('$f_name','$l_name','$email','$pass','$grade','$status', '$card')";
        $con->query($command);

        header("location: home_admin.php");
    }

    if(isset($_POST['create_btn_teacher'])){
        // echo "<script>alert('sadaw')</script>";

        $f_name_teacher = $_POST['f_name_teacher'];
        $l_name_teacher = $_POST['l_name_teacher'];
        $email_teacher = $_POST['email_teacher'];
        $pass_teacher = $_POST['password_teacher'];
        $status_teacher = $_POST['status_teacher'];

        $command = "INSERT INTO `teachers`(`f_name`, `l_name`, `email_teacher`, `password_teacher`, `status`) VALUES ('$f_name_teacher','$l_name_teacher','$email_teacher','$pass_teacher','$status_teacher')";
        $con->query($command);

        header("location: home_admin.php");
    }

    if(isset($_POST['delete_teacher_btn'])){
        $user_id = $_POST['teacher_delete_id'];

        $command = "DELETE FROM `teachers` WHERE id='$user_id'";
        $con->query($command);

        header("location: home_admin.php");
    }

    if(isset($_POST['delete_students_btn'])){
        $user_id = $_POST['students_delete_id'];

        $command = "DELETE FROM `students` WHERE id='$user_id'";
        $con->query($command);

        $command_delete_students_grades = "DELETE FROM `grades` WHERE user_id='$user_id'";
        $con->query($command_delete_students_grades);

        header("location: home_admin.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home_admin.css">
</head>
<body>
    <img src="img/bg.jpg" class="image_bg">
    <nav>
        <div class="ollc-logo">
            <img src="img/logo.png">
            <img src="img/burger.png" class="burger_menu">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <a href="#" class="teacher_btn">ADD TEACHERS</a>
            <a href="#" class="student_btn">ADD STUDENT</a>
            <form method="post">
                <button name="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>

        <div class="student_form">

            <h2>Create Student Record</h2>

            <form method="post" class="signin_form">

                <div class="container_info_login">
                    <label>First Name : </label>
                    <input type="text" name="f_name" required>
                    <br><br>
                    <label>Last name : </label>
                    <input type="text" name="l_name" required>
                    <br><br>
                    <label>Email : </label>
                    <input type="email" name="email" required>
                    <br><br>
                    <label>Password : </label>
                    <input type="password" name="password" required>
                    <br><br>
                    <label>Grade : </label>
                    <select name="grade">
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                    </select>
                    <br>
                    <input type="hidden" value="NO RECORD" name="card">
                     <input type="hidden" name="status" value="student">
                </div>
                
                <button class="btn_theme_2 create_btn" name="create_btn">CREATE</button>
                <a class="btn_theme_2 close_btn" >CLOSE</a>
            </form>

        </div>

        <div class="teacher_form">
            <h2>Add Teacher</h2>

            <form method="post" class="teacher_signin_form">

                <div class="container_info_login">
                    <label>First Name : </label>
                    <input type="text" name="f_name_teacher" required>
                    <br><br>
                    <label>Last name : </label>
                    <input type="text" name="l_name_teacher" required>
                    <br><br>
                    <label>Email : </label>
                    <input type="email" name="email_teacher" required>
                    <br><br>
                    <label>Password : </label>
                    <input type="password" name="password_teacher" required>
                    <br><br>
                    <input type="hidden" name="status_teacher" value="teacher">
                    <br>
                </div>

                <button class="btn_theme_2" name="create_btn_teacher">CREATE</button> 
                <a class="btn_theme_2 close_btn_teacher" >CLOSE</a>
            </form>
        </div>

        <div class="table_wrapper">
            <table class="teacher_table">
                <caption>TEACHERS LIST</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($numrow_teacher != 0){ ?>

                    <?php do{ ?>
                    <tr>
                        <td><?php echo $row_teacher['id'] ?></td>
                        <td><?php echo $row_teacher['f_name'] ?></td>
                        <td><?php echo $row_teacher['l_name'] ?></td>
                        <td><?php echo $row_teacher['email_teacher'] ?></td>
                        <td><?php echo $row_teacher['password_teacher'] ?></td>

                        <td class="action_row">

                            <a href="edit_teacher.php?id=<?php echo $row_teacher['id'] ?>" class="btn">EDIT</a>

                            <form method="post">
                                <button class="btn" name="delete_teacher_btn">DELETE</button>
                                <input type="hidden" name="teacher_delete_id" value="<?php echo $row_teacher['id'] ?>">
                            </form>

                        </td>
                    </tr>
                    <?php }while( $row_teacher = $list_1->fetch_assoc()) ?>

                    <?php }else{ ?>
                        
                        <tr>
                            <td colspan="6">PLEASE CREATE A TEACHER</td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

            <table class="student_table">
                <caption>STUDENT LIST</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>GRADE</th>
                        <th>CARD STATUS</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if($numrow_student != 0){ ?>

                        <?php do{ ?>
                        <tr>
                            <td><?php echo $row_students['id'] ?></td>
                            <td><?php echo $row_students['f_name'] ?></td>
                            <td><?php echo $row_students['l_name'] ?></td>
                            <td><?php echo $row_students['grade'] ?></td>
                            <td><?php echo $row_students['card'] ?></td>
                            <td><?php echo $row_students['email'] ?></td>
                            <td><?php echo $row_students['password'] ?></td>
                            <td class="action_row">

                                <a href="edit_students.php?id=<?php echo $row_students['id'] ?>" class="btn">EDIT</a>

                                <form method="post">
                                    <button class="btn" name="delete_students_btn">DELETE</button>
                                    <input type="hidden" name="students_delete_id" value="<?php echo $row_students['id'] ?>">
                                </form>

                            </td>
                        </tr>
                        <?php }while($row_students = $list->fetch_assoc()) ?>

                    <?php }else{ ?>
                        <tr>
                            <td colspan="8">PLEASE CREATE STUDENT RECORD</td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>




    










    <script src="js/js_admin.js"></script>
</body>
</html>
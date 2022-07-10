<?php 
    require "connection.php";
    $con = connect();

    $command = "SELECT * FROM `students`";
    $list = $con->query($command);
    $row_students = $list->fetch_assoc();

    $command_1 = "SELECT * FROM `teachers`";
    $list_1 = $con->query($command_1);
    $row_teacher = $list_1->fetch_assoc();




    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);
        unset($_SESSION['user_id']);

        header("location: index.php");
    }


    if(isset($_POST['delete_teacher_btn'])){
        header("location: home_admin.php");
    }
    if(isset($_POST['delete_students_btn'])){
        header("location: home_admin.php");
    }

    $user_id = $_GET['id'];

    $command_2 = "SELECT * FROM `teachers` WHERE id='$user_id'";
    $list_2 = $con->query($command_2);
    $row_2 = $list_2->fetch_assoc();

    if(isset($_POST['update_teacher_btn'])){
        $f_name_teacher = $_POST['f_name_teacher'];
        $l_name_teacher = $_POST['l_name_teacher'];
        $email_teacher = $_POST['email_teacher'];
        $pass_teacher = $_POST['password_teacher'];
        $status_teacher = $_POST['status_teacher'];

        $command = "UPDATE `teachers` SET `f_name`='$f_name_teacher',`l_name`='$l_name_teacher',`email_teacher`='$email_teacher',`password_teacher`='$pass_teacher',`status`='$status_teacher' WHERE id='$user_id'";
        $con->query($command);

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
            <img src="img/burger.png" class="burger_menu burger_menu_copy">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <a href="home_admin.php" >ADD TEACHERS</a>
            <a href="home_admin.php" >ADD STUDENT</a>
            <form method="post">
                <button name="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>

        <!-- <div class="student_form">

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
                    <br><br>
                     <input type="hidden" name="status" value="student">
                    <br>
                </div>
                
                <button class="btn create_btn" name="create_btn">CREATE</button>
                <a class="btn close_btn" >CLOSE</a>
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

                <button class="btn" name="create_btn_teacher">CREATE</button> 
                <a class="btn close_btn_teacher" >CLOSE</a>
            </form>
        </div> -->

        <div class="teacher_form_update">
            <h2>Update Teacher info</h2>
            <form method="post" class="teacher_signin_form">

                <div class="container_info_login">
                    <label>First Name : </label>
                    <input type="text" name="f_name_teacher" value="<?php echo $row_2['f_name'] ?>"required>
                    <br><br>
                    <label>Last name : </label>
                    <input type="text" name="l_name_teacher" value="<?php echo $row_2['l_name'] ?>"required>
                    <br><br>
                    <label>Email : </label>
                    <input type="email" name="email_teacher" value="<?php echo $row_2['email_teacher'] ?>" required>
                    <br><br>
                    <label>Password : </label>
                    <input type="text" name="password_teacher" value="<?php echo $row_2['password_teacher'] ?>" required>
                    <br><br>
                    <input type="hidden" name="status_teacher" value="teacher">
                    <br>
                </div>

                <button class="btn_update_teacher" name="update_teacher_btn">UPDATE</button> 
                <a class="btn_update_teacher" href="home_admin.php" >CLOSE</a>
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
                    <?php do{ ?>
                    <tr>
                        <td><?php echo $row_teacher['id'] ?></td>
                        <td><?php echo $row_teacher['f_name'] ?></td>
                        <td><?php echo $row_teacher['l_name'] ?></td>
                        <td><?php echo $row_teacher['email_teacher'] ?></td>
                        <td><?php echo $row_teacher['password_teacher'] ?></td>

                        <td class="action_row">

                            <a href="home_admin.php" class="btn">EDIT</a>

                            <form method="post">
                                <button class="btn" name="delete_teacher_btn">DELETE</button>
                                <input type="hidden" name="teacher_delete_id" value="<?php echo $row_teacher['id'] ?>">
                            </form>
                            
                        </td>
                    </tr>
                    <?php }while( $row_teacher = $list_1->fetch_assoc()) ?>
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

                        <a href="home_admin.php" class="btn">EDIT</a>
                            

                            <form method="post">
                                <button class="btn" name="delete_students_btn">DELETE</button>
                                <input type="hidden" name="students_delete_id" value="<?php echo $row_students['id'] ?>">
                            </form>

                        </td>
                    </tr>
                    <?php }while($row_students = $list->fetch_assoc()) ?>
                </tbody>

            </table>
        </div>




    










    <script src="js/js_admin.js"></script>
    <script src="js/edit_teacher.js"></script>
</body>
</html>
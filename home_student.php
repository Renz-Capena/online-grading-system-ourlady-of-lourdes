<?php 
    require "connection.php";
    $con = connect();
    session_start();

    $student_id = $_SESSION['user_id'];

    $command = "SELECT * FROM `grades` WHERE user_id='$student_id'";
    $list = $con->query($command);
    $row = $list->fetch_assoc();





    if(isset($_POST['logout_btn'])){
        unset($_SESSION['status']);
        unset($_SESSION['user_id']);

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
    <link rel="stylesheet" href="css/home_student.css">
</head>
<body>
    <nav>
        <div class="ollc-logo">
            <img src="img/logo.png">
            <p>OUR LADY OF LOURDES COLLEGE OF VALENZUELA</p>
        </div>
        <div class="nav-sub">
            <a href="#">TEACHER REMINDERS</a>
            <form method="post">
                <button name="logout_btn">LOGOUT</button>
            </form>
        </div>
    </nav>
    <!------------------------------------------------- section -->
    <img src="img/bg.jpg" class="image_bg">
    <section>
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
            </tbody>
        </table>
    </section>
    

    
</body>
</html>
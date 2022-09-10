<?php
session_start();
// if (!isset($_SESSION["user_name"])){
//     ?>
//     <script>
//         window.location="login.php";
//     </script>
//     <?php
// }
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teacher Sign Up</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">


</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">ArchUpload</h1>
</div>


<body class="login" style="margin-top: -20px;">



<div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form name="form1" action="" method="post">
            <h2>Teacher Sign Up</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="FirstName" name="first_name" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="LastName" name="last_name" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="Username" name="user_name" required=""/>
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
            </div>
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
            </div>
<div class="btn btn-default col-lg-4 col-lg-push-4">
<a href="../index.php">Login</a>
           </div>
        </form>
    </section>
    <?php
            if (isset($_POST["submit1"])) {
                $count = 0;
                $res = mysqli_query($link, "select * from admin where email='$_POST[email]'");
                $count = mysqli_num_rows($res);
                if ($count == 0) {
                    $res = mysqli_query($link, "select * from student_registration where email='$_POST[email]'");
                    $count = mysqli_num_rows($res);
                    if ($count == 0) {
                        $sql = "insert into teacher_registration VALUES ('','$_POST[first_name]','$_POST[last_name]','$_POST[user_name]','$_POST[password]','$_POST[email]','0','pending')";
                        if (mysqli_query($link, $sql)) { ?>
                            <div class="alert alert-success col-lg-12 col-lg-push-0">
                                Registration successfull
                            </div>
                            <div class="alert alert-success col-lg-12 col-lg-push-0">
                                <a href="../index.php">Login</a>
                            </div>
                            <?php } else {
                            echo "Error: ". mysqli_error($link);
                        } ?>
                    <?php } else {   ?>
                        <div class="alert alert-danger col-lg-12 col-lg-push-0">
                            An account already exists with this email <a href="../index.php">Please Login</a>
                        </div>
                    <?php }
                } else { ?>
                    <div class="alert alert-danger col-lg-12 col-lg-push-0">
                    An account already exists with this email <a href="../index.php">Please Login</a>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </body>
</html>
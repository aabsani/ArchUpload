<?php
Session_start ();
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

    <title>Head Of Department Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    	<style>
      #nav ul {
        overflow: hidden;
        margin: 0;
        padding: 0;
        list-style-type: none;
      }
      #nav ul li {
        float: left;
      }
      #nav ul li a {
        display: inline-block;
        padding: 10px 15px;
      }
      #content {
        padding: 15px;
      }
    </style>
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">ArchUpload</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Head Of Department</h1>

            <div>
                <input type="text" name="user_name" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <!--<a class="reset_pass" href="#">Lost your password?</a>-->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <!--<p class="change_link">New to site?-->
                    <!--<a href="#"> Create Account </a>-->
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>
    <?php
    if (isset($_POST["submit1"]))
    {
        $count=0;
        $res = mysqli_query($link,"select * from admin where user_name='$_POST[user_name]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);
        if ($count==0)
        {
            ?>
            <div class="">
                Invalid Username Or Password.
            </div>
        <?php
        }else
        {
        $_SESSION['admin']=$_POST["user_name"];
        ?>
            <script type="text/javascript">
                window.location="dashboard.php";
            </script>
            <?php
        }
    }
    ?>
<nav id="nav">
      <ul>
        <li><a href="../teacher/login.php" data-target="home"><h2>Teacher Login</h2></a></li>
        <li><a href="../student/login.php" data-target="about"><h2>Student Login</h2></a></li>
      </ul>
    </nav>
</div>

</body>
</html>

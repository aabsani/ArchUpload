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

    <title>Teacher Login</title>

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
            <h1>Teacher Login</h1>

            <div>
                <input type="text" name="user_name" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                

                <div class="clearfix"></div>
                <br/>

<p class="change_link">
                    <a href="registration.php"> Create Account </a>
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
        $res = mysqli_query($link,"select * from teacher_registration where user_name='$_POST[user_name]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);
        if ($count==0)
        {
            ?>
            <div class="alert alert-danger col-lg-8 col-lg-push-3">
                <strong style="color:white">Invalid</strong> Username Or Password.
            </div>
        <?php
        }else
        {
        $_SESSION['teacher']=$_POST["user_name"];
        
        while ($resultSession=mysqli_fetch_array($res)) {
            $_SESSION["teacher_id"] = $resultSession['id'];
        }
        ?>
            <script type="text/javascript">
                window.location="admin.php";
            </script>
            <?php
        }
    }
    ?>
<nav id="nav">
      <ul>
        <li><a href="../superadmin/login.php" data-target="home"><h2>Admin Login</h2></a></li>
        <li><a href="../student/login.php" data-target="about"><h2>student Login</h2></a></li>
      </ul>
    </nav>
</div>

</body>
</html>

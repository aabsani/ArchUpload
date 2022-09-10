<?php
session_start();
include "superadmin/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ArchUpload Login Page</title>

    <!-- Bootstrap -->
    <link href="superadmin/css/bootstrap.min.css" rel="stylesheet">
    <link href="superadmin/css/animate.min.css" rel="stylesheet">
    <link href="superadmin/css/custom.min.css" rel="stylesheet">
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
            <h1> Login </h1>

            <div>
                <input type="text" name="user_name" class="form-control" placeholder="Email" required=""/>
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
                    <a href="student/registration.php"> Sign Up as Student</a> Or<a href="teacher/registration.php"> Sign Up as Teacher</a>
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
        $res = mysqli_query($link,"select * from admin where email='$_POST[user_name]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);
        if ($count==0)  { ?>
        <?php
if (isset($_POST["submit1"]))
{
    $count=0;
    $res = mysqli_query($link,"select * from student_registration where email='$_POST[user_name]' && password='$_POST[password]' && status='active'");
    $count=mysqli_num_rows($res);
    if ($count==0) { ?>
    
     <?php
    if (isset($_POST["submit1"]))
    {
        $count=0;
        $res = mysqli_query($link,"select * from teacher_registration where email='$_POST[user_name]' && password='$_POST[password]' && status='active'");
        $count=mysqli_num_rows($res);
        if ($count==0)
        {
            ?>
            <div class="alert alert-danger col-lg-8 col-lg-push-3">
                <strong style="color:white">Invalid</strong> Email Or Password.
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
                window.location="teacher/admin.php";
            </script>
            <?php
        }
    }
    ?>
     
        <?php  }else {
        $_SESSION["user_name"]=$_POST["user_name"];
        
        while ($resSession=mysqli_fetch_array($res)) {
        
            $_SESSION["student_id"] = $resSession['id'];
        }
        
        ?>
    <script type="text/javascript">
          window.location="student/admin.php";
    </script>
<?php
    }
}
?>
            
        <?php }else {
        $_SESSION['admin']=$_POST["user_name"];
        ?>
            <script type="text/javascript">
                window.location="superadmin/dashboard.php";
            </script>
            <?php
        }
    }
    ?>
    </nav>
</div>

</body>
</html>

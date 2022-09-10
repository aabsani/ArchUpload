<?php
session_start();
if (!isset($_SESSION["admin"])){
    ?>
    <script>
        window.location="login.php";
    </script>
    <?php
}
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html-templates.multipurposethemes.com/bootstrap-4/admin/minimaladmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Dec 2017 14:29:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>ArchUpload</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../admin/assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../admin/assets/vendor_components/font-awesome/css/font-awesome.css">

    <!-- ionicons -->
    <link rel="stylesheet" href="../admin/assets/vendor_components/Ionicons/css/ionicons.css">

    <!-- theme style -->
    <link rel="stylesheet" href="../admin/css/master_style.css">

    <!-- minimal_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../admin/css/skins/_all-skins.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../admin/assets/vendor_components/jvectormap/jquery-jvectormap.css">

    <!-- date picker -->
    <link rel="stylesheet" href="../admin/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="../admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
    
    <link rel="stylesheet" href="../admin/assets/vendor_components/select2/dist/css/select2.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu" style="margin-top: 30px;">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-block btn-danger"><i class="ion ion-power"></i> Log Out</a>
                        </div>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                
                <div class="info float-left">
                    <p>Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">

              </span>
                    </div>
                </form>
                <!-- /.search form -->
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-home"></i> <span>Home</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                </li>
                <li>
                    <a href="display_teachers_info.php">
                        <i class="fa fa-files-o"></i>
                        <span>View Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="display_student_info.php">
                        <i class="fa fa-files-o"></i>
                        <span>View Students</span>
                    </a>
                </li>
                <li>
                    <a href="view_project.php">
                        <i class="fa fa-files-o"></i>
                        <span>View Projects</span>
                    </a>
                </li>
                <li>
                    <a href="view-mark.php">
                        <i class="fa fa-edit"></i>
                        <span>View Grades</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="send_notification_student.php">
                        <i class="fa fa-envelope"></i> <span>Message Student</span>
                    </a>
                </li>
            </ul>
        </section>

    </aside>
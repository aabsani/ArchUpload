<?php
session_start();
if (!isset($_SESSION["teacher"]))
{
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
include "header.php";
include "connection.php";
?>
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <section class="content-header">
        <h1>
            Send Message
        </h1>

    </section>
    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="card-title">Send Message To Student</h3>
                <h6 class="card-subtitle"> <a href="http://reactiveraven.github.io/jqBootstrapValidation/"></a></h6>

            
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form novalidate action="" method="post">
                            <table class="col-6">
                                <thead>
                                <?php
                                $res = mysqli_query($link,"select * from assign_student WHERE teacher_id='$_SESSION[teacher_id]'");
                                
                                    while ($row=mysqli_fetch_array($res))
                                       {

                                ?>
                                <tr>
                                    <td>
                                        <h5>Student<span class="text-danger">*</span></h5>
                                        <select name="duser_name" class="form-control">
                                            <?php
                                            $stu_id=$row["student_id"];
                                            $result = mysqli_query($link,"select * from student_registration WHERE id='$stu_id'");
                                            while ($rows=mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $rows["user_name"];?>"><?php echo $rows["user_name"]."(".$rows["student_num"].")";?></option>
                                                <?Php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php } ?>
                                </thead>
                            </table>
                                <table>
                                    <div class="form-group">
                                        <h5>Subject<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Messsage<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea type="text"  name="message" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit2" class="btn btn-info">Send Message</button>
                                    </div>
                                </table>
<?php

?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["submit2"])){
            mysqli_query($link,"insert into message VALUES ('','$_SESSION[teacher]','$_POST[duser_name]','$_POST[title]','$_POST[message]','n')");

            ?>
                <script>
                    alert("Message sent successfully")
                </script>
                <?php
        }
        ?>

    </section>
</div>



<?php
include "footer.php";
?>


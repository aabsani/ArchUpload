<?php
include "header.php";
if (!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}

include "connection.php";
?>
<div class="content-wrapper">
    <section class="content-header">

    </section>
    <section class="content">
    
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="card-title">Send Message To Student</h3>
            
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form novalidate action="" method="post">
                            <table class="col-6">
                                <thead>
                               
                                <tr>
                                    <td>
                                        <h5>Recipient<span class="text-danger">*</span></h5>
                                        <select name="duser_name" class="form-control">
                                            <?php
                                            $res = mysqli_query($link,"select * from student_registration WHERE status='Active'");
                                            while ($row=mysqli_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $row["user_name"];?>"><?php echo $row["user_name"]."(".$row["student_num"].")";?></option>
                                                <?Php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                </thead>
                            </table>
                                <table>
                                    <div class="form-group">
                                        <h5>Subject<span class="text-danger">*</span></h5>
                                            <input type="text" value="" name="title" class="form-control" required=""/>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Messsage<span class="text-danger">*</span></h5>
                                            <textarea type="text"  name="message" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
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
            mysqli_query($link,"insert into message VALUES ('','$_SESSION[admin]','$_POST[duser_name]','$_POST[title]','$_POST[message]','n')");

            ?>
                <script>
                    alert("Message has been delivered!")
                </script>
                <?php
        }
        ?>

    </section>
</div>



<?php
include "footer.php";
?>


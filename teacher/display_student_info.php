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
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Assigned Students Information
            </h1>

        </section>

<div class="box">
    
    <div class="box-body">
        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
                <?php
                        $assigned = mysqli_query($link,"select * from assign_student WHERE teacher_id='$_SESSION[teacher_id]'");
                         if(mysqli_num_rows($assigned) > 0){
                        while ($assigned_stu = mysqli_fetch_array($assigned)) {
                ?>
                                                
                <?php  
					    $stud_id = $assigned_stu['student_id'];
					    $student_name = mysqli_query($link,"select * from student_registration WHERE id='$stud_id'");
                            
                 ?>
            <tr>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($student_name_row = mysqli_fetch_array($student_name)) {
            
            ?>
            <tr>
                <td><?php echo $student_name_row["user_name"];?></td>
                <td><?php echo $student_name_row["student_num"]?></td>
                <td><button><a href="student-profile.php?id=<?php echo $student_name_row['id']; ?>">View Profile</a></button></td>

            </tr>
            <?php
            }
            }
                        }
            ?>
            </tbody>
        </table>


    </div>
</div>
    </div>
<?php
include "footer.php";
?>
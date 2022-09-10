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
            <h1>
                Projects
            </h1>
        </section>

        <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                    <thead>
                    <?php
                    $res = mysqli_query($link,"select * from add_project");
                    ?>
                    <tr>
                        <th>Student Name</th>
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row["student_user_name"]?></td>
                            <td><?php echo $row["project_title"]?></td>
                            <td><?php echo $row["project_description"]?></td>
                            <td><a href="../../student/<?php echo $row["project_file"];?>" class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download </a></td>
                        </tr>
                        <?php
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
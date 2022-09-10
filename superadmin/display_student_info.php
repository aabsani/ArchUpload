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
                Student Information
            </h1>

        </section>

<div class="box">
    
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
            <?php
            $res = mysqli_query($link,"select * from student_registration");
            ?>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User name</th>
                <th>Email</th>
                <th>Student Number</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Not Approve</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $row["first_name"]?></td>
                <td><?php echo $row["last_name"]?></td>
                <td><?php echo $row["user_name"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["student_num"]?></td>
                <td><?php echo $row["status"]?></td>
                <td><a href="approve.php?id=<?php echo $row['id']; ?>">Approve</a></td>
                <td><a href="not_approve.php?id=<?php echo $row['id']; ?>">Not Approve</a></td>
                <td><a href="student-profile.php?id=<?php echo $row['id']; ?>"><input type="submit" value="View" /></a></td>
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
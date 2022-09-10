<?php
include "header.php";
?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Homepage
            </h1>

        </section>

        <section class="content">
            <div class="row">
                    
                <div class="col-xl-6 col-md-6 col-12">
                    <a href="student-profile.php?id=<?php echo $_SESSION["student_id"]; ?>" style="text-decoration:none; color:white;">
                    <div class="info-box bg-black">
                        <div class="info-box-content">
                            <span class="info-box-number">Assigned Teacher </span>
                            <span class="info-box-number">
                                <?php
                            if ($st_result = mysqli_query($link, "SELECT * FROM assign_student where student_id=$_SESSION[student_id]")) {

    /* determine number of rows result set */
    $rows_count = mysqli_num_rows($st_result);

    echo $rows_count;
    /* close result set */
    mysqli_free_result($st_result);
}

/* close connection */
mysqli_close($link);
?>
                                </span>

                            <div class="progress">

                            </div>
                            <span class="progress-description">

                  </span>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <a href="view-marks.php" style="text-decoration:none; color:white;">
                    <div class="info-box bg-black">
                        

                        <div class="info-box-content">
                            <span class="info-box-number">View Mark</span>
                            <span class="info-box-number"><i class="fas fa-check"></i></span>

                            <div class="progress">
                            </div>
                            <span class="progress-description">
                  </span>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>
        </section>
    </div>
<?php
include "footer.php";
?>
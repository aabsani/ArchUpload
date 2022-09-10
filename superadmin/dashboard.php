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
                    <a href="display_teachers_info.php" style="text-decoration:none; color:white;">
                    <div class="info-box bg-black">
                        <span class="info-box-icon push-bottom"><i class="ion ion-ios-pricetag-outline"></i></span>

                        
                            <div class="info-box-content">
                            <span class="info-box-text">Registered Teachers </span>
                      
                            <span class="info-box-number">
                            <?php
                            if ($result = mysqli_query($link, "SELECT id FROM teacher_registration")) {

    $row_cnt = mysqli_num_rows($result);

echo $row_cnt;
    mysqli_free_result($result);
}

                            
                            ?>
                            </span>

                            <div class="progress">
                            </div>
                            <span class="progress-description">
                  </span>
                        </div>
                       
                    </div>
                     </a>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <a href="display_student_info.php" style="text-decoration:none; color:white;">
                    <div class="info-box bg-black">
                        <span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>

                        
                            <div class="info-box-content">
                            <span class="info-box-text">Registered Students</span>
                            <span class="info-box-number">
                            <?php
                            if ($st_result = mysqli_query($link, "SELECT id FROM student_registration")) {

    /* determine number of rows result set */
    $rows_count = mysqli_num_rows($st_result);

    // printf("Result set has %d rows.\n", $row_cnt);
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
                    
                    </div>
                        </a>
                </div>
                
            </div>
        </section>
    </div>
<?php
include "footer.php";
?>
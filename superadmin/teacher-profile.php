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
$t_id = $_GET['id'];
$msg ='';
if(isset($_POST['submit'])){
    $stu_id = $_POST['student_id'];
    $date = $_POST['date'];
    // assign_student
    $sql =  "insert into assign_student VALUES ('','$stu_id','$t_id','$date')";
    $res =  mysqli_query($link,$sql);
    if($res ==  true){
        $msg = '1';
    }

    
}


if(isset($_POST['delete'])){
    $assign_id = $_POST['assign_id'];
    $sql = "delete from assign_student where id = $assign_id";
    $res =  mysqli_query($link,$sql);
    if($res ==  true){
        $msg = '2';
    }
}

?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Teacher Profile
            </h1>
        </section>
<section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

        <?php
       
          $teacher = mysqli_query($link,"select * from teacher_registration WHERE id='$t_id'");
          while ($teacherr=mysqli_fetch_array($teacher)) {
        ?>
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="text-center"><?php echo $teacherr['first_name'].' '.$teacherr['last_name'];?></h3>

            
              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
						<p>Email address </p>
						<h6 class="margin-bottom"><?php echo $teacherr['email']; ?></h6>
						<p>Status</p>
						<h6 class="margin-bottom"><?php 
						
						if($teacherr['status'] == 'Active'){
						 echo 'Active';   
						}else{
						    echo 'Pending';
						}
						
						
						?></h6>
						
					</div>
             	</div>
              </div>
            </div>
          </div>
          
          <?php } ?>
        </div>
        <div class="col-xl-8 col-lg-7">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php if($msg == '1'){
              ?>
              <li><a href="#timeline" data-toggle="tab">Student Submitted Project</a></li>
              <li><a href="#activity" data-toggle="tab">Student List</a></li>
              <li><a class="active" href="#settings" data-toggle="tab">Assign student</a></li>
              <?php }elseif($msg == '2'){ ?>
                   <li><a href="#timeline" data-toggle="tab">Student Submited Project</a></li>
              <li><a href="#activity" class="active" data-toggle="tab">Student List</a></li>
              <li><a href="#settings" data-toggle="tab">Assign student</a></li>
            <?php  } else {
              ?>
                    <li><a class="active" href="#timeline" data-toggle="tab">Student Submitted Project</a></li>
              <li><a href="#activity" data-toggle="tab">Student List</a></li>
              <li><a href="#settings" data-toggle="tab">Assign Student</a></li>
              <?php } ?>
            </ul>
                        
            <div class="tab-content">
            <?php if($msg == '1' || $msg == '2'){
              ?>  
             <div class="tab-pane" id="timeline">
                <?php }else{ ?>  
                <div class="active tab-pane" id="timeline">
                        <?php } ?>
                <ul class="timeline">
				<?php
				
				$assignedStudent = mysqli_query($link,"select * from assign_student WHERE teacher_id='$t_id'");
                while ($assignedStudentid = mysqli_fetch_array($assignedStudent)) {
                $stId = $assignedStudentid['student_id'];
				$projects = mysqli_query($link,"select * from add_project WHERE student_id='$stId'");
                while ($project=mysqli_fetch_array($projects)) {
				?>
					<li>
					  <i class="ion ion-email bg-blue"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> <?php  echo $project['submit_time']; ?></span>

						<h3 class="timeline-header"><?php echo $project['project_title'];?></h3>
                         
						<div class="text-left">
						 <?php echo $project['project_description'];?> 
						 
						</div>
                        <br><div class="description">
                          <?php 
                           $stuname = mysqli_query($link,"select * from student_registration WHERE id='$stId'");
                            while ($studentrow_name = mysqli_fetch_array($stuname)) {
                            echo "Project Submitted by ".$studentrow_name["user_name"]."(".$studentrow_name["student_num"].")";
                            }
                            ?>
                         </div>
						<div class="timeline-footer text-right">
						  <a href="../student/<?php echo $project['project_file'];?>" class="btn btn-success btn-sm"> <i class="fa fa-download" aria-hidden="true"></i> Download Project</a>
						</div>
					  </div>
					</li>
					<?php } 
					
					}
					?>
					
				  </ul>
              </div>    
                <?php if($msg == '2'){    ?>  
              <div class="active tab-pane" id="activity">
                   <?php }else{ ?> 
                      <div class="tab-pane" id="activity">
                   <?php } ?>
                <p style="color:green;"> <?php 
						  if($msg == '2'){
						      echo "Assigned Student Deletion Successful!";
						      $msg = 0;
						  }
						  ?>
                  </p>
               <ul class="timeline">
				  <?php
                        $assigned = mysqli_query($link,"select * from assign_student WHERE teacher_id='$t_id'");
                         if(mysqli_num_rows($assigned) > 0){
                        while ($assigned_stu = mysqli_fetch_array($assigned)) {
                                                ?>
					<li>
					  <i class="ion ion-email bg-blue"></i>
					  <div class="timeline-item">
					      <?php  
					      $stud_id = $assigned_stu['student_id'];
					      $student_name = mysqli_query($link,"select * from student_registration WHERE id='$stud_id'");
                            while ($student_name_row = mysqli_fetch_array($student_name)) {
                        ?>
                        
					
						
						<h3 class="timeline-header"><?php echo $student_name_row["user_name"]."(".$student_name_row["student_num"].")";?></h3>
						<form class="text-right" action="" method="post">
                            <input type="hidden" name="assign_id" value="<?php echo $assigned_stu['id']; ?>"/>
                            <span class="time"> <input type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure?');"  value="Delete" /> </span>
                        </form>
						<?php }?>
						
					  </div>
					</li>
					<?php }
					}else{ ?>
					         <li>  <div class="timeline-item">No Assigned Student yet	 </div></li>
					<?php	}?>	
					
					
				  </ul>
                
              </div>
               <?php if($msg == '1'){    ?>  
                <div class="active tab-pane" id="settings">
                <?php }else{ ?>  
               <div class="tab-pane" id="settings">
                        <?php } ?>
          
                <form class="form-horizontal form-element col-12" method="post" action="">
                  
                  <p style="color:green;"> <?php 
						  if($msg == '1'){
						      echo "Student Assignment Successful!";
						      $msg = 0;
						  }
						  ?>
                  </p>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-4 control-label"> Student Name </label>

                    <div class="col-sm-4">
                      <select class="form-control select2" name="student_id" style="width: 100%;">
                           <?php
                                            $res = mysqli_query($link,"select * from student_registration WHERE status='yes'");
                                            while ($row=mysqli_fetch_array($res)) {
                                                ?>
                                                 <option value="<?php echo $row["id"];?>"><?php echo $row["user_name"]."(".$row["student_num"].")";?></option>
                                                <?Php
                                            }
                                            ?>
                 
                </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPhone" class="col-sm-4 control-label">Project Submission Date Line</label></label>

                    <div class="col-sm-4">
                      <input type="date" class="form-control date" name="date" id="inputPhone" placeholder="">
                    </div>
                  </div>
                
                  <div class="form-group row">
                        <label for="inputPhone" class="col-sm-4 control-label"></label></label>
                    <div class="col-sm-5">
                      <button type="submit" name="submit" class="btn btn-success">Assign Student</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- /.box -->
    </div>
<?php
include "footer.php";
?>
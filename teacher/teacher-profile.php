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
$t_id = $_GET['id'];
$msg ='';
if(isset($_POST['submit'])){
  $stu_id = $_POST['student_id'];
  $date = $_POST['date'];
  // 
  $sql_u = "SELECT * FROM assign_student WHERE student_id='$stu_id'";
  $res_u = mysqli_query($link,$sql_u);
  if (mysqli_num_rows($res_u) > 0) {
    $name_error = "This assignment has already been made!"; 	
  }else{
  
  $sql =  "insert into assign_student VALUES ('','$stu_id','$t_id','$date')";
  $res =  mysqli_query($link,$sql);
  if($res ==  true){
      $msg = '1';
  }

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

              <h3 class="profile-username text-center"><?php echo $teacherr['first_name'].' '.$teacherr['last_name'];?></h3>

              <p class="text-muted text-center"><?php echo $teacherr['status']; ?></p>
				<p class="text-center"><a href="teacher-profile.php?id=<?php echo $t_id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i>  Refresh</a> </p>
            
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
        <?php if (isset($name_error)): ?>
	  	<span style="color: red;"><?php echo $name_error; ?></span>
	  <?php endif ?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php if($msg == '1'){
              ?>
              <li><a href="#timeline" data-toggle="tab">Uploaded Project</a></li>
              <li><a href="#activity" data-toggle="tab">Student list</a></li>
              <li><a class="active" href="#settings" data-toggle="tab"></a></li>
              <?php }elseif($msg == '2'){ ?>
                   <li><a href="#timeline" data-toggle="tab">Uploaded Project</a></li>
              <li><a href="#activity" class="active" data-toggle="tab">Student list</a></li>
              <li><a href="#settings" data-toggle="tab"></a></li>
            <?php  } else {
              ?>
                    <li><a class="active" href="#timeline" data-toggle="tab">Uploaded Project</a></li>
              <li><a href="#activity" data-toggle="tab">Student list</a></li>
              <li><a href="#settings" data-toggle="tab"></a></li>
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
                         
						<div class="body">
						 <?php echo $project['project_description'];?> 
						 
						</div>
                        <mark class="description">
                          <?php 
                           $stuname = mysqli_query($link,"select * from student_registration WHERE id='$stId'");
                            while ($studentrow_name = mysqli_fetch_array($stuname)) {
                            echo "Project Submited by ".$studentrow_name["first_name"]."(".$studentrow_name["student_num"].")";
                            }
                            ?>
                         </mark>
						<div class="text-right">
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
						      echo "Assign Student Delete Successfully !!";
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
                        
					
						
						<h3 class="timeline-header"><?php echo $student_name_row["first_name"]." ".$student_name_row["last_name"]."(".$student_name_row["student_num"].")";?></h3>
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
          
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    </div>
<?php
include "footer.php";
?>
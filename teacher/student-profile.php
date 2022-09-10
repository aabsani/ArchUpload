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
$stu_id = $_GET['id'];

$msg ='';
if(isset($_POST['submit'])){
  $teacher_id = $_POST['teacher_id'];
  $date = $_POST['date'];
  // assign_student
  
  $sql_u = "SELECT * FROM assign_student WHERE student_id='$stu_id'";
  $res_u = mysqli_query($link,$sql_u);
  if (mysqli_num_rows($res_u) > 0) {
    $name_error = "This assignment has already been made!"; 	
  }else{
       $sql =  "insert into assign_student VALUES ('','$stu_id','$teacher_id','$date')";
  $res =  mysqli_query($link,$sql);
  if($res ==  true){
      $msg = '1';
  }
  
  }
  
 

  
}
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Student Profile
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Homepage</li>
            </ol>
        </section>
<section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

        <?php
       
          $student = mysqli_query($link,"select * from student_registration WHERE id='$stu_id'");
          while ($studentt=mysqli_fetch_array($student)) {
        ?>
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center"><?php echo $studentt['first_name'].' '.$studentt['last_name'];?></h3>
				<p class="text-center"><a href="student-profile.php?id=<?php echo $studentt['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i>  Refresh</a> </p>
            
              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
						<p>Email address </p>
						<h6 class="margin-bottom"><?php echo $studentt['email']; ?></h6>
						<p>Student Number </p>
						<h6 class="margin-bottom"><?php echo $studentt['student_num']; ?></h6>
						<p>Status</p>
						<h6 class="margin-bottom"><?php 
						
						if($studentt['status'] == 'yes'){
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
              <li><a href="#timeline" data-toggle="tab">Submited Project</a></li>
              <li><a href="#activity" data-toggle="tab">Teacher list</a></li>
              <li><a class="active" href="#settings" data-toggle="tab"></a></li>
              <?php }elseif($msg == '2'){ ?>
                   <li><a href="#timeline" data-toggle="tab">Submited Project</a></li>
              <li><a href="#activity" class="active" data-toggle="tab">Teacher list</a></li>
              <li><a href="#settings" data-toggle="tab"></a></li>
          <?php    }  else{
              ?>
                    <li><a class="active" href="#timeline" data-toggle="tab">Submited Project</a></li>
              <li><a href="#activity" data-toggle="tab">Teacher list</a></li>
              <li><a href="#settings" data-toggle="tab"></a></li>
              <?php } ?>
            </ul>
                        
            <div class="tab-content">
            <?php if($msg == '1' || $msg == '2'){
              ?>  
             <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <?php }else{ ?>  
                <div class="active tab-pane" id="timeline">
                        <?php } ?>
                <ul class="timeline">
				<?php
				$projects = mysqli_query($link,"select * from add_project WHERE student_id='$stu_id'");
                while ($project=mysqli_fetch_array($projects)) {
				?>
					<li>
					  <i class="ion ion-email bg-blue"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> <?php  echo $project['submit_time']; ?></span>

						<h3 class="timeline-header"><?php echo $project['project_title'];?></h3>

						<div class="timeline-body">
						 <?php echo $project['project_description'];?> 
						 
						</div>
						<div class="timeline-footer text-right">
						  <a href="../student/<?php echo $project['project_file'];?>" class="btn btn-success btn-sm"> <i class="fa fa-download" aria-hidden="true"></i> Download Project</a>
						</div>
												<div class="timeline-footer text-right">
						  <a href="give-mark.php?id=<?php echo $project['id'];?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Evaluate</a>
						</div>
					  </div>
					</li>
					<?php } ?>
					
				  </ul>
              </div>    
    <?php if($msg == '2'){    ?>  
              <div class="active tab-pane" id="activity">
                   <?php }else{ ?> 
                      <div class="tab-pane" id="activity">
                   <?php } ?>
                  
                  <p style="color:green;"> <?php 
						  if($msg == '2'){
						      echo "Assign Teacher Delete Successfully !!";
						      $msg = 0;
						  }
						  ?>
                  </p>
               <ul class="timeline">
				  <?php
                        $assigned = mysqli_query($link,"select * from assign_student WHERE student_id='$stu_id'");
                        if(mysqli_num_rows($assigned) > 0){
                        while ($assigned_teacher = mysqli_fetch_array($assigned)) {
                                                ?>
					<li>
					  <i class="ion ion-email bg-blue"></i>
					  <div class="timeline-item">
					      <?php  
					      $teacher_id = $assigned_teacher['teacher_id'];
					      $teacher_name = mysqli_query($link,"select * from teacher_registration WHERE id='$teacher_id'");
                            while ($teacher_name_row = mysqli_fetch_array($teacher_name)) {
                        ?>
                        
					
						
						<h3 class="timeline-header"><?php echo $teacher_name_row["user_name"];?></h3>
						<form class="text-right" action="" method="post">
                            <input type="hidden" name="assign_id" value="<?php echo $assigned_teacher['id']; ?>"/>
                            <span class="time"> <input type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure?');"  value="Delete" /> </span>
                        </form>
						<?php } ?>
						
					  </div>
					</li>
						
					<?php }
					}else{ ?>
					         <li>  <div class="timeline-item">No Assigned Teacher yet	 </div></li>
					<?php	}?>
					
				  </ul>
                
              </div>
               <?php if($msg == '1'){
              ?>  
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
<?php
session_start();
if (!isset($_SESSION["admin"]))
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
                Student Profile
            </h1>

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
						
						if($studentt['status'] == 'Active'){
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
              <li><a class="active" href="#settings" data-toggle="tab">Assign Teacher</a></li>
              <?php }elseif($msg == '2'){ ?>
                   <li><a href="#timeline" data-toggle="tab">Submited Project</a></li>
              <li><a href="#activity" class="active" data-toggle="tab">Teacher list</a></li>
              <li><a href="#settings" data-toggle="tab">Assign Teacher</a></li>
          <?php    }  else{
              ?>
                    <li><a class="active" href="#timeline" data-toggle="tab">Submitted Project</a></li>
              <li><a href="#activity" data-toggle="tab">Teacher list</a></li>
              <li><a href="#settings" data-toggle="tab">Assign Teacher</a></li>
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
					         <li>  <div class="timeline-item">No Assign Teacher yet	 </div></li>
					<?php	}?>
					
				  </ul>
                
              </div>
               <?php if($msg == '1'){
              ?>  
                <div class="active tab-pane" id="settings">
                <?php }else{ ?>  
               <div class="tab-pane" id="settings">
                        <?php } ?>
          
                <form class="form-horizontal form-element col-12" method="post" action="">
                  
                  <p style="color:green;"> <?php 
						  if($msg){
						      echo "Teacher Assign Successfully !!";
						      $msg = 0;
						  }
						  ?>
                  </p>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-4 control-label"> Teacher Name </label>

                    <div class="col-sm-4">
                      <select class="form-control select2" name="teacher_id" style="width: 100%;">
                           <?php
                                            $res = mysqli_query($link,"select * from teacher_registration WHERE status='Active'");
                                            while ($row=mysqli_fetch_array($res)) {
                                                ?>
                                                 <option value="<?php echo $row["id"];?>"><?php echo $row["user_name"];?></option>
                                                <?Php
                                            }
                                            ?>
                 
                </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPhone" class="col-sm-4 control-label">Project Submisson Date Line</label></label>

                    <div class="col-sm-4">
                      <input type="date" class="form-control date" name="date" id="inputPhone" placeholder="">
                    </div>
                  </div>
                
                  <div class="form-group row">
                        <label for="inputPhone" class="col-sm-4 control-label"></label></label>
                    <div class="col-sm-5">
                      <button type="submit" name="submit" class="btn btn-success">Assign Teacher</button>
                    </div>
                  </div>
                </form>
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
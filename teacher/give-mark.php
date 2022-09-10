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
$project_id = $_GET['id'];

if(isset($_POST['submit'])){
  $teacher_id = $_POST['teacher_id'];
  $student_id = $_POST['student_id'];
  $mark = $_POST['mark'];
  $comment = $_POST['comment'];
  // assign_student
  $sql_u = "SELECT * FROM mark WHERE project_id='$project_id'";
  $res_u = mysqli_query($link,$sql_u);
  if (mysqli_num_rows($res_u) > 0) {
    $name_error = "Project has already been evaluated!"; 	
  }else{
  
  $sql =  "insert into mark VALUES ('','$teacher_id','$student_id','$project_id','$mark','$comment')";
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
                Evaluate Project
            </h1>

        </section>
<!-- /.box -->
<section class="content">

      <div class="row">
        <div class="col-xl-8 col-lg-8">

        <?php
				$projects = mysqli_query($link,"select * from add_project WHERE id='$project_id'");
                while ($project=mysqli_fetch_array($projects)) {
				?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
                  <?php if (isset($name_error)): ?>
	  	<span style="color: red;"><?php echo $name_error; ?></span>
	  <?php endif ?>
						<p>Project Title </p>
						<h6 class="margin-bottom"><?php echo $project['project_title'];?></h6>
						<p>Project Description</p>
						<h6 class="margin-bottom"><?php echo $project['project_description'];?> </h6>
							   <form action="" method="post">
					    <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 control-label">Evaluate</label>

                  <div class="col-sm-10">
                    <input type="hidden" name="teacher_id" class="form-control" value="<?php echo $_SESSION["teacher_id"]; ?>"/>
                    <input type="hidden" name="student_id" class="form-control" value="<?php echo $project['student_id'];?>"/>
                    <input type="number" name="mark" class="form-control" placeholder="Score">
                  </div>
                </div>
          
				
				 <?php
                    $res = mysqli_query($link,"select isjury from teacher_registration WHERE id='$_SESSION[teacher_id]'");
                    ?>
                    <?php
                    while ($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <?php $isjury=$row["isjury"]?>
                        
                        <?php if ($isjury==1){ ?>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="comment" class="form-control" id="inputEmail3" placeholder="Your comment about project"></textarea>
                  </div>
                </div>
<?php } else { ?>
               
                <?php }  ?>
                 <button type="submit" name="submit" class="btn btn-info pull-right">Send Evaluation</button>
					</form>
					</div>
					
					
             	</div>
              </div>
          </div>
          
          <?php } }?>
        </div>

        </div>
      </div>

    </section>

    </div>
<?php
include "footer.php";
?>
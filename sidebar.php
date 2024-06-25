
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><a id="nav-title" href="index.php" ><i class="fas fa-home"></i>HOME</a>
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>

  <?php
	if(isset($_SESSION["AID"]))
	{
		echo'
      <div id="nav-content" >
     <a href="index.php" class="nav-button" ><i class="fas fa-school"></i><span>School Information</span></a>
    <a href="add_class.php" class="nav-button" ><i class="fas fa-users"></i><span>Class</span></a>
    <a href="add_sub.php" class="nav-button" ><i class="fas fa-book"></i><span>Subject</span></a>
    <a href="add_staff.php" class="nav-button" ><i class="fas fa-user-check"></i><span>Staff</span></a>
    <a href="view_staff.php" class="nav-button" ><i class="fas fa-user-tie"></i><span>View Staff</span></a>
    <a href="set_exam.php" class="nav-button" > <i class="fas fa-calendar-plus"></i><span>Set Exam</span></a>
     <a href="view_exam.php" class="nav-button" ><i class="fas fa-calendar-check"></i><span>View Exam</span></a>
    <a href="view_student.php" class="nav-button" ><i class="fas fa-user-graduate"></i><span>View Student</span></a>
    <hr/>
    <a href="../logout.php" class="nav-button" ><i class="fas fa-lock"></i><span>Logout</span></a>
    <div id="nav-content-highlight"></div>
  </div>		
		';
	
	
	}
	else{
		echo'
     <div id="nav-content" >
     <a href="index.php" class="nav-button" ><i class="fas fa-user-tie"></i><span>Profile</span></a>
    <a href="handle_class.php" class="nav-button" ><i class="fas fa-users"></i><span>Handled Classes <span style="opacity:0%">...</span></span></a>
    <a href="add_stud.php" class="nav-button" ><i class="fas fa-user-check"></i><span>Students</span></a>
    <a href="view_stud.php" class="nav-button" ><i class="fas fa-user-graduate"></i><span>View Student</span></a>
    <a href="view_exam.php" class="nav-button" > <i class="fas fa-calendar-check"></i><span>View Exam</span></a>
     <a href="add_mark.php" class="nav-button" ><i class="fas fa-file-signature"></i><span>Add Marks</span></a>
    <a href="view_mark.php" class="nav-button" ><i class="fas fa-chart-simple"></i><span>View Marks</span></a>
    <hr/>
    <a href="../logout.php" class="nav-button" ><i class="fas fa-lock"></i><span>Logout</span></a>
    <div id="nav-content-highlight"></div>
  </div>				
		';
	}


?>
</div>
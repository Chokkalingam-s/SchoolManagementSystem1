
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
     <a href="index.php" class="nav-button" ><i class="fas fa-palette"></i><span>School Information</span></a>
    <a href="add_class.php" class="nav-button" ><i class="fas fa-images"></i><span>Class</span></a>
    <a href="add_sub.php" class="nav-button" ><i class="fas fa-thumbtack"></i><span>Subject</span></a>
    <a href="add_staff.php" class="nav-button" style="color:#6a7584;"><i class="fas fa-heart"></i><span>Staff</span></a>
    <a href="view_staff.php" class="nav-button" style="color:#6a7584;"><i class="fas fa-chart-line"></i><span>View Staff</span></a>
    <a href="set_exam.php" class="nav-button" style="color:#6a7584;"> <i class="fas fa-fire"></i><span>Set Exam</span></a>
     <a href="view_exam.php" class="nav-button" style="color:#6a7584;"><i class="fas fa-magic"></i><span>View Exam</span></a>
    <a href="student.php"target="_blank" class="nav-button" style="color:#6a7584;"><i class="fas fa-magic"></i><span>View Student</span></a>
    <hr/>
    <a href="../logout.php" class="nav-button" style="color:#2c3e50;"><i class="fas fa-gem"></i><span>Logout</span></a>
    <div id="nav-content-highlight"></div>
  </div>		
		';
	
	
	}
	else{
		echo'
			<li class="li"><a href="teacher_home.php">Profile</a></li>
			<li class="li"><a href="handle_class.php"> Handled Class</a></li>
			<li class="li"><a href="add_stud.php"> Students</a></li>
			<li class="li"><a href="view_stud_teach.php" target="_blank"> View Student</a></li>

			<li class="li"><a href="tech_view_exam.php">View Exam</a></li>
			<li class="li"><a href="add_mark.php">Add Marks</a></li>
			<li class="li"><a href="view_mark.php">View Marks</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>

		
		';
	}


?>
</div>
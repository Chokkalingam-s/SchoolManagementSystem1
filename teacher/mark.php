<?php
	include "../database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	

    if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["SCLASS"];
			$regno=$_GET["rno"];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->
    <div  style="position: fixed;  width:100%;z-index: 10;">
        <?php include("../LoginPage/navbar.php"); ?>
    </div>
    <div id="sidebar">
        <?php include("../sidebar.php"); ?>
    </div>
    <div class="section">

        <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><hr>
        <div class="content">
					
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(REGNO,SUB,MARK,TERM,CLASS) values ('{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["etype"]}','{$_POST["class"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success...! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed ...! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
							}
							
						}
					
					
					
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input2" name="regno" readonly><br><br>
							
							<label>Class</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input2" name="class" readonly><br><br>
						
							<label> Select Term</label><br>
							<select name="etype" required class="input2">
								<option value="">Select</option>
								<option value="I-Term">I-Term</option>
								<option value="II-Term">II-Term</option>
								<option value="III-Term">III-Term</option>
							</select>
							<br><br>
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
							<select name="sub" required class="input3">
						
								<?php 
									 $s="SELECT *  FROM sub";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input2" name="mark"  id="mark" type="mark" required>
							<br><br>
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
					</form>							
						</div>
       
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
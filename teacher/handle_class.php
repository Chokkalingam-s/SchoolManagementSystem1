<?php
	include "../database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
					<h3>Add Classes</h3><br>	
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hclass(TID,CLA,SEC,SUB) values ('{$_SESSION["TID"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button> </div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button> </div>";
                            						}						}
					?>							
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">				
					<label>Class / Section / Subject</label><br><br>
						
						<select name="cla" required class="input2" style="width:33%">
							<?php
								$sl="select DISTINCT(CNAME) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Class</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
									 }
								 }
							?>	
						</select>
						<select name="sec" required class="input2" style="width:33%">
						<?php
							$sl="select DISTINCT(CSEC) from class";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Section</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
									}
								}						
						?>
						</select>
						<select name="sub" required class="input2" style="width:33%">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Subject</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						
						
						?>
						</select>
						
					<br>
					
					<button type="submit" class="btn" name="submit">Add  Details</button>
					</form>
					</div>
					<div class="rbox1">
                        <br>
					<h3> Classes Handling</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button> </div>";	
						}
					
					?>
					<table class="table" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hclass where TID={$_SESSION["TID"]}";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td><a href='hclass.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>
									
									";
								}
							}
						?>				
						</table>
					</div>
				</div>
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
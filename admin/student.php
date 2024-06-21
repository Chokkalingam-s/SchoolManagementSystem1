<?php
	include "../database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><hr><br>
        <div class="content1">
        <h3 >View Student Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Class</label><br>
					<select name="cla" required class="input2" style="width:40%;">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>
				<div class="rbox">
					<label>Section</label><br>
						<select name="sec" required class="input2" style="width:40%;">
				
						<?php 
							 $sql="SELECT DISTINCT(CSEC) FROM class";
							$re=$db->query($sql);
								if($re->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($r=$re->fetch_assoc())
										{
											echo "<option value='{$r["CSEC"]}'>{$r["CSEC"]}</option>";
										}
									}
						?>
					
					</select><br><br>
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
						
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Student Details</h3><br>";
								$sql="select * from student where SCLASS='{$_POST["cla"]}' and SSEC='{$_POST["sec"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table class="table">
                                        <thead>
										<tr>
											<th>S.No</th>
											<th>Roll No</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>DOB</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Mail</th>
											<th>Address</th>
											<th>Class</th>
											<th>Sec</th>
											<th>Image</th>
										</tr>
                                        </thead>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td>{$r["SSEC"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
										
										
										</tr>
										";
										
									}
								}
							else
							{
								echo "No record Found";
							}
								echo "</table>";
							}
						
						
						?>
					
					</div>
        </div>
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
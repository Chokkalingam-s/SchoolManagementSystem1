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
        <div class="content">
					
						<h3 >View Exam Time Table Details</h3><br>
						
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						
						<table class="table">
							<tr>
								<th>S.No</th>
								<th>Class </th>
								<th>Subject</th>
								<th>Exam Name</th>
								<th>Term</th>
								<th>Date</th>
								<th>Session</th>
								<th>Delete</th>
							</tr>
							<?php
								$s="select * from exam";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["CLASS"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["ENAME"]}</td>
												<td>{$r["ETYPE"]}</td>
												<td>{$r["EDATE"]}</td>
												<td>{$r["SESSION"]}</td>
												<td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>
											</tr>										
										";
										
									}
								}
								else
								{echo "No Record Found";}
							?>						
						</table>
				</div>
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
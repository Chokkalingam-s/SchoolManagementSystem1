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
						<h3 > Add Subject Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(SNAME) values ('{$_POST["sname"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'  role='alert'>Insert Success...
                                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button>
                         </div>";
								}
								else
								{
									echo "<div class='error' role='alert'>Insert Failed...
                                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						   <label>Subject Name</label><br>
						   <input type="text" class="input1" name="sname" required style=" width: 30%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 0.5rem;
    box-sizing: border-box;
    font-size: 1rem;
    font-family: 'Arial', sans-serif; 
     border-color: #15959C;
    outline: none;
    box-shadow: 0 0 5px rgba(21, 149, 156, 0.5);">
						   <button type="submit" class="btn" name="submit">Add Subject Details</button>
						</form>
				
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px;"> Subject Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error' role'alert'>{$_GET["mes"]} <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";	
						}
					
					?>
					<table class="table"  >
                        <thead>
						<tr>
							<th>S.No</th>
							<th>Subject Name</th>
							<th>Delete</th>
						</tr>
                       </thead>
						<?php
							$s="select * from sub";
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
										<td>{$r["SNAME"]}</td>
										<td><a href='del_sub.php?id={$r["SID"]}' class='btnr'>Delete</a></td>
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
						
					</table>
				</div>
			</div>
    </div>
</body>
<script>
    function closeAlert(button) {
        var alert = button.parentElement; 
        if (alert) {
            alert.classList.add('fadeOut');
            setTimeout(function() {
                alert.remove();
            }, 500); 
        }
    }
</script>

</html>
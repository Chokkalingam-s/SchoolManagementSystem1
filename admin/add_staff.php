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
            <h3 > Add Staff Details</h3><br>
						
                        <?php
                            if(isset($_POST["submit"]))
                            {
                                $sq="insert into staff(TNAME,TPASS,QUAL,SAL) values('{$_POST["sname"]}',1234,'{$_POST["qual"]}','{$_POST["sal"]}')";
                                if($db->query($sq))
                                {
                                    echo "<div class='success'>Insert Success...
                                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                                else
                                {
                                    echo "<div class='error'>Insert Failed... 
                                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                                
                            }
                            
                        ?>
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                             <label>Staff Name</label><br>
                             <input type="text" name="sname" required class="input2" style=" width: 65%;">
                             <br><br>
                             <label>Qualification</label><br>
                             <input type="text" name="qual" required class="input2" style=" width: 65%;">
                             <br><br>
                             <label>Salary</label><br>
                             <input type="text" name="sal" required class="input2" style=" width: 65%;">
                             <br><br>
                             <button type="submit" class="btn" name="submit">Add Staff Details</button>
                            
                             <a href="view_staff.php" style="text-decoration:none;color: inherit; "><button type="button" class="btn" name="view_staff" style="opacity: 0.8;">View Staff Details</button></a>
                            
                        </form>
                        
           
            
        </div>
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
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
					
                    <h3 > Change Password</h3><br>
                    <?php
                        if(isset($_POST["submit"]))
                        {
                            $sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                            $result=$db->query($sql);
                            if($result->num_rows>0)
                            {
                                if($_POST["npass"]==$_POST["cpass"])
                                {
                                    $s="update admin SET APASS='{$_POST["npass"]}' where AID='{$_SESSION["AID"]}'";
                                    $db->query($s);
                                    echo "<div class='success'>Password Changed <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                                else
                                {
                                    echo "<div class='error'>Password Mismatch <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                            }
                            else
                            {
                                echo "<div class='error'>Invalid Password <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                            }
                        }
                    
                    
                    ?>
                    
                        
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>Old Password</label><br>
                    <input type="text" class="input2" name="opass"><br><br>
                    <label>New Password</label><br>
                    <input type="text" class="input2" name="npass"><br><br>
                    <label>Confirm Password</label><br>
                    <input type="text" class="input2" name="cpass"><br><br>
                    <button type="submit" class="btn" style="float:left" name="submit"> Change Password</button>
                </form>
        
            </div>
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
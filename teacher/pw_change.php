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
                <h3>Change Password</h3><br>
                <div class="lbox1">	
                        <?php
                    if(isset($_POST["submit"]))
                    {
                        $sql="select * from staff where TPASS='{$_POST["opass"]}' and TID='{$_SESSION["TID"]}'";
                        $result=$db->query($sql);
                            if($result->num_rows>0)
                            {
                                if($_POST["npass"]==$_POST["cpass"])
                                {
                                    $sql="UPDATE staff SET  TPASS='{$_POST["npass"]}' where  TID='{$_SESSION["TID"]}'";
                                    $db->query($sql);
                                    echo"<div class='success'>password Changed...<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                                else
                                {
                                    echo"<div class='error'>password Mismatch...<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
                                }
                            }
                            else
                            {
                                echo"<div class='error'>Invalid password...<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
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
    </div>
</body>
<script src="../js/closeAlert.js"></script>
</html>
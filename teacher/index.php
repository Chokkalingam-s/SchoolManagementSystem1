<?php
	include "../database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	

    $sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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

        <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><hr><br>
     
        <div class="content">

              <div class="rbox1">
                <h3> Profile</h3><br>

                    <table class="table">
                        <tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="Kindly Upload Your Photo (Scroll)"></td></tr>
                        <tr><th>Name </th> <td><?php echo $row["TNAME"] ?> </td></tr>
                        <tr><th>Qualification </th> <td><?php echo $row["QUAL"] ?>  </td></tr>
                        <tr><th>Salary </th> <td> <?php echo $row["SAL"] ?>  </td></tr>
                        <tr><th>Phone No </th> <td> <?php echo $row["PNO"] ?> </td></tr>
                        <tr><th>E - Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
                        <tr><th>Address </th> <td> <?php echo $row["PADDR"] ?> </td></tr>
                    </table>
                </div>
				
                <h3>Update Profile</h3><br>
                <div class="lbox1">
                <?php
                    if(isset($_POST["submit"]))
                    {
                        $target="../images/staff/";
                        $target_file=$target.basename($_FILES["img"]["name"]);
                        
                        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
                        {
                            $sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
                            $db->query($sql);
                            echo "<div class='success'>Insert Success</div>";
                        }
                        
                    }
                ?>
                <form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <label>  Phone No</label><br>
                        <input type="text" maxlength="10" required class="input2" name="pno"><br><br>
                        <label>  E - Mail</label><br>
                        <input type="email"  class="input2" required name="mail"><br><br>
                        <label>  Address</label><br>
                        <textarea rows="5" name="addr" ></textarea><br><br>
                        <label> Image</label><br>
                        <input type="file"  class="input2" required name="img"><br><br>
                    <button type="submit" class="btn" name="submit">Add Profile Details</button>
                    </form>
                </div>
            </div>
       
    </div>
</body>
</html>
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

        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><hr><br>
     
        <div class="content1">
        <div class="card-container">
            <div class="info-card">
                <div class="info-circle" id="studentCount">0</div>
                <div class="info-text">Students</div>
            </div>
            <div class="info-card">
                <div class="info-circle" id="staffCount">0</div>
                <div class="info-text">Staff</div>
            </div>
        </div>
        </div>
       
    </div>
</body>
<script src="../js/closeAlert.js"></script>
<script src="../js/countData.js"></script>

</html>
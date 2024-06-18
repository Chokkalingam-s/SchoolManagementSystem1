<?php
	include "../database.php";
	session_start();
	if(! isset($_SESSION["AID"]))
	{
		echo "<script>window.open('../index.php?mes=Access Denied..!','_self');</script>";
		
	}		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navbar -->
   <?php include("../LoginPage/navbar.php"); ?>
   <button class="btn btn-danger" > <a href="../logout.php">Logout</a> </button>
</body>
</html>
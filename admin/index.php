<?php
	include "../database.php";
	session_start();
	if(! isset($_SESSION["AID"]))
	{
		echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>admin</p>
</body>
</html>
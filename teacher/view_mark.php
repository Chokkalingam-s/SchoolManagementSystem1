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
				
                <h3>Mark Details</h3><br>
                <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lbox1">	
                
                    <label>Enter Roll No</label><br>
                    <input type="text" class="input2" name="rno"><br><br>
                </div>
                <button type="submit" class="btn" name="view"> View Details</button>
            
                </form>
                <br><br>
                <div class="Output">
                    <?php
                        if(isset($_POST["view"]))
                        {
                            echo "<h3>Mark Details</h3><br>";
                            $sql="select * from mark where REGNO='{$_POST["rno"]}'";
                            $re=$db->query($sql);
                            if($re->num_rows>0)
                            {
                                echo'
                                <table class="table">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Reg.No</th>
                                        <th>Class</th>
                                        <th>Term</th>
                                        <th>Subject</th>
                                        <th>Mark</th>
                                    </tr>
                                ';
                                $i=0;
                                while($r=$re->fetch_assoc())
                                {
                                    $i++;
                                    echo "
                                        <tr>
                                            <td>{$i}</td>
                                            <td>{$r["REGNO"]}</td>
                                            <td>{$r["CLASS"]}</td>
                                            <td>{$r["TERM"]}</td>
                                            <td>{$r["SUB"]}</td>
                                            <td>{$r["MARK"]}</td>
                                        </tr>
                                    ";
                                }
                            }
                            else
                            {
                                echo "No Record Found";
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
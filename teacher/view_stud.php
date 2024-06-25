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
					
                    <h3 >View Student Details</h3><br>
                
                <?php
                    if(isset($_GET["mes"]))
                    {
                        echo"<div class='error'>{$_GET["mes"]}<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";	
                    }
                
                ?>
                <table class="table" >
                    <tr>
                        <th>S.No</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Mail</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Sec</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $s="select * from student ";
                        $res=$db->query($s);
                        if($res->num_rows>0)
                        {
                            $i=0;
                            while($r=$res->fetch_assoc())
                            {
                                $i++;
                                echo"
                                    <tr>
                                        <td>{$i}</td>
                                        <td>{$r["RNO"]}</td>
                                        <td>{$r["NAME"]}</td>
                                        <td>{$r["FNAME"]}</td>
                                        <td>{$r["DOB"]}</td>
                                        <td>{$r["GEN"]}</td>
                                        <td>{$r["PHO"]}</td>
                                        <td>{$r["MAIL"]}</td>
                                        <td>{$r["ADDR"]}</td>
                                        <td>{$r["SCLASS"]}</td>
                                        <td>{$r["SSEC"]}</td>
                                        <td><img src='{$r["SIMG"]}' height='70' width='70'></td>
                                        <td><a href='stud_delete.php?id={$r["ID"]}' class='btnr'>Delete</a><td>
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
</body>
<script src="../js/closeAlert.js"></script>
</html>
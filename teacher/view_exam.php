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
				
                <h3>View Exam</h3><br>
                <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lbox1">	
                    <label>Exam Date</label><br>
                    <select name="edate" required class="input2">
            
                    <?php 
                         $sl="SELECT * FROM exam";
                        $r=$db->query($sl);
                            if($r->num_rows>0)
                                {
                                    echo"<option value=''>Select</option>";
                                    while($ro=$r->fetch_assoc())
                                    {
                                        echo "<option value='{$ro["EDATE"]}'>{$ro["EDATE"]}</option>";
                                    }
                                }
                    ?>
                </select>
            </div>
            <div class="rbox">
                <label>Class</label><br>
                <select name="cla" required class="input2">
                    <?php 
                         $sl="SELECT DISTINCT(CNAME) FROM class";
                        $r=$db->query($sl);
                            if($r->num_rows>0)
                                {
                                    echo"<option value=''>Select</option>";
                                    while($ro=$r->fetch_assoc())
                                    {
                                        echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
                                    }
                                }
                    ?>
                
                </select>
                <br>
            </div>
                <button type="submit" class="btn" name="view"> View Details</button>
            
                </form>
                <br>
                <div class="Output">
                    <?php
                        if(isset($_POST["view"]))
                        {
                            echo "<h3>Exam Time Table</h3><br>";
                            $sql="select * from exam where EDATE='{$_POST["edate"]}' and CLASS='{$_POST["cla"]}'";
                            $re=$db->query($sql);
                            if($re->num_rows>0)
                            {
                                echo '
                                    <table class="table">
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Date</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Exam Name</th>
                                            <th>Exam Type</th>
                                            <th>Session</th>
                                        </tr>
                                        ';
                                        $i=0;
                                        while($r=$re->fetch_assoc())
                                        {
                                            $i++;
                                            echo"
                                                <tr>
                                                    <td>{$i}</td>
                                                    <td>{$r["EDATE"]}</td>
                                                    <td>{$r["CLASS"]}</td>
                                                    <td>{$r["SUB"]}</td>
                                                    <td>{$r["ENAME"]}</td>
                                                    <td>{$r["ETYPE"]}</td>
                                                    <td>{$r["SESSION"]}</td>
                                                
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
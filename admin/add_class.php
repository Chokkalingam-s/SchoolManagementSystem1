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
    <div>
        <?php include("../LoginPage/navbar.php"); ?>
    </div>
    <div id="sidebar">
        <?php include("../sidebar.php"); ?>
    </div>
    <div class="section">

        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><hr><br>
        <div class="content1">
            <h3>Add Class Details</h3><br>
            <?php
            if(isset($_POST["submit"])) {
                $sq="insert into class(CNAME,CSEC) values('{$_POST["cname"]}','{$_POST["sec"]}')";
                if($db->query($sq)) {
                    echo "<div class='success'>Insert Success..</div>";
                } else {
                    echo "<div class='error'>Insert failed..</div>";
                }
            }
            ?>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label>Class Name</label><br>
                <select name="cname" required class="input2">
                    <option value="">Select</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    <option value="X">X</option>
                </select><br><br>
                <label>Section</label><br>
                <select name="sec" required class="input2">
                    <option value="">Select</option>
                    <option value="-">-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
                <br>
                <button type="submit" class="btn" name="submit">Add Class Details</button>
            </form>
        </div>
        <div class="tbox">
            <h3 style="margin-top:30px;">Class Details</h3><br>
            <?php
            if(isset($_GET["mes"])) {
                echo"<div class='error'>{$_GET["mes"]}</div>";
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Class Name</th>
                        <th>Section</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $s="select * from class";
                    $res=$db->query($s);
                    if($res->num_rows>0) {
                        $i=0;
                        while($r=$res->fetch_assoc()) {
                            $i++;
                            echo "
                                <tr>
                                    <td>{$i}</td>
                                    <td>{$r["CNAME"]}</td>
                                    <td>{$r["CSEC"]}</td>
                                    <td><a href='delete_class.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
                                </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
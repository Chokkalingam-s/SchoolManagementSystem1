<?php
include "../database.php";
session_start();
if (!isset($_SESSION["AID"])) {
    echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
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
    <div style="position: fixed; width: 100%; z-index: 10;">
        <?php include("../LoginPage/navbar.php"); ?>
    </div>
    <div id="sidebar">
        <?php include("../sidebar.php"); ?>
    </div>
    <div class="section">
        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><hr><br>
        <div class="content1">
            <h3>View Staff Details</h3><br>
            <div class="input-group mb-3">
                <input type="text" id="search" class="form-control" placeholder="Search by Name" onkeyup="searchStaff(this.value)">
                <div class="input-group-append">
                </div>
            </div>
            <div class="tbox">
                <table class="table" id="staffTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Qualification</th>
                            <th>Salary</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $s = "select * from staff";
                        $res = $db->query($s);
                        if ($res->num_rows > 0) {
                            $i = 0;
                            while ($row = $res->fetch_assoc()) {
                                $i++;
                                echo "
                                <tr>
                                    <td>{$i}</td>
                                    <td>{$row["TNAME"]}</td>
                                    <td>{$row["QUAL"]}</td>
                                    <td>{$row["SAL"]}</td>
                                    <td><a href='staff_view.php?id={$row["TID"]}' class='btnb'>View</a></td>
                                    <td><a href='staff_delete.php?id={$row["TID"]}' class='btnr'>Delete</a></td>
                                </tr>
                                ";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No Record Found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/closeAlert.js"></script>
    <script src="../js/searchStaff.js"></script>
</body>
</html>

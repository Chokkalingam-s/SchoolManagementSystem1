<?php
    include "database.php";
    session_start();
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
   <?php include("LoginPage/navbar.php"); ?>

    <!-- Carousel -->
    <?php include("LoginPage/carousel.php"); ?>

    <!-- Login Form -->
    <div class="login-container">
        <h3 class="text-center">Login</h3>

        <?php
            if(isset($_POST["login"])){

                $sql = "SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' AND APASS='{$_POST["apass"]}'";
                $res = $db->query($sql);

                if($res->num_rows > 0){
                    $ro=$res->fetch_assoc();
                    $_SESSION["AID"]=$ro["AID"];
                    $_SESSION["ANAME"]=$ro["ANAME"];
                    echo "<script>window.open('admin/index.php','_self');</script>";
                }else{
                    echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
                }
            }
            if(isset($_GET["mes"]))
            {
                echo "<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";
            }
            ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="mb-3">
                <label for="aname" class="form-label">Username</label>
                <input type="text" class="form-control" id="aname" name="aname" required>
            </div>
            <div class="mb-3">
                <label for="apass" class="form-label">Password</label>
                <input type="password" class="form-control" id="apass" name="apass" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login" style="background-color:#15959C">Login</button>
        </form>
    </div>

    <footer>
        <div class="container">
            <p class="footer-text">&copy; Chokkalingam'S School Management System</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

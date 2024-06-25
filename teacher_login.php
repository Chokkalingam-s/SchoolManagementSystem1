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
     <div>
    <?php include("LoginPage/navbar.php"); ?>
    </div>
    <!-- Carousel -->
     <div>
        <?php include("LoginPage/carousel.php"); ?>
    </div>
    <!-- Login Form -->
    <div class="login-container">
        <h3 class="text-center">Teacher Login</h3>

        <?php
            if(isset($_POST["login"])){
                $sql="select * from staff where TNAME='{$_POST["name"]}'and TPASS='{$_POST["pass"]}'";
                $res = $db->query($sql);
                if($res->num_rows > 0){
                    $ro=$res->fetch_assoc();
                    $_SESSION["TID"]=$ro["TID"];
                    $_SESSION["TNAME"]=$ro["TNAME"];
                    echo "<script>window.open('teacher/index.php','_self');</script>";
                }else{
                    echo '<div class="alert alert-danger" role="alert">Invalid Username or Password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeAlert(this)"></button></div>';
                }
            }
            if(isset($_GET["mes"]))
            {
                echo "<div class='alert alert-danger' role='alert'>{$_GET["mes"]}<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>";
            }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login" style="background-color:#15959C">Login</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="footer-text">&copy; Chokkalingam'S School Management System</p>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="../js/closeAlert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

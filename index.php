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
        <form action="#" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color:#15959C">Login</button>
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

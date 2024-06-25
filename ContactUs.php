<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// Include PHPMailer files
require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

include "database.php";
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact"])) {
    $name = htmlspecialchars($_POST["Name"]);
    $email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
    $query = htmlspecialchars($_POST["Query"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // SMTP server configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'chokspvt@gmail.com'; // SMTP username
            $mail->Password = 'vqdq bpjf ihis amfr'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to

            // Sender and recipient settings
            $mail->setFrom('chokspvt@gmail.com', 'Chokkalingam'); // Replace with your email
            $mail->addAddress('chokka7878@gmail.com'); // Add a recipient

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Contact Us Form Submission from ' . $name;
            $mail->Body = nl2br("Name: $name\nEmail: $email\n\nQuery:\n$query");

            $mail->send();
            $successMessage = "Your message has been sent successfully!";
        } catch (Exception $e) {
            $errorMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $errorMessage = "Invalid email address.";
    }
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
    <div>
        <?php include("LoginPage/navbar.php"); ?>
    </div>

    <!-- Carousel -->
    <div>
        <?php include("LoginPage/carousel.php"); ?>
    </div>

    <!-- Contact Form -->
    <div class="login-container">
        <h3 class="text-center">Contact Us</h3>
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='closeAlert(this)'></button></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="mb-3">
                <label for="Query" class="form-label">Query</label>
                <textarea class="form-control" id="Query" name="Query" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="contact" style="background-color:#15959C">Contact</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="footer-text">&copy; Chokkalingam'S School Management System</p>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/closeAlert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

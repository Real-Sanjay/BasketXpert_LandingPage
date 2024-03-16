<?php
// Include the configuration file
@include 'config.php';

// Define an array to store errors and success message
$errors = array();
$success_message = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and validate the password input
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the password
    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirm_password) {
        $errors[] = 'Password and confirm password do not match.';
    } else {
        // Sanitize the email input
        $email = isset($_GET['email']) ? mysqli_real_escape_string($conn, $_GET['email']) : '';

        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $update_query = "UPDATE user_form SET password = '$hashed_password' WHERE email = '$email'";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            // Password reset successful, set success message
            $success_message = 'Password reset successful. Redirecting to login page...';

            // Redirect the user to login page after 3 seconds
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'login_form.php';
                    }, 3000);
                  </script>";
        } else {
            $errors[] = 'Error updating password. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BasketXpert  password reset</title>
    <link rel="icon" href="favi.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="navbar__container">
        <a href="#home" id="navbar__logo">BasketXpert</a>
    </div>
</nav>
<div class="form-container">
    <form action="" method="post">
        <h3>Reset Password</h3>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <p><?php  echo '<span class="error-msg">'.$error.'</span>'; ?></p>
            <?php endforeach; ?>
        <?php elseif ($success_message !== ''): ?>
            <p><?php echo $success_message; ?></p>
        <?php endif; ?>
        <label for="password">New Password:</label>
        <input placeholder="password" type="password" id="password" name="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input placeholder="confirm password" type="password" id="confirm_password" name="confirm_password" required>
        <input class="form-btn" type="submit" name="submit" value="Reset Password">
    </form>
</div>
</body>
</html>

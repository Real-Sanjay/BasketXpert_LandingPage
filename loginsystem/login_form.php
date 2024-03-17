<?php
// Include the configuration file
@include 'config.php';

// Start the session
session_start();

// Initialize error array
$errors = [];
$success_message = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and validate the email and password inputs
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Fetch user details from the database based on the provided email
    $select_query = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select_query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Fetch the user's data from the result set
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // If login is successful, store user's name in session
            $_SESSION['user_name'] = $row['name'];
            // Show "Logging in..." message
            $success_message = 'Logging in...';
            // Delay for 2 seconds
             // Redirect the user to login page after 3 seconds
             echo "<script>
             setTimeout(function() {
                 window.location.href = 'dashboard.php';
             }, 1500);
           </script>";
            // Redirect to user page
            // header('Location: dashboard.php');
            // exit; // Terminate script execution after redirection
        } else {
            // Password is incorrect
            $errors[] = 'Incorrect password!';
        }
    } else {
        // User not found
        $errors[] = 'User not found! Please register first.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="favi.jpeg" type="image/x-icon">
   <title>BasketXpert Login</title>
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
            <h3>Login</h3>
            <?php foreach($errors as $error): ?>
                <span class="error-msg"><?php echo $error; ?></span>
            <?php endforeach; ?>
           
            <?php if ($success_message !== ''): ?>
            <p><?php echo $success_message; ?></p>
        <?php endif; ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Forgot password? <a href="forgot_password.php">reset password</a></p>
            <p>Don't have an account? <a href="register_form.php">register now</a></p>
        </form>
    </div>
</body>
</html>

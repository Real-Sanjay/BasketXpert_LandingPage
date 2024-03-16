<?php
// Include the configuration file
@include 'config.php';

// Define an array to store errors
$errors = array();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and validate the email input
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';

    // Fetch user details from the database based on the provided email
    $select_query = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select_query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Redirect the user to the password reset page
        header("Location: reset_password.php?email=$email");
        exit();
    } else {
        // User not found
        $errors[] = 'User not found!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BasketXpert password reset</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favi.jpeg" type="image/x-icon">
</head>
<body>
<nav class="navbar">
      <div class="navbar__container">
        <a href="#home" id="navbar__logo">BasketXpert</a>
        </div>
    </nav>
    <div class="form-container">
    <form action="" method="post">
        <h3>Forgot Password</h3>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <p><?php  echo '<span class="error-msg">'.$error.'</span>'; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        
            <label for="email">Enter your email:</label>
            <input placeholder="enter your registered email" type="email" id="email" name="email" required>
            <input class= "form-btn" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>

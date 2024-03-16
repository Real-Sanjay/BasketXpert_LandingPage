<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $confirm_password = $_POST['cpassword']; // Plain confirm password
    $password = $_POST['password'];

    // Validate the password
    if (!validate_password($password)) {
        $error[] = 'Password must be at least 8 characters long.';
    } else {
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists
        $select = "SELECT * FROM user_form WHERE email = '$email'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'User already exists!';
        } 
        elseif ($password !== $confirm_password) {
            $error[] = 'Password and confirm password do not match.';
        }
        else {
            // Insert the user into the database with password sent through email
// $insert = "INSERT INTO user_form (name, email, password, reset_token, reset_token_expires) VALUES (?, ?, ?, NULL, NULL)";
// $stmt = mysqli_prepare($conn, $insert);
// mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hashed_password);

// if (mysqli_stmt_execute($stmt)) {
//     header('location: login_form.php');
// } else {
//     $error[] = 'Error inserting user into the database.';
// }

// mysqli_stmt_close($stmt);

            // Insert the user into the database
            $insert = "INSERT INTO user_form (name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert);
            mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                header('location: login_form.php');
            }
            
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }
            else {
                $error[] = 'Error inserting user into the database.';
            }

            mysqli_stmt_close($stmt);
        }

    }
}

// Password validation function
function validate_password($password) {
    $MIN_PASSWORD_LENGTH = 8;
    return strlen($password) >= $MIN_PASSWORD_LENGTH;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BasketXpert Registartion</title>
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
      <h3>Register</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">login now</a></p>
   </form>
</div>
</body>
</html>

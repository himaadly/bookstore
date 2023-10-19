<?php
require_once '../includes/config_session.inc.php';
require_once  '../includes/signup_view.inc.php';
require_once  '../includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/signUp.css" />
    <title>Log In Form</title>
</head>

<body>
    <form action="../includes/login.inc.php" method="post">
        <div class="container">
            <h1>Log In</h1>
            <p>Please fill in this form to Log in to your account.</p>
            <hr>

            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">

            <button class="signupbtn">Log In</button>
        </div>
    </form>

    <?php
    check_login_errors();
    check_signup_errors();
    ?>

</body>

</html>
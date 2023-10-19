<?php
require_once '../includes/config_session.inc.php';
require_once  '../includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/signUp.css" />
    <title>Sign Up Form</title>
</head>

<body>
    <form action="../includes/signup.inc.php" method="post">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <?php
            signup_inputs();
            ?>

            <button class="signupbtn">Sign Up</button>
        </div>
    </form>

    <?php
    check_signup_errors();
    ?>
</body>

</html>
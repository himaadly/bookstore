<?php

declare(strict_types=1);

/**
 * Function to generate the signup form inputs based on session data and errors.
 */
function signup_inputs()
{
    // Check if username is set and if any username error is not set
    if (
        isset($_SESSION["signup_data"]["username"]) && !isset(
            $_SESSION["errors_signup"]["username_taken"]
        )
    ) {
        // If session data is available, use it to prefill the input field
        echo '<div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" 
                id="username" placeholder="Username" value= "' . $_SESSION["signup_data"]["username"] . '">
                </div>';
    } else {
        // If no session data or errors, generate the input field normally
        echo '<div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" 
                id="username" placeholder="Username">
                </div>';
    }

    // Always generate the password input field
    echo '<div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="pwd" 
            id="password" placeholder="Password">
            </div>';

    // Check if email is set and if specific email errors are not set
    if (
        isset($_SESSION["signup_data"]["email"]) && !isset(
            $_SESSION["errors_signup"]["email_used"]
        )
        && !isset($_SESSION["errors_signup"]["invalid_email"])
    ) {
        // If session data is available, use it to prefill the input field
        echo '<div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" 
                id="email" placeholder="E-mail" value= "' . $_SESSION["signup_data"]["email"] . '" >
                </div>';
    } else {
        // If no session data or errors, generate the input field normally
        echo '<div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" 
                id="email" placeholder="E-mail">
                </div>';
    }
}

/**
 * Function to check for signup errors and display appropriate messages.
 */
function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        // Display errors in a container
        echo '<div class="error-container">';
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        echo '</div>';

        // Clear the errors after displaying them
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET["signup"] === "success") {
        // If signup is successful, display a success message
        echo '<div class="success-container">';
        echo '<p class="form-success">Signup success!</p>';
        echo '</div>';
    }
}

<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo '<br>';

        foreach ($errors as $error) {
            echo '<div class="error-container">';
            echo '<p class="form-error">' . $error . '</p>';
            echo '</div>';
        }

        unset($_SESSION["errors_login"]);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<div class="success-container">';
        echo '<p class="form-success">Login Success!</p>';
        echo '</div>';
    }
}

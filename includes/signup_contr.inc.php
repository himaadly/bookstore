<?php

declare(strict_types=1);

/**
 * Function to check if any of the input fields are empty.
 * @param string $username The username to check.
 * @param string $pwd The password to check.
 * @param string $email The email to check.
 * @return bool Returns true if any of the fields are empty, otherwise false.
 */
function is_input_empty(string $username, string $pwd, string $email)
{
    if (empty($username) || empty($pwd) || empty($email)) {

        return true;
    } else {
        return false;
    }
}

/**
 * Function to check if the provided email is in a valid format.
 * @param string $email The email to check.
 * @return bool Returns true if the email is invalid, otherwise false.
 */
function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        return true;
    } else {
        return false;
    }
}

/**
 * Function to check if the provided username is already taken.
 * @param object $pdo The PDO connection object.
 * @param string $username The username to check.
 * @return bool Returns true if the username is taken, otherwise false.
 */
function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {

        return true;
    } else {
        return false;
    }
}

/**
 * Function to check if the provided email is already registered.
 * @param object $pdo The PDO connection object.
 * @param string $email The email to check.
 * @return bool Returns true if the email is already registered, otherwise false.
 */
function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {

        return true;
    } else {
        return false;
    }
}

/**
 * Function to create a new user.
 * @param object $pdo The PDO connection object.
 * @param string $pwd The password of the user.
 * @param string $username The username of the user.
 * @param string $email The email of the user.
 * @return void
 */
function create_user(object $pdo, string $pwd, string $username, string $email)
{

    set_user($pdo, $pwd, $username, $email);
}

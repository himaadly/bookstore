<?php

declare(strict_types=1);

/**
 * Function to retrieve a username from the database.
 * @param object $pdo The PDO connection object.
 * @param string $username The username to retrieve.
 * @return array|null Returns an array containing the username if found, otherwise null.
 */
function get_username(object $pdo, string $username)
{

    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Function to retrieve an email from the database.
 * @param object $pdo The PDO connection object.
 * @param string $email The email to retrieve.
 * @return array|null Returns an array containing the username if found, otherwise null.
 */
function get_email(object $pdo, string $email)
{

    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Function to insert a new user into the database.
 * @param object $pdo The PDO connection object.
 * @param string $pwd The user's password.
 * @param string $username The username of the user.
 * @param string $email The email of the user.
 * @return void
 */
function set_user(object $pdo, string $pwd, string $username, string $email)
{

    $query = "INSERT INTO users (username, pwd, email) VALUES 
    (:username, :pwd, :email)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hasedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hasedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}

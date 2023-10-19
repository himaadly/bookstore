<?php
include '../includes/config_session.inc.php';

if (isset($_POST['title']) && isset($_POST['price'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];

    // Add the item to the cart in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = array('title' => $title, 'price' => $price);


    // Redirect to the cart page
    header('Location: ../pages/cart.php');
    exit();
} else {
    // Handle the case when data is not set properly
    echo "Invalid data!";
}

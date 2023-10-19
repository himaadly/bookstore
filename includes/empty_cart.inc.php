<?php
include '../includes/config_session.inc.php';

// Check if the session cart is set and not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Unset the session cart
    unset($_SESSION['cart']);
    // Redirect to the cart page after emptying the cart
    header('Location: ../pages/cart.php');
    exit();
} else {
    // Handle the case when the cart is already empty
    echo "Your cart is already empty.";
}

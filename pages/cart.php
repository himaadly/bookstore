<?php
include '../includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="../style/cart.css" />
    <title>Cart Page</title>
</head>

<body class="flex flex-col h-full">

    <!-- Including the header page -->
    <?php include "../components/header.php"; ?>

    <div class="flex justify-center items-center h-screen">
        <div class="w-3/4 bg-white p-4 cart-container"> <!-- Add the cart-container class here -->
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Your Cart</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 mt-6">
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

                    foreach ($_SESSION['cart'] as $item) {
                        echo '<div class="cart-item group relative">'; // Use the cart-item class here
                        echo '<div class="">';
                        echo '<img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/16620/production/_91408619_55df76d5-2245-41c1-8031-07a4da3f313f.jpg.webp" alt="' . $item['title'] . '" class="h-full w-full object-cover object-center lg:h-full lg:w-full">';
                        echo '</div>';
                        echo '<div class="mt-4 flex justify-between cart-item-text">'; // Use the cart-item-text class here
                        echo '<div>';
                        echo '<h3 class="cart-item-title text-sm text-gray-700">' . $item['title'] . '</h3>'; // Use the cart-item-title class here
                        echo '</div>';
                        echo '<p class="cart-item-price text-sm font-medium text-gray-900">$' . $item['price'] . '</p>'; // Use the cart-item-price class here
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">Your cart is empty.</p>';
                }
                ?>
            </div>
            <!-- Checkout button to empty the cart -->
            <div class="flex justify-end mt-4">
                <form action="../includes/empty_cart.inc.php" method="post">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Including the footer page -->
    <?php include "../components/footer.php"; ?>

</body>

</html>
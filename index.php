<?php
require_once  './includes/config_session.inc.php';

require_once  './includes/login_view.inc.php';

// Include the file that handles the book data
require_once './includes/book_data_manager.inc.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="./style/main.css" />
    <title>Home Page</title>
</head>

<body class="flex flex-col h-full">

    <!-- Including the header page -->
    <?php include "./components/header.php"; ?>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Books Collection</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php
                // Fetch books from the database
                $sql = "SELECT * FROM books";
                $stmt = $pdo->query($sql);

                // Check if there are any books in the database
                if ($stmt->rowCount() > 0) {
                    // Output data of each row
                    while ($row = $stmt->fetch()) {
                        echo '<div class="group relative">';
                        echo '<div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">';
                        echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '" class="h-full w-full object-cover object-center lg:h-full lg:w-full">';
                        echo '</div>';
                        echo '<div class="mt-4 flex justify-between">';
                        echo '<div>';
                        echo '<h3 class="text-sm text-gray-700">';
                        echo '<p class="mt-1 text-sm text-gray-500">' . $row["description"] . '</p>';
                        echo '<p class="mt-1 text-sm text-gray-500">Rating: ' . $row["rating"] . '</p>';
                        echo '</div>';
                        echo '<p class="text-sm font-medium text-gray-900">$' . $row["price"] . '</p>';

                        // Add the "Add to Cart" button if the user is logged in
                        if (isset($_SESSION['user_id'])) {
                            echo '<form action="./includes/add_to_cart.inc.php" method="post">';
                            echo '<input type="hidden" name="title" value="' . $row["title"] . '">';
                            echo '<input type="hidden" name="price" value="' . $row["price"] . '">';
                            echo '<button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add to Cart</button>';
                            echo '</form>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p class='text-center'>No books found in the database.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="flex-1">
        <!-- Your main content goes here -->
        <?php
        check_login_errors();
        ?>
    </div>

    <!-- Including the footer page -->
    <?php include "./components/footer.php"; ?>

</body>

</html>
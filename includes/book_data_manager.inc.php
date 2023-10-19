<?php
// Include the database connection file
include 'includes/dbh.inc.php';

// Include the file with book data
include 'data/book_data.php';

// Function to check if a book already exists in the database
function bookExists($pdo, $title)
{
    $sql = "SELECT * FROM books WHERE title = :title";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

// Loop through the array of books and insert each book into the database if it does not already exist
foreach ($books as $book) {
    $title = $book['title'];
    if (!bookExists($pdo, $title)) {
        $image = $book['image'];
        $price = $book['price'];
        $rating = $book['rating'];
        $description = $book['description'];

        // Prepare the SQL statement to insert a new book
        $sql = "INSERT INTO books (title, image, price, rating, description) VALUES (:title, :image, :price, :rating, :description)";

        try {
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':description', $description);

            // Execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
    }
}

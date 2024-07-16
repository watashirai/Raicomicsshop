<?php
include("connect.php");
include("query.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return_book']) && isset($_POST['BookID'])) {
    // Get the book_id from the form data
    $book_id = $_POST['BookID'];

    $returnBookQuery = "UPDATE borrow SET returned = 2 WHERE book_id = $book_id AND customer_name = '$UserID'";

    $returnBookResult = mysqli_query($con, $returnBookQuery);


    if ($returnBookResult) {
        // Update the book quantity in the books table
        $updateQuantityQuery = "UPDATE books SET quantity = quantity + 1 WHERE BookID = $book_id";
        $updateQuantityResult = mysqli_query($con, $updateQuantityQuery);

        if ($updateQuantityResult) {
            echo '<script>alert("Your payment has been successfully processed. Thank you for your prompt settlement.");
            window.location.href = "display_borrowed.php?returned=1";</script>';
            exit();
        } else {
            echo '<script>alert("Error updating book quantity: ' . mysqli_error($conn) . '");</>';
        }
    } else {
        echo '<script>alert("Error returning book: ' . mysqli_error($con) . '");</script>';
    }
} else {
    echo '<script>alert("Invalid request.");</script>';
}

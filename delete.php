<?php
session_start();

include 'Database.php';
include 'user.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Delete the user and capture the result
    $result = $user->deleteUser($matric);

    // Close the database connection
    $db->close();

    // Check the result and provide feedback
    if ($result === true) {
        // Deletion successful, redirect to display page
        echo '<script>alert("Delete Successful!");</script>';
        echo '<script>window.location.href="display.php";</script>';
    } else {
        // Deletion failed, display the error
        echo '<script>alert("Error: ' . $result . '");</script>';
        echo '<script>window.history.back();</script>'; // Go back to the previous page
    }
}
?>
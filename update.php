<?php
session_start();

include 'Database.php';
include 'user.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Update the user
    $result = $user->updateUser($matric, $name, $role);

    // Close the database connection
    $db->close();

    // Check the result and provide feedback
    if ($result === true) {
        // Update successful, redirect to display page
        echo '<script>alert("Update Successful!");</script>';
        echo '<script>window.location.href="display.php";</script>';
    } else {
        // Display an error message if the update fails
        echo '<script>alert("Error: ' . $result . '");</script>';
        echo '<script>window.history.back();</script>'; // Go back to the previous page
    }
}
?>
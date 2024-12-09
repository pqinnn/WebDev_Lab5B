<?php
include 'Database.php';
include 'user.php';


// Check if the form has been submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs using mysqli_real_escape_string
    $matric = $db->real_escape_string($_POST['matric']);
    $name = $db->real_escape_string($_POST['name']);
    $password = $db->real_escape_string($_POST['password']);
    $role = $db->real_escape_string($_POST['role']);

    // Create an instance of the User class
    $user = new User($db);

    // Try to create the user
    $result = $user->createUser($matric, $name, $password, $role);

    // Close the database connection
    $db->close();

    // Check the result and provide feedback
    if ($result === true) {
        // Registration successful, redirect to login
        echo '<script>alert("Registration Successful! Redirecting to login page...");</script>';
        echo "<script>window.location.href='login.php';</script>";
    } else {
        // Display error message
        echo '<script>alert("Error: ' . $result . '");</script>';
        echo '<script>window.history.back();</script>'; // Go back to the previous page
    }
} else {
    echo "Invalid request.";
}
?>
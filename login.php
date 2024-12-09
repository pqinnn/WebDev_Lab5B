<?php
session_start(); // Start the session to manage login state

if (isset($_SESSION['user'])) {
    header("Location: display.php"); // Redirect to display.php if already logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="authentication.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <p><a href="register.php">Register</a> here if you have not.</p>
</body>

</html>
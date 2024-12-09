<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <form action="registration.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required><br>

            <label for="name">Name:</label>
            <input type="name" name="name" id="name" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="role">Role:</label>
            <select name="role" id="role" required><br>
                <option value="" disabled selected>Please select</option>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select><br>
            <input type="submit" name="submit" value="Register">
        </form>
       
    </body>
</html>

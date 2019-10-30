<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
</head>
<body>
    <p>Please enter a username and password for your new account</p>
    <form method="POST" action="submit.php">
        <label>Username:</label><br />
        <input type="text" name="username" id="username"/><br />
        <label>Password:</label><br />
        <input type="text" name="password" id="password"/><br />
        <button type="submit">Submit New Account</button>
    </form>
</body>
</html>
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <header>
        <h1>Sign In</h1>
    </header>
    <div class="center">
        <p>Please sign in before continuing:</p>
        <form method="POST" action="login.php">
            <label>Username:</label><br />
            <input type="text" name="username" id="username" /><br />
            <label>Password:</label><br />
            <input type="text" name="password" id="password" /><br />
            <button type="submit">Login</button>
        </form>
        <br />
        <br />
        <a href="sign-up.php" id="signup">Click Here to Create a New Account</a>
    </div>
</body>
</html>

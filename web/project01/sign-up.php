<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <p>Please fill out the following information for your new account.  Once submitted you will have to wait for approval by Maker Meyers before being able to login.</p>
    <div class="form">
        <form method="POST" action="submit.php">
            <label>Display Name:</label>
            <br />
            <input type="text" name="display_name" id="display_name" />
            <br />
            <label>Email:</label>
            <br />
            <input type="text" name="email" id="email" />
            <br />
            <label>Username:</label>
            <br />
            <input type="text" name="username" id="username" />
            <br />
            <label>Password:</label>
            <br />
            <input type="text" name="password" id="password" />
            <br />
            <button type="submit">Submit New Account</button>
        </form>
    </div>
</body>
</html>
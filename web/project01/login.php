<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

// Check for password in users table
$query = 'SELECT password, display_name FROM users WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$result = $statement->execute();

if ($result) {
	$row = $statement->fetch();
    $hashedPassword = $row['password'];
    $display_name = $row['display_name'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['display_name'] = $display_name;

        // Correct Password
        header("Location: index.php");
        die();

    } else {
        // Check for password in tempusers table
        $query2 = 'SELECT password, display_name FROM tempusers WHERE username = :username';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':username', $username);
        $result2 = $statement2->execute();

        if ($result2) {
            $row2 = $statement2->fetch();
            $hashedPassword2 = $row2['password'];
            $display_name2 = $row2['display_name'];

            if (password_verify($password, $hashedPassword2)) {
                // Error message if account created but not yet approved by Maker Meyers
                $_SESSION['error'] = "The account for $display_name2 has not yet been approved by Maker Meyers.\nTry signing in later or contact Maker Meyers to speed up approval.";

                header("Location: index.php");
                die();
            } else {
                // Wrong password
                $_SESSION['error'] = "Wrong password entered.  Try again!";
                header("Location: sign-in.php");
                die();
            }
        }
    }
}
?>
<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

$query = 'SELECT password FROM users WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$result = $statement->execute();

$query2 = 'SELECT password FROM tempusers WHERE username = :username';
$statement2 = $db->prepare($query2);
$statement2->bindValue(':username', $username);
$result2 = $statement2->execute();

if ($result) {
	$row = $statement->fetch();
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $username;

        // Correct Password
        header("Location: index.php");
        die();

    } else {
        $_SESSION['error'] = "wrongPW";

        // Wrong password
        header("Location: index.php");
        die();
    }
} else if ($result2) {
    $_SESSION['error'] = "notYetApproved";
    header("Location: index.php");
    die();
}
?>
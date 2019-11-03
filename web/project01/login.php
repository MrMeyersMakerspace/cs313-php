<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

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
        $_SESSION['error'] = "wrongPW";

        // Wrong password
        header("Location: sign-in.php");
        die();
    }
?>
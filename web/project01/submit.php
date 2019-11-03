<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$display_name = htmlspecialchars($_POST['display_name']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = 'INSERT INTO tempusers (display_name, email, username, password) VALUES (:display_name, :email, :username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':display_name', $display_name);
$statement->bindValue(':email', $email);
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $password);
$statement->execute();

$_SESSION['user_id'] = "notYetApproved";
header("Location: index.php");
die();
?>
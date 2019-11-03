<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$counter = 0;
$display_name = htmlspecialchars($_POST['display_name']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Gets the current username
$sql = "SELECT username FROM tempusers WHERE username = $username";
foreach ($db->query($sql) as $row1) {
    $currentUsername = $row1['username'];
    $counter = $counter + 1;
}

if ($counter == 0) {
    $_SESSION['error'] = "The username $username has has already been taken.<br/>Please try again.";
    header("Location: index.php");
    die();
} else {
    $query = 'INSERT INTO tempusers (display_name, email, username, password) VALUES (:display_name, :email, :username, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':display_name', $display_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();


    $_SESSION['error'] = "The account for $display_name has been submitted for approval by Maker Meyers.<br/>Try signing in later or contact Maker Meyers to speed up approval process.";
    header("Location: index.php");
    die();
}
?>
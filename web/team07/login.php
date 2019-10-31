<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

$query = 'SELECT password FROM teamuser WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->execute();
foreach ($db->query($statement) as $row) {
    $hashedPassword = $row['password'];
}

if (password_verify($password, $hashedPassword)) {
    $_SESSION['user_id'] = $username;

    // Correct Password
    header("Location: welcome.php");
    die();

} else {
    // Wrong password
    header("Location: sign-in.php");
    die();
}
?>
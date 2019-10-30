<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = 'SELECT password FROM teamuser WHERE username = :username';
foreach ($db->query($sql) as $row) {
    $hashedPassword = $row['username'];
}

if (password_verify($password, $hashedPassword)) {
    $_SESSION["user_id"] = $username;

    // Correct Password
    header("Location: welcome.php");
    die();

} else {
    // Wrong password
    header("Location: sign-in.php");
    die();
}
?>
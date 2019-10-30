<?php
// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = 'INSERT INTO teamuser (username, password) VALUES :username, :password';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $password);
$statement->execute();
?>
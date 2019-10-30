<?php
// Start the session
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: sign-in.php");
    die();
}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION["user_id"]?></h1>
</body>
</html>
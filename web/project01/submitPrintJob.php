<?php
// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$name       = $_POST['name'];
$spool      = $_POST['spool'];
$amount     = $_POST['amount'];
$printer    = $_POST['printer'];
$hours      = $_POST['hours'];
$min        = $_POST['min'];
$user       = $_POST['user'];
if (isset($_POST['failed'])) {
    $failed = false;
} else {
    $failed = true;
}
if (isset($_POST["percentFailed"])) {
    $percentFailed = $_POST['percentFailed'];
} else {
    $percentFailed = 100;
}
$time = date('Y-m-d H:i:s');

echo "name          = $name\n";
echo "spool         = $spool\n";
echo "amount        = $amount\n";
echo "printer       = $printer\n";
echo "hours         = $hours\n";
echo "min           = $min\n";
echo "user          = $user\n";
echo "failed        = $failed\n";
echo "percentFailed = $percentFailed\n";
echo "time          = $time\n";


try
{


    $query = 'INSERT INTO print_job (name, spool_id, filament_used, printer_id, time_hours, time_minutes, user_id, completed, percent_at_failure, date) VALUES (:name, :spool, :amount, :printer, :hours, :min, :user, :failed, :percentFailed, :time)';
    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':spool', $spool);
    $statement->bindValue(':amount', $amount);
    $statement->bindValue(':printer', $printer);
    $statement->bindValue(':hours', $hours);
    $statement->bindValue(':min', $min);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':failed', $failed);
    $statement->bindValue(':percentFailed', $percentFailed);
    $statement->bindValue(':time', $time);
    $statement->execute();
}
catch (Exception $ex)
{
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

header("Location: addSpool.php");

die();


?>
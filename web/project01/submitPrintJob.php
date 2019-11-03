<?php
// Start the session
session_start();

// Redirect if not logged in
if (isset($_SESSION['display_name']))
{
	$display_name = $_SESSION['display_name'];
}
else
{
	header("Location: sign-in.php");
	die();
}

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$job_name       = $_POST['job_name'];
$spool          = $_POST['spool'];
$amount         = $_POST['amount'];
$printer        = $_POST['printer'];
$hours          = $_POST['hours'];
$min            = $_POST['min'];
$user           = $_POST['user'];
$completed      = $_POST['completed'];
$percentFailed  = $_POST['percentFailed'];
$time           = date('Y-m-d H:i:s');

echo "job_name      = $job_name\n";
echo "spool         = $spool\n";
echo "amount        = $amount\n";
echo "printer       = $printer\n";
echo "hours         = $hours\n";
echo "min           = $min\n";
echo "user          = $user\n";
echo "completed     = $completed\n";
echo "percentFailed = $percentFailed\n";
echo "time          = $time\n";


try
{
    // Inserts new print job into the table
    $query = 'INSERT INTO print_job (job_name, spool_id, filament_used, printer_id, time_hours, time_minutes, user_id, completed, percent_at_failure, date) VALUES (:job_name, :spool, :amount, :printer, :hours, :min, :user, :completed, :percentFailed, :time)';
    $statement = $db->prepare($query);

    $statement->bindValue(':job_name', $job_name);
    $statement->bindValue(':spool', $spool);
    $statement->bindValue(':amount', $amount);
    $statement->bindValue(':printer', $printer);
    $statement->bindValue(':hours', $hours);
    $statement->bindValue(':min', $min);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':completed', $completed);
    $statement->bindValue(':percentFailed', $percentFailed);
    $statement->bindValue(':time', $time);
    $statement->execute();

    // Gets the current weight for the spool and sets it to a variable
    $sql = "SELECT filament_left FROM filament_spool WHERE spool_id = $spool";
    foreach ($db->query($sql) as $row) {
        $currentFilament = $row['filament_left'];
    }

    // Calculates actual filament used as a function of how much of the print was actually completed
    $filamentUsed = $amount * ($percentFailed / 100);

    // Calculate the new weight for the spool by removing amount used in print job
    $newWeight = $currentFilament - $filamentUsed;

    // Set spool to new weight based off above calculation
    $query = 'UPDATE filament_spool SET filament_left = :newWeight WHERE spool_id = :spool';
    $statement = $db->prepare($query);
    $statement->bindValue(':newWeight', $newWeight);
    $statement->bindValue(':spool', $spool);
    $statement->execute();
}
catch (Exception $ex)
{
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

header("Location: addPrintJob.php");

die();


?>
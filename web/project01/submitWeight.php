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

$spool    = $_POST['spool'];
$weight   = $_POST['weight'];


echo "spool=$spool\n";
echo "weight=$weight\n";

try
{
    // Gets the current weight for the spool and sets it to a variable
    $sql = "SELECT filament_manufacturer.empty_spool_weight FROM filament_manufacturer INNER JOIN filament_spool ON filament_manufacturer.id = filament_spool.manufacturer_id WHERE filament_spool.id = $spool";
    foreach ($db->query($sql) as $row) {
        $emptyWeight = $row['empty_spool_weight'];
    }

    echo "Empty Weight = $emptyWeight\n";

    // Changes new weight to entered value minus the empty spool weight
    $newWeight = $weight - $emptyWeight;
    echo "New Weight = $newWeight\n";

    $query = 'UPDATE filament_spool SET filament_left = :newWeight WHERE id = :spool';
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

header("Location: addWeight.php");

die();


?>
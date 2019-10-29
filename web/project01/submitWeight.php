<?php
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
    $query1 = 'SELECT filament_manufacturer.empty_spool_weight FROM filament_manufacturer INNER JOIN filament_spool ON filament_manufacturer.id = filament_spool.manufacturer_id WHERE filament_spool.id = :spool';
    $result = mysql_query($sql);
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $emptyWeight = mysql_fetch_row($result);
    
    echo "Empty Weight = $emptyWeight\n";

    // Changes new weight to entered value minus the empty spool weight
    $newWeight = $weight - $emptyWeight;
    echo "New Weight = $newWeight\n";

    $query = 'UPDATE filament_spool SET filament_left = :newWeight';
    $statement = $db->prepare($query);

    $statement->bindValue(':newWeight', $newWeight);
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
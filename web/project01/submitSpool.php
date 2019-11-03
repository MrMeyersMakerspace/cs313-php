<?php
// Start the session
session_start();

// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$name           = $_POST['name'];
$manufacturer   = $_POST['manufacturer'];
$color          = $_POST['color'];
$plasticType    = $_POST['plasticType'];
$size           = $_POST['size'];
$printTemp      = $_POST['printTemp'];
$bedTemp        = $_POST['bedTemp'];
$cost           = $_POST['cost'];
$notes          = $_POST['notes'];

echo "name=$name\n";
echo "manufacturer=$manufacturer\n";
echo "color=$color\n";
echo "plasticType=$plasticType\n";
echo "size=$size\n";
echo "printTemp=$printTemp\n";
echo "bedTemp=$bedTemp\n";
echo "cost=$cost\n";
echo "notes=$notes\n";

try
{


    $query = 'INSERT INTO filament_spool (name, manufacturer_id, color, filament_id, filament_amount_new, filament_left, print_temp, bed_temp, cost, notes, empty) VALUES (:name, :manufacturer, :color, :plasticType, :size, :size, :printTemp, :bedTemp, :cost, :notes, false)';
    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':manufacturer', $manufacturer);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':plasticType', $plasticType);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':printTemp', $printTemp);
    $statement->bindValue(':bedTemp', $bedTemp);
    $statement->bindValue(':cost', $cost);
    $statement->bindValue(':notes', $notes);
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
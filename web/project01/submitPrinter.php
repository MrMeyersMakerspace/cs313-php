<?php
// Connect to database on startup
require("dbConnect.php");
$db = get_db();

$name           = $_POST['name'];
$manufacturer   = $_POST['manufacturer'];
$model          = $_POST['model'];

echo "name=$name\n";
echo "manufacturer=$manufacturer\n";
echo "model=$model\n";

try
{


    $query = 'INSERT INTO printer (printer_name, manufacturer, model) VALUES (:name, :manufacturer, :model)';
    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':manufacturer', $manufacturer);
    $statement->bindValue(':model', $model);
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
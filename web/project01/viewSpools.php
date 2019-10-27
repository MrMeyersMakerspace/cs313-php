<?php
// Connect to database on startup
require("dbConnect.php");
$db = get_db();
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--Link for Dosis Font-->
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet" />
    <!--Link for social media icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Link for nav icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Filament Tracker</title>
</head>
<body>
    <div id="page-container">
        <div id="content-wrap">
            <header>
                <h1 id="pageName">Filament Tracker Web App</h1>

                <hr />
                <div class="topnav" id="myTopnav">
                    <a href="index.php">Home</a>
                    <a href="viewSpools.php" class="active">View Spools</a>
                    <a href="addPrintJob.php">Add Print Job</a>
                    <a href="addWeight.php">Add New Weight</a>
                    <a href="viewPrintJobs.php">View Print Jobs</a>
                    <a href="addSpool.php">Add New Spool</a>
                    <a href="addPrinter.php">Add New Printer</a>
                    <a href="javascript:void(0);" class="icon" onclick="navigationBar()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </header>

            <h1>View Current Spools</h1>
           
            <form>
                Type of plastic:
                <input type="text" name="plasticType" />
                <br />
                <input type="submit" value="Search" />
            </form>

            <?php
            $statement = $db->prepare('SELECT * FROM ((filament_spool fs INNER JOIN filament_manufacturer fm ON fs.manufacturer_id = fm.id) INNER JOIN filament_type ft ON fs.filament_id = ft.id) WHERE type_of_plastic = :plasticType');
            $statement -> bindValue(':filamentType', $_GET['filamentType'], PDO::PARAM_STR);
            $statement -> execute();
            $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row)
			{
				echo '<h3>' . $row['company'] . ' ' . $row['color'] . ' ' . $row['type_of_plastic'] . '</h3>';
				echo '<ul>';
				echo '<li>Amount of filament left: ' . $row['filament_left'] . ' grams</li>';
				echo '<li>Print temperature: ' . $row['print_temp'] . '&#176; C</li>';
				echo '<li>Bed temperature: ' . $row['bed_temp'] . '&#176; C</li>';
				echo '</ul>';
				echo '<br/>';
			}
            ?>


						
        </div>
        <footer>
            <div class="footer-center">
                ©<?php
                 $copyYear = 2019;
                 $curYear = date('Y'); // Keeps the second year updated
                 echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
                 ?>
            Copyright John H. Meyers
            </div>
            <div class="footer-center">
                <a href="https://www.instagram.com/mrmeyersmakerspace/" class="ifoot fa fa-instagram"></a>
                <a href="https://github.com/MrMeyersMakerspace" class="ifoot fa fa-github"></a>
            </div>
        </footer>
    </div>

    <script>
    // Shows navigation bar list when icon clicked
function navigationBar() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
    </script>
</body>
</html>
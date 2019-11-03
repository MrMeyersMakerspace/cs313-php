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
                    <a href="viewSpools.php">View Spools</a>
                    <a href="addPrintJob.php">Add Print Job</a>
                    <a href="addWeight.php">Add New Weight</a>
                    <a href="viewPrintJobs.php" class="active">View Print Jobs</a>
                    <a href="addSpool.php">Add New Spool</a>
                    <a href="addPrinter.php">Add New Printer</a>
                    <a href="javascript:void(0);" class="icon" onclick="navigationBar()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </header>

            <h1>View Stored Print Jobs</h1>
            <h2 style="text-align:center;">Search print jobs by user, 3D printer, or display them all!</h2>

            <div class="flex-container">
                <form>
                User: 
                <select name="user" required>
                    <option disabled selected> -- select an option -- </option>
                    <?php
                    $rows = $db->query('SELECT * FROM users');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['user_id'] . "'>" . $row['display_name'] . "</option>";
                    }
                    ?>
                </select><br />
                    <input type="submit" value="Search by User" />
                </form>
                <form>
                    Printer:
                <select name="printer" required>
                    <option disabled selected> -- select an option -- </option>
                    <?php
                    $rows = $db->query('SELECT * FROM printer');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['printer_id'] . "'>" . $row['printer_name'] . "</option>";
                    }
                    ?>
                </select><br />
                    <input type="submit" value="Search by User" />
                </form>
                <form>
                    <input type="hidden" name="showAll" value="displayAll" />
                    <br />
                    <input type="submit" value="Display All" />
                </form>
            </div>

            <?php
            if (isset($_GET['user'])) {
                $statement = $db->prepare('SELECT * FROM (((print_job pj INNER JOIN users u ON pj.user_id = u.user_id) INNER JOIN printer p ON pj.printer_id = p.printer_id) INNER JOIN filament_spool fs ON pj.spool_id = fs.id) WHERE u.user_id = :user');
                $statement -> bindValue(':user', $_GET['user'], PDO::PARAM_STR);
                $statement -> execute();
                $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
            }

            if (isset($_GET['printer'])) {
                $statement = $db->prepare('SELECT * FROM (((print_job pj INNER JOIN users u ON pj.user_id = u.user_id) INNER JOIN printer p ON pj.printer_id = p.printer_id) INNER JOIN filament_spool fs ON pj.spool_id = fs.id) WHERE p.printer_id = :printer');
                $statement -> bindValue(':printer', $_GET['printer'], PDO::PARAM_STR);
                $statement -> execute();
                $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
            }

            if (isset($_GET['showAll'])) {
                $rows = $db->query('SELECT * FROM (((print_job pj INNER JOIN users u ON pj.user_id = u.user_id) INNER JOIN printer p ON pj.printer_id = p.printer_id) INNER JOIN filament_spool fs ON pj.spool_id = fs.spool_id)');
            }

            //Get data using INNER JOIN from 3 tables (print_job, users, & printers) to display proper names
			foreach ($rows as $row)
			{
				echo '<h3>Print job - ' . $row['job_name'] . '</h3>';
				echo '<ul>';
                echo '<li>Spool used: ' . $row['color'] . ' ' . $row['name'] . '</li>'; 
				echo '<li>Amount of filament used: ' . $row['filament_used'] . ' grams</li>';
				echo '<li>Printed on: ' . $row['printer_name'] . '</li>';
				echo '<li>Print time: ' . $row['time_hours'] . ' hr ' . $row['time_minutes'] . ' min</li>';
				echo '<li>Print date: ' . $row['date'] . '</li>';
				echo '<li>Printed by: ' . $row['display_name'] . '</li>';
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
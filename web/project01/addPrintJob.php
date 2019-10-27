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
                    <a href="viewSpools.php">View Spools</a>
                    <a href="addPrintJob.php" class="active">Add Print Job</a>
                    <a href="addWeight.php">Add New Weight</a>
                    <a href="viewPrintJobs.php">View Print Jobs</a>
                    <a href="addSpool.php">Add New Spool</a>
                    <a href="addPrinter.php">Add New Printer</a>
                    <a href="javascript:void(0);" class="icon" onclick="navigationBar()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </header>

            <h1>Add a New Print Job</h1>
            <h2 style="text-align:center;">Please fill out the form below for the new print job!</h2>

            <form action="submitPrintJob.php" method="POST">
                Name: <input type="text" name="name" placeholder="Job Name" required/><br />
                Spool Used: 
                <select name="spool" required>
                    <option disabled selected> -- select an option -- </option>
                    <?php
                    $rows = $db->query('SELECT * FROM ((filament_spool fs INNER JOIN filament_manufacturer fm ON fs.manufacturer_id = fm.id) INNER JOIN filament_type ft ON fs.filament_id = ft.id)');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . " - " . $row['company'] . ' ' . $row['color'] . ' ' . $row['type_of_plastic'] . "</option>";
                    }
                    ?>
                </select><br />
                Amount of Filament Used: <input type="number" name="amount" placeholder="0" min="0" required/><br />
                Printer Used: 
                <select name="printer" required>
                <option disabled selected> -- select an option -- </option>
                    <?php
                    $rows = $db->query('SELECT * FROM printer');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['printer_name'] . "</option>";
                    }
                    ?>
                </select><br />
                Print Time: Hours <input type="number" name="hours" placeholder="0" min="0" max="500" required/> Minutes <input type="number" name="min" placeholder="0" min="0" max="59" required/><br />
                User: 
                <select name="user" required>
                <option disabled selected> -- select an option -- </option>
                    <?php
                    $rows = $db->query('SELECT * FROM users');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['display_name'] . "</option>";
                    }
                    ?>
                </select><br />
                Check if print job failed <input type="checkbox" id="failed" onclick="makeRequired()"/>  
                If print failed, enter the estimated percent it failed at: <input type="number" name="min" placeholder="0" min="0" max="99"/><br />








                <input type="submit" value="Submit Print Job"/>
            </form>

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

        // Makes the percentage input required if the checkbox for failure is checked
        function makeRequired() {
            if (document.getElementById("failed").checked = true) {
                document.getElementById("percent").required = true;
            } else {
                document.getElementById("percent").required = false;
            }
        }
    </script>
</body>
</html>
<?php
// Start the session
session_start();

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
                    <a href="viewPrintJobs.php">View Print Jobs</a>
                    <a href="addSpool.php" class="active">Add New Spool</a>
                    <a href="addPrinter.php">Add New Printer</a>
                    <a href="javascript:void(0);" class="icon" onclick="navigationBar()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </header>

            <h1>Add a New Spool</h1>
            <h2 style="text-align:center;">Please enter the data below for a new spool of filament to add it to the database!</h2>

            <form action="submitSpool.php" method="POST">
                Name: <input type="text" name="name" placeholder="Spool Name" required/><br />
                Manufacturer: 
                <select name="manufacturer" required>

                    <?php
                    $rows = $db->query('SELECT * FROM filament_manufacturer');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['company'] . "</option>";
                    }
                    ?>
                </select><br />
                Color: <input type="text" name="color" placeholder="Filament Color" required/><br />
                Type of Plastic: 
                <select name="plasticType" required>
                    <?php
                    $rows = $db->query('SELECT * FROM filament_type');

                    foreach ($rows as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['type_of_plastic'] . "</option>";
                    }
                    ?>
                </select><br />
                Size of Spool: 
                <select name="size" required>
                    <option value="1000">1000 grams</option>
                    <option value="750">750 grams</option>
                    <option value="500">500 grams</option>
                    <option value="250">250 grams</option>
                </select><br />
                Print Temp: <input type="number" name="printTemp" placeholder="0" min="150" required/><br />
                Bed Temp: <input type="number" name="bedTemp" placeholder="0" min="0" required/><br />
                Cost: <input type="number" name="cost" placeholder="0.00" min="0" step="0.01" required/><br />
                Notes: <textarea rows="4" cols="50" name="notes" id="textBox" onfocus="removeText()">Enter any extra notes here.</textarea><br />
                <input type="submit" value="Submit Spool"/>
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

        function removeText() {
            document.getElementById("textBox").innerHTML = "";
        }
    </script>
</body>
</html>
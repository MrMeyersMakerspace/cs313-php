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
                    <a href="index.php" class="active">Home</a>
                    <a href="viewSpools.php">View Spools</a>
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


            <div class="image">
                <img src="images/spools.jpg" alt="Filament Spools" />
                <a href="https://commons.wikimedia.org/wiki/File:3D_Printing_Materials_(16837486456).jpg" target="_blank" class="caption">Maurizio Pesce (CC BY 2.0)</a>
            </div>

            <div id="welcome"></div>

            <p>Welcome to my filament tracker web app, where you can keep track of the filament usage for your 3D printer(s).  I don't know about you but it can be a pain to keep track of how much filament is left on my spools of filament, especially when I'm running a makerspace with multiple 3D printers and 20+ spools of filament.  This web app was created to solve that problem.  I hope it will help you out as much as it helps me.</p>

            <p>This app keeps track of your 3D printers, individual print jobs, and spools of filament.  By using the links above you can go to the specific pages to do the following:</p>

            <ul>
                <li>View details of current spools of filament, including amount of filament left.</li>
                <li>Create a new print job with filament usage.</li>
                <li>Add a new weight measurement for a spool of filament.</li>
                <li>View print jobs that have been completed.</li>
                <li>Add a new spool of filament to the database.</li>
                <li>Add a new 3D printer to the database.</li>
            </ul>

            <div id="login">
                <p>Before you can get started you must setup a new account/login.  Please login below or click the link to create a new account.</p>
                <div class="form">
                    <form method="POST" action="login.php">
                        <label>Username:</label>
                        <br />
                        <input type="text" name="username" id="username" />
                        <br />
                        <label>Password:</label>
                        <br />
                        <input type="text" name="password" id="password" />
                        <br />
                        <button type="submit">Login</button>
                    </form>
                    <br />
                    <br />
                    <a href="sign-up.php" id="signup">Click Here to Create a New Account</a>
                </div>
            </div>

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

    <?php
    // Check and see what the login status is
    if ($_SESSION['user_id'] == "wrongPW") {
        echo '
    <script>document.getElementById("welcome").innerHTML = "Wrong password was entered.  Please try again!";
';
        echo 'document.getElementById("welcome").style.color = "red";</script>
';
    } else if ($_SESSION['user_id'] == "notYetApproved") {
        echo '
    <script>document.getElementById("welcome").innerHTML = "User account has not yet been approved.  Please contact Maker Meyers for account approval.";
';
        echo 'document.getElementById("welcome").style.color = "red";</script>
';
    } else {
        $query = 'SELECT display_name FROM users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $result = $statement->execute();

        if ($result) {
            $row = $statement->fetch();
            $displayName = $row['display_name'];
            echo '<script>document.getElementById("welcome").innerHTML = "Welcome ' . $displayName . '!";
';
            echo 'document.getElementById("welcome").style.color = "#1c2321";
';
            echo 'document.getElementById("login").style.display = "none";</script>
';
        }
    }
    ?>

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
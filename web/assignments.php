<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mr. Meyers Makerspace - Assignments</title>
    <link rel="stylesheet" type="text/css" href="prove02.css" />
</head>
<body>
    <div class="header">
        <div class="title">
            <a href="index.html" id="mmm">Mr. Meyers Makerspace</a>
        </div>
        <div class="header-right">
            <a href="index.html">Home</a>
            <a class="active" href="assignments.php">Assignments</a>
        </div>
    </div>
    <br />
    <br />
    <!--Animation style based on https://codepen.io/finnhvman/pen/BGmygj -->
    <div class="deconstructed">
        COMING SOON!
        <div>COMING SOON!</div>
        <div>COMING SOON!</div>
        <div>COMING SOON!</div>
        <div>COMING SOON!</div>
    </div>
    <br />
    <br />

    <!-- PHP countdown until end of semester -->
    <?php
    $d1=strtotime("December 18");
    $d2=ceil(($d1-time())/60/60/24);
    echo "PHP tells me there are " . $d2 ." days until the end of the semester!";
    ?>

</body>
</html>
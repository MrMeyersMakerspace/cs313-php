<?php
	// Start the session
	session_start();

	$street = htmlspecialchars($_POST['street']);
	$city = htmlspecialchars($_POST['city']);
	$state = htmlspecialchars($_POST['state']);
	$zip = htmlspecialchars($_POST['zip']);
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>3D Printer Store</title>
    <link rel="stylesheet" type="text/css" href="prove03.css" />
</head>
<body onload="onPageLoad()">
    <div class="header">
        <div>
            <a href="browseItems.html" id="pageName" onclick="updateCart()">3D Printer Store</a>
        </div>
        <div class="header-right">
            <a href="browseItems.html" onclick="updateCart()">Browse Items</a>
            <a href="cart.html">Cart <span id="items"></span></a>
        </div>
    </div>

    <h1>Order Confirmation</h1>

    <div id="test"></div>
    <div id="test2"></div>

		<div id="description">
				<p>Thank you for ordering.  Your items will be be shipped within 24 hours to the address provided below:<p>
				<p><?php echo $street . "<br/>" . $city . ", " . $state . " " . $zip;?><p>
		</div>
		
		
    <div class="printers">
        <figure id="miniCart" class="item">
            <img src="selectMini.jpg" alt="Monoprice Select Mini Pro" height="300" class="printer" />
            <figcaption>
                <h2>Monoprice Select Mini<br /><?php echo "Quantity: " . $_SESSION["mini"]?></h2>
            </figcaption>
        </figure>

        <figure id="enderCart" class="item">
            <img src="ender3.png" alt="Creality Ender 3" height="300" class="printer" />
            <figcaption>
                <h2>Creality Ender 3<br /><?php echo "Quantity: " . $_SESSION["ender"]?></h2>
            </figcaption>
        </figure>

        <figure id="voxelCart" class="item">
            <img src="voxel.jpg" alt="Monoprice Voxel" height="300" class="printer" />
            <figcaption>
                <h2>Monoprice Voxel<br /><?php echo "Quantity: " . $_SESSION["voxel"]?></h2>
            </figcaption>
        </figure>

        <figure id="cr10Cart" class="item">
            <img src="cr10.jpg" alt="Creality CR-10" height="300" class="printer" />
            <figcaption>
                <h2>Creality CR-10<br /><?php echo "Quantity: " . $_SESSION["cr10"]?></h2>
            </figcaption>
        </figure>

        <figure id="cr10sCart" class="item">
            <img src="cr10s5.jpg" alt="Creality CR-10S5" height="300" class="printer" />
            <figcaption>
                <h2>Creality CR-10S5<br /><?php echo "Quantity: " . $_SESSION["cr10s"]?></h2>
            </figcaption>
        </figure>

        <figure id="prusaCart" class="item">
            <img src="prusa.jpg" alt="Prusa MK3S" height="300" class="printer" />
            <figcaption>
                <h2>Prusa MK3S<br /><?php echo "Quantity: " . $_SESSION["prusa"]?></h2>
            </figcaption>
        </figure>
    </div>

    <div></div>


    <!-- JAVASCRIPT -->
    <script>
				// Gets current cart data saved as session on php page
        function onPageLoad() {
                    // Hide cart items that are equal to zero
                    if (<?php echo $_SESSION["mini"]?> == 0) {
                        document.getElementById("miniCart").style.display = "none";
                    }
                    if (<?php echo $_SESSION["ender"]?> == 0) {
                        document.getElementById("enderCart").style.display = "none";
                    }
                    if (<?php echo $_SESSION["voxel"]?> == 0) {
                        document.getElementById("voxelCart").style.display = "none";
                    }
                    if (<?php echo $_SESSION["cr10"]?> == 0) {
                        document.getElementById("cr10Cart").style.display = "none";
                    }
                    if (<?php echo $_SESSION["cr10s"]?> == 0) {
                        document.getElementById("cr10sCart").style.display = "none";
                    }
                    if (<?php echo $_SESSION["prusa"]?> == 0) {
                        document.getElementById("prusaCart").style.display = "none";
                    }
                
        }
    </script>
</body>

</html>

<?php
		session_destroy();
?>
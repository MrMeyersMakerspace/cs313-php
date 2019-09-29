<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mr. Meyers Makerspace</title>
    <link rel="stylesheet" type="text/css" href="prove02.css" />
</head>
<body>
    <div class="header">
        <!--Animation style based on https://codepen.io/sxrdev/pen/LXMwPb -->
        <div class="title">
            <a href="index.php" id="mmm">Mr. Meyers Makerspace</a>
        </div>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a href="assignments.html">Assignments</a>
        </div>
    </div>

    <h1>3D Printer Selection</h1>

    <p>Please select a button below for a list of recommended 3D printers in that price point.</p>

    <div class="buttonOptions">
        <button onclick="printer250()">< $250</button>
        <button onclick="printer500()">$250 - $500</button>
        <button onclick="printer750()">$500 - $1000</button>
    </div>

    <div class="printers">
        <figure id="selectMini" class="hidden">
            <img src="selectMini.jpg" alt="Monoprice Select Mini Pro" height="400" />
            <figcaption>
                <h2>Monoprice Select Mini Pro (~$200)</h2>
                <ul>
                    <li>Small, capable, inexpensive, and reliable pre-built printer</li>
                    <li>Removable magnetic build plate</li>
                    <li>Auto leveling print bed</li>
                    <li>Touch screen interface</li>
                    <li>Power outage recovery</li>
                    <li>Small build area (120mm X 120mm X 120mm)</li>
                    <li>Build plate only gets to 70 °C so no ABS printing</li>
                    <li>Plug and play.  You unpack it from the box, run the initial calibration and you're ready to print.</li>
                </ul>
            </figcaption>
        </figure>

        <figure id="ender3" class="hidden">
            <img src="ender3.png" alt="Creality Ender 3" height="400" />
            <figcaption>
                <h2>Creality Ender 3 (~$230)</h2>
                <ul>
                    <li>Extremely popular larger printer kit that you assemble yourself</li>
                    <li>Aluminum build plate</li>
                    <li>Manual bed leveling</li>
                    <li>Automatically recovers from power outages</li>
                    <li>Bigger build area (220mm X 220mm X 250mm)</li>
                    <li>Build plate gets to 110 °C so you can print ABS</li>
                    <li>Open source so easily upgradable to add more advanced features like auto leveling</li>
                </ul>
            </figcaption>
        </figure>

        <figure id="voxel" class="hidden">
            <img src="voxel.jpg" alt="Monoprice Voxel" height="400" />
            <figcaption>
                <h2>Monoprice Voxel (~$400)</h2>
                <ul>
                    <li>Fully enclosed prebuilt printer with lots of advanced features</li>
                    <li>Removable build plate</li>
                    <li>Auto leveling print bed</li>
                    <li>Touch screen interface</li>
                    <li>Quick swap nozzles</li>
                    <li>Wireless printing</li>
                    <li>Built in webcam for print monitoring</li>
                    <li>Smaller build area (150mm X 150mm X 150mm)</li>
                    <li>Enclosure makes it great for printing ABS</li>
                </ul>
            </figcaption>
        </figure>

        <figure id="cr10" class="hidden">
            <img src="cr10.jpg" alt="Creality CR-10" height="400" />
            <figcaption>
                <h2>Creality CR-10 (~$350)</h2>
                <ul>
                    <li>Popular very large form factor mostly built printer</li>
                    <li>Glass build plate</li>
                    <li>Manual bed leveling</li>
                    <li>Very large build area (300mm X 300mm X 400mm) at a great price, which is its biggest selling point</li>
                    <li>Open source so easily upgradable to auto leveling and/or magnetically removable build plate</li>
                </ul>
            </figcaption>
        </figure>

        <figure id="cr10s5" class="hidden">
            <img src="cr10s5.jpg" alt="Creality CR-10S5" height="400" />
            <figcaption>
                <h2>Creality CR-10S5 (~$760)</h2>
                <ul>
                    <li>Biggest print area of any 3D printer under $3500</li>
                    <li>Glass build plate</li>
                    <li>Manual bed leveling</li>
                    <li>Huge build area (500mm X 500mm X 500mm) at a price no other large format printer of this size can come close to, which is its biggest selling point</li>
                    <li>Open source so easily upgradable to auto leveling and/or magnetically removable build plate</li>
                </ul>
            </figcaption>
        </figure>

        <figure id="prusa" class="hidden">
            <img src="prusa.jpg" alt="Prusa MK3S" height="400" />
            <figcaption>
                <h2>Prusa MK3S</h2>
                <ul>
                    <li>Award winning and easiest to use 3D printer kit</li>
                    <li>Consistently produces extremely high quality prints</li>
                    <li>Magnetic removable spring steel build plate</li>
                    <li>Auto leveling print bed</li>
                    <li>Filament run out sensor</li>
                    <li>Power outage recovery</li>
                    <li>Large build area (210mm X 210mm X 250mm)</li>
                    <li>Open source and made to be upgraded for wireless printing, webcam monitoring, and Octoprint with an optional Raspberry Pi Zero</li>
                </ul>
            </figcaption>
        </figure>
    </div>

    <br />
    <br />

    <?php
    $d1=strtotime("December 18");
    $d2=ceil(($d1-time())/60/60/24);
    echo "There are " . $d2 ." days until the end of the semester!.";
    ?>

    <script>
        function printer250() {
            document.getElementById("selectMini").style.display = "block";
            document.getElementById("ender3").style.display = "block";
            document.getElementById("cr10").style.display = "none";
            document.getElementById("voxel").style.display = "none";
            document.getElementById("cr10s5").style.display = "none";
            document.getElementById("prusa").style.display = "none";
        }

        function printer500() {
            document.getElementById("selectMini").style.display = "none";
            document.getElementById("ender3").style.display = "none";
            document.getElementById("cr10").style.display = "block";
            document.getElementById("voxel").style.display = "block";
            document.getElementById("cr10s5").style.display = "none";
            document.getElementById("prusa").style.display = "none";
        }

        function printer750() {
            document.getElementById("selectMini").style.display = "none";
            document.getElementById("ender3").style.display = "none";
            document.getElementById("cr10").style.display = "none";
            document.getElementById("voxel").style.display = "none";
            document.getElementById("cr10s5").style.display = "block";
            document.getElementById("prusa").style.display = "block";
        }
    </script>
</body>
</html>
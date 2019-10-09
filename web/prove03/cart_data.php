<?php
    //  Start the session
    session_start();

	if (isset($_GET["mini"])) {
	$_SESSION["mini"]  = $_GET["mini"];
	$_SESSION["ender"] = $_GET["ender"];
	$_SESSION["voxel"] = $_GET["voxel"];
	$_SESSION["cr10"]  = $_GET["cr10"];
	$_SESSION["cr10s"] = $_GET["cr10s"];
	$_SESSION["prusa"] = $_GET["prusa"];
	}

	// Testing variable output
	/*echo "<br>";
	var_dump($_REQUEST);
	echo "<br>";
	var_dump($_SESSION);
	echo "<br>";*/

	settype($_SESSION["mini"], "integer");
	settype($_SESSION["ender"], "integer");
	settype($_SESSION["voxel"], "integer");
	settype($_SESSION["cr10"], "integer");
	settype($_SESSION["cr10s"], "integer");
	settype($_SESSION["prusa"], "integer");
					
	$printerArray = array(
			"mini"	=>	$_SESSION["mini"],	
			"ender"	=>	$_SESSION["ender"],	
			"voxel"	=>	$_SESSION["voxel"],	
			"cr10"	=>	$_SESSION["cr10"],	
			"cr10s"	=>	$_SESSION["cr10s"],	
			"prusa"	=>	$_SESSION["prusa"]		
	);

	echo json_encode($printerArray);
?>
<?php
    /*//  Start the session
    session_start();

	$_SESSION["Smini"]  = $_REQUEST["mini"];
	$_SESSION["Sender"] = $_REQUEST["ender"];
	$_SESSION["Svoxel"] = $_REQUEST["voxel"];
	$_SESSION["Scr10"]  = $_REQUEST["cr10"];
	$_SESSION["Scr10s"] = $_REQUEST["cr10s"];
	$_SESSION["Sprusa"] = $_REQUEST["prusa"];

	$printerArray = array(
			"mini"	=>	$_SESSION["Smini"],
			"ender"	=>	$_SESSION["Sender"],
			"voxel"	=>	$_SESSION["Svoxel"],
			"cr10"	=>	$_SESSION["Scr10"],
			"cr10s"	=>	$_SESSION["Scr10s"],
			"prusa"	=>	$_SESSION["Sprusa"]
	);

	echo json_encode($printerArray);*/
	print($_GET["mini"]);
?>
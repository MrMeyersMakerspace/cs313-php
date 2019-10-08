<?php
    //  Start the session
    session_start();

	$_SESSION["Smini"]  = $_REQUEST["mini"];
	$_SESSION["Sender"] = $_REQUEST["ender"];
	$_SESSION["Svoxel"] = $_REQUEST["voxel"];
	$_SESSION["Scr10"]  = $_REQUEST["cr10"];
	$_SESSION["Scr10s"] = $_REQUEST["cr10s"];
	$_SESSION["Sprusa"] = $_REQUEST["prusa"];

	$printerArray = array(
			"mini"	=>	5,	//$_SESSION["Smini"],
			"ender"	=>	4,	//$_SESSION["Sender"],
			"voxel"	=>	3,	//$_SESSION["Svoxel"],
			"cr10"	=>	2,	//$_SESSION["Scr10"],
			"cr10s"	=>	2,	//$_SESSION["Scr10s"],
			"prusa"	=>	1	//$_SESSION["Sprusa"]
	);

	echo json_encode($printerArray);
?>

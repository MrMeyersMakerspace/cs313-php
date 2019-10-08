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
			"mini"	=>	$_SESSION["Smini"],		//5,	
			"ender"	=>	$_SESSION["Sender"],	//4,	
			"voxel"	=>	$_SESSION["Svoxel"],	//3,	
			"cr10"	=>	$_SESSION["Scr10"],		//2,	
			"cr10s"	=>	$_SESSION["Scr10s"],	//2,	
			"prusa"	=>	$_SESSION["Sprusa"]		//1 	
	);

	echo json_encode($printerArray);
?>
<?php
    //  Start the session
    session_start();
		
		$_SESSION["Smini"]  = $_GET["mini"];
		$_SESSION["Sender"] = $_GET["ender"];
		$_SESSION["Svoxel"] = $_GET["voxel"];
		$_SESSION["Scr10"]  = $_GET["cr10"];
		$_SESSION["Scr10s"] = $_GET["cr10s"];
		$_SESSION["Sprusa"] = $_GET["prusa"];

		$printerArray = array(
				"Amini"		=>	$_SESSION["mini"],
				"Aender"	=>	$_SESSION["ender"],
				"Avoxel"	=>	$_SESSION["voxel"],
				"Acr10"		=>	$_SESSION["cr10"],
				"Acr10s"	=>	$_SESSION["cr10s"],
				"Aprusa"	=>	$_SESSION["prusa"]
		);

		echo json_encode($printerArray);
?>
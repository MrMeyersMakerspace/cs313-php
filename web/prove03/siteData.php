<?php
    //  Start the session
    /*session_start();
		
		$_SESSION["Smini"]  = $_GET["mini"];
		$_SESSION["Sender"] = $_GET["ender"];
		$_SESSION["Svoxel"] = $_GET["voxel"];
		$_SESSION["Scr10"]  = $_GET["cr10"];
		$_SESSION["Scr10s"] = $_GET["cr10s"];
		$_SESSION["Sprusa"] = $_GET["prusa"];*/

		$printerArray = array(
				"Amini"		=>	$_GET["mini"],
				"Aender"	=>	$_GET["ender"],
				"Avoxel"	=>	$_GET["voxel"],
				"Acr10"		=>	$_GET["cr10"],
				"Acr10s"	=>	$_GET["cr10s"],
				"Aprusa"	=>	$_GET["prusa"]
		);

		echo json_encode($printerArray);
?>
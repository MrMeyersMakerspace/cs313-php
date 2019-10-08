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
				"Amini"		=>	$_POST["mini"],
				"Aender"	=>	$_POST["ender"],
				"Avoxel"	=>	$_POST["voxel"],
				"Acr10"		=>	$_POST["cr10"],
				"Acr10s"	=>	$_POST["cr10s"],
				"Aprusa"	=>	$_POST["prusa"]
		);

		echo json_encode($printerArray);
		echo $_POST["mini"];
		echo $_POST[mini];
?>
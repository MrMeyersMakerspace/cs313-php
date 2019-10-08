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
				"mini"	=>	$_GET["mini"],
				"ender"	=>	$_GET["ender"],
				"voxel"	=>	$_GET["voxel"],
				"cr10"	=>	$_GET["cr10"],
				"cr10s"	=>	$_GET["cr10s"],
				"prusa"	=>	$_GET["prusa"]
		);

		echo json_encode($printerArray);
?>
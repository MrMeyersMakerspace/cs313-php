<?php
    //  Start the session
    session_start();
		
		$_SESSION["mini"]  = $_REQUEST["mini"];
		$_SESSION["ender"] = $_REQUEST["ender"];
		$_SESSION["voxel"] = $_REQUEST["voxel"];
		$_SESSION["cr10"]  = $_REQUEST["cr10"];
		$_SESSION["cr10s"] = $_REQUEST["cr10s"];
		$_SESSION["prusa"] = $_REQUEST["prusa"];

		$printerArray = array(
				"mini"		=>	$_REQUEST["mini"];   //$_SESSION["mini"],
				"ender"		=>	$_REQUEST["ender"];   //$_SESSION["ender"],
				"voxel"		=>	$_REQUEST["voxel"];   //$_SESSION["voxel"],
				"cr10"		=>	$_REQUEST["cr10"];   //$_SESSION["cr10"],
				"cr10s"		=>	$_REQUEST["cr10s"];   //$_SESSION["cr10s"],
				"prusa"		=>	$_REQUEST["prusa"];   //$_SESSION["prusa"]
		);

		echo json_encode($printerArray);
?>
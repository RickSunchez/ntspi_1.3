<?php
	session_start();

	if ( isset($_SESSION["onAuth"]) ) {
		$mail = $_SESSION["onAuth"];
	} else {
		header("Location: auth.php");
	}
?>
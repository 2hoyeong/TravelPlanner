<?php
	include("_common.php");
	
	session_destroy();
	unset($_SESSION['id']);
	alert("", "../index.php");
?>
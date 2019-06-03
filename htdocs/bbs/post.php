<?php
	include("_common.php");
	
	//if(!isset($_SESSION['id'])) exit();
	
	if(!isset($_GET['id'])) die();
	
	$postid = $_GET['id'];
	
	include(ROOTDIR."/header.php");
	
	include(ROOTDIR."/page/post_content.php");
	
	include(ROOTDIR."/footer.php");


?>
<?php
	include("_common.php");
	
	if(!isset($_SESSION['id'])) alert("로그인이 필요한 서비스입니다.", "login.php");
	
	if(!isset($_GET['id'])) die();
	
	$postid = $_GET['id'];
	
	include(ROOTDIR."/header.php");
	
	include(ROOTDIR."/page/post_content.php");
	
	include(ROOTDIR."/footer.php");


?>
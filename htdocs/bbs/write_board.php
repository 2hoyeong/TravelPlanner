<?php
	include("_common.php");
	
	if(!isset($_SESSION['id'])) alert("로그인이 필요한 서비스입니다.", "login.php");
	
	include(ROOTDIR."/header.php");
	
	include(ROOTDIR."/page/write_community_board.php");
	
	include(ROOTDIR."/footer.php");
?>
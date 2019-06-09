<?php

	include("_common.php");
	
	include(ROOTDIR."/header.php");
	
	if(!isset($_SESSION['id'])) alert("로그인이 필요한 서비스입니다.", "login.php");
	
	$board_title = isset($_GET['board_title']) ? $_GET['board_title'] : "freeboard";
	$board_code = 0;
	switch($board_title) {
		case "freeboard":
			$board_title = "자유게시판";
			$board_code = 1;
			break;
		case "qna":
			$board_title = "Q&A";
			$board_code = 2;
			break;
		default:
			die("");
	}
	
	include(ROOTDIR."/page/community_board.php");
	
	
	include(ROOTDIR."/footer.php");
?>
<?php
	include("_common.php");

	if(!isset($_SESSION['id'])) alert("로그인이 필요한 서비스입니다.", "login.php");
	
	$bc = $_POST['bc'];
	$title = $_POST['bTitle'];
	$content = $_POST['bContent'];
	
	if(strlen($title) < 1) {
		alert("제목이 입력되지 않았습니다.");
		echo "<script>history.back();</script>";
		exit();
	}
	
	
	$title = mysqli_real_escape_string($db_conn, $title);
	$content = mysqli_real_escape_string($db_conn, $content);
	
	$sql = "INSERT INTO `post`(`BoardID`, `title`, `id`, `content`, `date`) values('{$bc}', '{$title}', '{$_SESSION['id']}', '{$content}', CURRENT_TIMESTAMP);";
	
	$title = $bc == 1 ? "freeboard" : "qna";
	
	if(sqlInsert($sql)) {
		alert("게시글이 작성되었습니다.", "community.php?board_title=".$title);
		
	} else {
		alert("게시글 작성에 에러가 발생했습니다.", "community.php?board_title=".$title);
	}
	
?>
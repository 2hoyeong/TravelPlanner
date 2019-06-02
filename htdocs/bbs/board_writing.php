<?php
	include("_common.php");
	
	$tag = $_POST['tag'];
	$title = $_POST['bTitle'];
	$content = $_POST['bContent'];
	
	
	$tag = addslashes($tag);
	$title = addslashes($title);
	$content = addslashes($content);
	
	$sql = "INSERT INTO `post`(`BoardID`, `title`, `id`, `content`, `date`) values('1', '{$title}', 'dusxo123s', '{$content}', CURRENT_TIMESTAMP);";
	
	if(sqlInsert($sql)) {
		alert("게시글이 작성되었습니다.");
		
	} else {
		alert("게시글 작성에 에러가 발생했습니다.");
	}
	
?>
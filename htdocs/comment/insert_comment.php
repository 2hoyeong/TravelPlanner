<?php
include("../common.php");

if(!isset($_SESSION['id'])) alert("로그인이 필요한 서비스입니다.", "login.php");

$error = "";
$comment  = $_POST['comment'];
$temp = addslashes($comment);
$comment_len = strlen($temp);
$pi = $_POST['PostID'];
$id = $_SESSION['id'];

function insert_Comment($comment)
{
	global $pi;
	global $id;
	$query = "insert into comment(`PostID`, `content`, `id`, `date`) values({$pi}, '$comment','{$id}',CURRENT_TIMESTAMP);";
	$result = sqlInsert($query);
	alert("", BBSPATH."/post.php?id=".$pi );
}

if($comment_len > 45 ) $error.="댓글의 길이가 너무 깁니다.";
if($error != "")
{
	alert($error, BBSPATH."/post.php?id=".$pi);
} else insert_Comment($comment);
?>

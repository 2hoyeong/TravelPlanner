<!DOCTYPE HTML>
<html>
<head>
<title>지구 한바퀴 - Travel Planner</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
window.onload = function () {
	if(getCookie("plan") == null) {
		setCookie("plan", 0, 3);
	}
}
</script>
<body>
<link rel="stylesheet" type="text/css" href="/css/reset.css?v=<?=time();?>">
<link rel="stylesheet" type="text/css" href="/css/default.css?v=<?=time();?>">
<link rel="stylesheet" type="text/css" href="/css/main.css?v=<?=time();?>">
<script type="text/javascript" src="/js/common.js"></script>

<div id="header">
	<div class="wrap">
			<a href="/"><img src="/img/logo.png" class="logo fl" alt="여행의 시작! 어스토리"></a>
								<ul class="gnb fl">
			<a href="/bbs/country_list.php" class="fl"><li>여행지</li></a>
			<a href="/bbs/planning.php" class="fl"><li>일정만들기</li></a>			
			<a href="/bbs/community.php" class="fl"><li>커뮤니티</li></a>			
			<a href="https://www.trivago.co.kr/" class="fl" target="_blank"><li>숙소</li></a>
			<!-- <a href="/ko/intro" class="fl"><li>이용방법</li></a>	 -->
		</ul>

		<div class="fr gnb_box">
			<?php 
				if(!isset($_SESSION['id'])) { ?>
			<a href="/bbs/register.php" class="fr"><div class="fl gnb_join_btn">회원가입</div></a>
			<a href="/bbs/login.php" class="fr"><div class="fl gnb_login_btn">로그인</div></a>
			<?php 
				} else {
			?>
			<a href="/bbs/logout.php" class="fr"><div class="fl gnb_login_btn">로그아웃</div></a>
			<?php }
			?>

		</div>
		<div class="clear"></div>
		</div>

	</div>
<div id="body">
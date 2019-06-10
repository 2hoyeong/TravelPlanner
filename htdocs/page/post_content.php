<?php
	$post = getPostById($postid);
?>
<style>
.viewArea{z-index:2;position:relative;margin-top:25px;}
.viewArea .viewBtn{margin:0 0 10px;}
.viewArea .viewBtn:after{content:'';display:block;clear:both;}
.viewArea .viewBtn .btn{height:30px;font:500 13px/30px "Noto Sans KR";padding:0 20px;margin-left:2px;}
.viewArea .viewBtn .btn:first-child{margin-left:0;}
.viewArea .viewBtn .leftArea{float:left;display:inline-block;text-align:left;}
.viewArea .viewBtn .rightArea{float:right;display:inline-block;text-align:right;}
.viewArea .viewBtn .goQuestion{width:138px;text-align:center;padding:0;}
.viewArea .viewHead{position:relative;min-height:46px;padding:20px;padding-bottom:15px;border:1px solid #ddd;border-bottom:none;}
.viewArea .viewHead .profileImg{float:left;display:inline-block;width:46px;height:46px;border-radius:46px;margin-right:20px;overflow:hidden;}
.viewArea .viewHead .profileImg img{width:46px;}
.viewArea .viewHead .titleArea{display:inline-block;width:600px;vertical-align:middle;}
.viewArea .viewHead .titleArea .category{position:relative;top:2px;display:inline;font-weight:normal;font-size:16px;line-height:16px;color:#232323;vertical-align:middle;padding-left:0;margin-top:0;}
.viewArea .viewHead .titleArea .title{display:inline;height:auto;min-height:16px;font-weight:normal;font-size:16px;line-height:19px;color:#232323;vertical-align:middle;margin:0 0 10px;}
.viewArea .viewHead .titleArea a,
.viewArea .viewHead .titleArea span{float:left;display:inline-block;height:19px;color:#777;font-size:12px;line-height:17px;vertical-align:middle;padding-left:7px;margin-top:10px;margin-right:7px;}
.viewArea .viewHead .titleArea span i{font-style:normal;}
.viewArea .viewHead .titleArea a{line-height:15px;}
.viewArea .viewHead .titleArea a:hover{text-decoration:underline;}
.viewArea .viewHead .titleArea .user{clear:both;color:#232323;background:none;padding:0;margin-top:10px;}
.viewArea .viewHead .titleArea .user:hover{text-decoration:underline;cursor:pointer;}
.viewArea .viewHead .titleArea .date,
.viewArea .viewHead .titleArea .count,
.viewArea .viewHead .titleArea .report{background:url('//img.tourtips.com/images/cm/bg_line_viewHead.gif') 0 3px no-repeat;}
.viewArea .viewHead .titleRight{position:absolute;top:49px;right:19px;text-align:right;}
.viewArea .viewHead .titleRight p{font:500 13px/13px "Noto Sans KR";color:#232323;}
.viewArea .viewHead .titleRight p em{color:#ff4f02;margin-left:3px;}
.viewArea .viewBody{position:relative;padding:30px;border:1px solid #ddd;border-top:1px solid #e3e3e3; min-height:400px;}
.viewArea .viewBody iframe{max-width:100%;}
.viewArea .viewBody .attachList{width:100%;text-align:right;margin:-10px 0 19px 0;border:none;}
.viewArea .viewBody .attachList ul{display:block;margin:0;}
.viewArea .viewBody .attachList ul:after{content:'';display:block;clear:both;}
.viewArea .viewBody .attachList li{display:block;text-align:right;}
.viewArea .viewBody .attachList ul{display:block;}
.viewArea .viewBody .attachList li{display:block;clear:both;vertical-align:middle;margin-bottom:9px;}
.viewArea .viewBody .attachList li:first-child{margin-top:0;}
.viewArea .viewBody .attachList li a{display:inline-block;font-size:13px;color:#232323;text-decoration:underline;vertical-align:middle;margin-right:6px;}
.viewArea .viewBody .attachList li a .ico{display:inline-block;width:7px;height:11px;margin-right:6px;vertical-align:top;background:url('//img.tourtips.com/images/cm/ico/spr_community.png') -41px -35px no-repeat;}
.viewArea .viewBody .attachList li span{display:inline-block;color:#999;font-size:12px;vertical-align:middle;margin-right:0;}
.viewArea .viewBody .viewCnts{font-size:15px;line-height:24px;color:#232323;clear:both;min-height:114px;overflow:hidden;}
.viewArea .viewBody .viewCnts div,
.viewArea .viewBody .viewCnts p{max-width:100% !important;}
.viewArea .viewBody .viewCnts img{position:relative !important;max-width:100% !important;height:auto !important;}
.viewArea .viewBody .viewCnts table{table-layout:fixed;max-width:100%;}
.viewArea .viewBody .viewCnts table th,
.viewArea .viewBody .viewCnts table td{max-width:100% !important;}

.viewArea .viewFoot{margin-top:20px;}
.viewArea .viewFoot .viewSns{text-align:center;padding:30px 0;margin:-20px 0 20px 0;border:1px solid #e3e3e3;border-width:0 1px 1px 1px;}
.viewArea .viewFoot .viewSns p{display:block;font-size:14px;color:#777;margin:0 0 15px;}
.viewArea .viewFoot .viewBtn{margin:0 0 40px;}
</style>

<div class="post_container">
	<div class="post_inner">
		<div class="viewArea" id="viewPrint">


	<!-- viewHead -->
	<div class="viewHead" id="viewHead">
		<div class="titleArea">		
			<strong class="title"><?=$post['title']?></strong>
			<div>
				<span class="user load_user_info_a"><i class="icoEditor editor_c"><?=$post['id']?></i></span>
				<span class="date"><?=$post['date']?></span>
			</div>
		</div>
	</div>
	<!-- //viewHead -->

	<!-- viewBody -->
	<div class="viewBody" id="viewBody">
		<!-- attachList -->
		
				<!-- //attachList -->
				<!-- viewCnts -->
		<div class="viewCnts">
			<pre><?=$post['content']?></pre>
		</div>
		<!-- //viewCnts -->

	</div>
	<!-- //viewBody -->

	<!-- viewFoot -->
	<div class="viewFoot">
				<!-- viewSns -->
		<div class="viewSns">
			<div class="likeArea">
				<ul>
				<li class="good ">
					<!-- <button type="button" title="좋아요" id="like"></button> -->
					<span>좋아요 <i class="likeCnt"> 0</i></span>
				</li>
				</ul>
			</div>
		</div>
		<!-- //viewSns -->
				<!-- replyArea -->
		<div class="replyArea" id="replyArea"><!-- replyStatus -->
		<!--
<div class="replyStatus">
	<p>댓글 <i id="commentCnt" data-value="0">0</i></p>
	<span class="vBlank"></span>
</div>-->
<!-- //replyStatus -->

<!-- replyList -->	
<?php
	include(ROOTDIR."/comment/reply.php");
?>
<!-- //replyList -->
<!-- //replyList -->
</div>
		<!-- //replyArea -->
		<!-- viewBtn -->
		<div class="viewBtn">
				<a href="javascript:history.back();"><div class="fr write_btn skyblue">목록</a>
			</div>
		</div>
		<!-- //viewBtn -->
			</div>
	<!-- //viewFoot -->

		</div>
	</div>
</div>
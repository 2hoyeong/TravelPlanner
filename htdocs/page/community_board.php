<?php

$view = 15; // 1페이지에 보여질 갯수
$block = 5; // 페이지 수 보일 갯수

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$sql = 'SELECT * FROM `post` where BoardID = 1';

$num = sqlSelect($sql)->num_rows;

$pageNum = ceil($num/$view); // 총 페이지
$blockNum = ceil($pageNum/$block); // 총 블록
$nowBlock = ceil($page/$block);

$s_page = ($nowBlock * $block) - $block + 1;
if ($s_page <= 1) {
	$s_page = 1;
}

$e_page = $nowBlock*$block;
if ($pageNum <= $e_page) {
	$e_page = $pageNum;
}
?>
<div class="community_container">
	<div class="community_sidemenu fl">
		<ul>
			<div class="orange">커뮤니티</div>
			<a href="javascript:addOrUpdateUrlParam(window.location.href, 'board_title', 'freeboard');"><li>자유게시판</li></a>
			<a href="javascript:addOrUpdateUrlParam(window.location.href, 'board_title', 'qna');"><li>Q&amp;A</li></a>
		</ul>
	</div>
	<div class="community_table_wrap">
		<div class="board_title">
			<?php echo $board_title;?>
		</div>
		<table class="community_table">
			<thead>
				<tr>
					<th style="width : 10%;">번호</th>
					<th style="width : 50%;">제목</th>
					<th>작성자</th>
					<th>작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$s_point = ($page-1) * $view;
					$real_data = sqlSelect('SELECT * FROM `post` where boardID = '.$board_code.' ORDER BY `PostID` DESC LIMIT '.$s_point.','.$view);
					for ($i=1; $i<=$num; $i++) {
						if(!$real_data) break;
						
						$fetch = $real_data->fetch_assoc();
						if ($fetch == false) {
							break;
						}
				?>
				
				<tr>
					<td><?=$fetch['PostID']?></td>
					<td><a href="<?=BBSPATH?>/post.php?id=<?=$fetch['PostID']?>"/><?=$fetch['title']?></a></td>
					<td><?=$fetch['id']?></td>
					<td><?=$fetch['date']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="pagination-container">
       <div class="pagination-inner">
           <ul class="pagination">
				<li><a href="javascript:addOrUpdateUrlParam(window.location.href, 'page', <?=$s_page-1 <= 1 ? 1 : $s_page - 1?>);">&laquo;</a></li>
                <?php
                for ($p=$s_page; $p<=$e_page; $p++) {
                ?>
                   <li><a class="<?=($page == $p) ? 'active' : 'n' ?>" href="javascript:addOrUpdateUrlParam(window.location.href, 'page', <?=$p?>);"><?=$p?></a></li>
                <?php
                }
                ?>
				<li><a href="javascript:addOrUpdateUrlParam(window.location.href, 'page', <?=$e_page+1 >= $pageNum ? $pageNum : $e_page+1 ?>);">&raquo;</a></li>
           </ul>
       </div>
		<div class="btnWrap">
			<a href="/bbs/write_board.php?bc=<?=$board_code?>"><div class="write_btn gray fr">글쓰기</div></a>
		</div>
    </div>
</div>
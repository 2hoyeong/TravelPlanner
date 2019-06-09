<div class="community_write_container">
	<form action="<?=BBSPATH?>/board_writing.php" method="post" id="wForm">
		<table class="community_write_table">
			<input type="hidden" name="bc" value="<?=$_GET['bc']?>">
			<thead>
				<tr>
					<th>제목&nbsp;:&nbsp;<input type="text" name="bTitle" style="width : 95%;"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><textarea name="bContent" id="bContent" class="bContent" rows="30"></textarea></td>
				</tr>
			</tbody>
		</table>
		<div class="btnWrap">
			<a href="javascript:void(0)" onclick="history.back();"><div class="write_btn gray fr">취소</div></a>
			<a href="javascript:document.getElementById('wForm').submit();"><div class="write_btn skyblue fr">글쓰기</div></a>
		</div>
	</form>
</div>
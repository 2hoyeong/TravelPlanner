<?php
	include("_common.php");
	
	include(ROOTDIR."/header.php");
	
	$cityid = $_GET['ec'];
	$city = getCityById($cityid);
	
?>

<style>
	.c_list { font-size : 14px; }
	.c_list li { margin-top : 10px; }
	.c_list li img { max-width : 200px; max-height : 200px; }
</style>

<div>
<div class="board_title">
	<?=$city['CityName']?> 도시 정보 설정 페이지
</div>
<form enctype='multipart/form-data' action='<?=BBSPATH?>/edit_info.php?category=city' method='post'>
	<input type="hidden" name="editid" value='<?=$city['CityID']?>'>
	<input type="text" name="explain" placeholder="도시 설명을 입력하세요">
	<br>
	<input type="file" name="myfile">
	<input type="submit" value="저장하기">
	<hr>
	<span style="font-size:14px;">■ 해당 도시에 등록된 설명</span>
	<ul id="explain" class="c_list">
		<li>설명 : <?php echo isset($city['Explain']) ? $city['Explain'] : "저장된 설명이 없습니다.";?> </li>
		<li>이미지<br><br>
			<?php
			
				$images = getCityImageURLs($cityid);
				if($images) {
					foreach($images as $key => $value) {
						echo "<img src='{$value}'>";
					}
				}
			?>
		</li>
	</ul>
</form>
</div>

<?php
	include(ROOTDIR."/footer.php");
?>
<?php
	include("_common.php");
	
	include(ROOTDIR."/header.php");
?>

<script>
function changedCountry(obj) {
	var c_ID = obj.value;
	<?php echo "var c_list = ".json_encode(getAttractionList()).";"?>
	var city = document.getElementById('city');
	var cec = city.childElementCount;

	for (var i = 0; i < cec; i++) {
		city.removeChild(city.children[0]);
	}

	for (key in c_list) {
		if(c_list[key].split(",")[0] == c_ID) {
			var ul = document.createElement("li");
			var node = document.createTextNode("["+ key + "] " + c_list[key].split(",")[1]);
			ul.appendChild(node);
			city.appendChild(ul);
		}
	}
	
}
</script>

<style>
	.c_list { font-size : 14px; }
	.c_list li { margin-top : 10px; }
</style>

<div>
<div class="board_title">
	명소 등록 페이지
</div>
<form enctype='multipart/form-data' action='<?=BBSPATH?>/upload.php?category=attraction' method='post'>
	<select name="fkid" id="fkid" onchange="changedCountry(this);">
		<option value="">도시 선택</option>
		<?php
			$continents = getCityList();
			foreach($continents as $key => $value) { 
				$value = explode(',', $value)[1];
				echo "<option value='{$key}'>{$value}</option>";
			}
		?>
	</select>
	<input type="text" name="name" placeholder="명소 이름을 입력하세요">
	<input type="submit" value="명소 등록">
	<hr>
	<span style="font-size:14px;">■ 해당 도시에 등록된 명소 리스트</span>
	<ul id="city" class="c_list">
	
	</ul>
	
	
	<!-- 
	<input type="file" name="myfile">
	<button>명소 이미지 등록</button>
	-->
</form>
</div>

<?php
	include(ROOTDIR."/footer.php");
?>
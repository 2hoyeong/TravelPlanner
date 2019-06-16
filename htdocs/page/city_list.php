<?php

$countryid= $_GET['country'];
$cities = getCityList();
$countryname = sqlSelect("SELECT `CountryName` from `place_country` where `CountryID` = {$countryid};")->fetch_assoc()['CountryName'];

?>
<style>
.area_bg{
	width:100%;
	background:white;
	padding-top:40px;
	padding-bottom:40px;
}

.area_title{
	margin-top:13px;
	font-size:24px;
	color:#363636;
}

.area_title_center{
	width:100%;
	text-align:center;
	font-size:30px;
	color:#363636;
	margin-bottom:20px;
	background : #f8f8fa;
	padding : 15px 0;
}

.city_box{
	width:348px;
	height:242px;
	position:relative;
	display:block;
	border:1px solid #dfdfdf;
	overflow:hidden;
	float:left;
	margin-right:13px;
	margin-bottom:13px;
}

.city_box:nth-child(3), .city_box:nth-child(6){
	margin-right:0px;
}

.city_title{
	width:100%;
	font-size:40px;
	color:white;
	text-shadow:0px 0px 10px black;
	text-align:center;
	position:absolute;
	left:0px;
	top:111px;
	z-index:2;
}

</style>

<div class="city_list_container">
<div class="area_bg top silver">
	<div class="wrap">
		<div class="area_title">
			<b><?=$countryname?></b>
		</div>
	</div>
</div>
<div class="area_title_center">
	인기도시
</div>
<div class="city_list">
<?php
foreach($cities  as $key => $value) {
	$name = explode(",", $value);
	if($countryid == $name[0]) {
		$img = getCityImageURLs($key);
		?>
		<div style="display : inline-block;">
		<a href="<?=BBSPATH?>/city.php?city=<?=$key?>" class="city_box" style="color : white;">
		<div class="city_title">
		<?php
			echo $name[1];
		?>
		</div>
		<?php
			if($img)
				echo "<img src='{$img[0]}' style='width : 100%; height : 100%;'>";
			else
				echo "<div style=' width : 100%; height : 100%; background : #363c48;'></div>";
		?>
		</a>
		</div>
		<?php
	}
}
?>
</div>
</div>
<?php

$cityid = $_GET['city'];
$attractions = getAttractionList();
$city = sqlSelect("SELECT `CityName`, `Explain` from `place_city` where `CityID` = {$cityid};")->fetch_assoc();
$img = getCityImageURLs($cityid);

?>

<style>
.area_bg{
	width:100%;
	background:white;
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

.inner_box{
	width:100%;
	margin-top:25px;
	margin-bottom:40px;
}

.country_info{
	width:100%;
	border-bottom:1px solid #dfdfdf;
	padding:15px 15px 8px 15px;
	min-height : 170px;
}

.country_title{
	float:left;
	height:20px;
	line-height:20px;
	margin-right:6px;
	font-size:14px;
	color:#555555;
}

.country_desc{
	font-size:12px;
	color:#808080;
	text-align:justify;
	line-height:22px;
	margin-top:12px;
}

.img_box{
	float:left;
	width:628px;
	height:369px;
	background:white;
	border:1px solid #dfdfdf;
	position:relative;
}

.img_right{
	float:right;
	width:448px;
	height:368px;
	background:white;
	border:1px solid #dfdfdf;
}

.pospot_content{
	width:100%;
	margin-bottom:15px;
}

.pospot{
	width:261px;
	height:259px;
	border:1px solid #dfdfdf;
	float:left;
	margin-right:16px;
	margin-bottom:16px;
	display:block;
	cursor:pointer;
	position:relative;
}

.po_img_box{
	width:100%;
	height:182px;
	overflow:hidden;
}

.po_img{
	width:100%;
	height:100%;
	transition: all 3.6s;
	-webkit-transition: all 3.6s;
}

.po_name{
	color:#555555;
	font-size:14px;
	padding:10px;
	width:100%;
	font-family:'nanum_b';
}

.po_bottom{
	position:absolute;
	left:0px;
	bottom:0px;
	padding:0px 10px 10px 10px;
	width:100%;
}

</style>

<div class="city_list_container">
<div class="area_bg top silver">
	<div class="wrap">
		<div class="area_title">
			<b><?=$city['CityName']?></b>
		</div>
	</div>
</div>
<div class="inner_box">

			<div class="img_box">
				<img src="<?=$img[0]?>" class="img_box">
			</div>

			<div class="img_right">
				<div class="country_info_box">
					<div class="country_info">
						<div class="country_title"><?=$city['CityName']?></div>
						<div class="clear"></div>
						<div class="country_desc"><?=$city['Explain']?></div>
					</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="area_title_center">
	<?=$city['CityName']?> 인기명소
</div>
<div class="pospot_content">
<?php
	foreach($attractions  as $key => $value) {
		$name = explode(",", $value);
		if($cityid == $name[0]) {
			$imgs = getAttractionImageURLs($key);
			?>
			<div style="display : inline-block;">
			<div class="pospot" style="color : white;">
			<a href="javascript:addPlan(1, <?=$key?>);" class="attraction_btn skyblue">일정에 추가</a>
			<div class="po_img_box">
			<?php
				if($imgs)
					echo "<img src='{$imgs[0]}' style='width : 100%; height : 100%;'>";
				else
					echo "<div style=' width : 100%; height : 100%; background : #363c48;'></div>";
			?>
			</div>
			<div class="po_name">
			<?php
				echo $name[1] ."<br><br>". getAttractionById($key)['Explain'];
			?>
			</div>
			
			</div>
			</div>
			<?php
		}
	}
?>
</div>
</div>
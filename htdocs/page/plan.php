
<?php

?>
<style>
.plan_mnu_box{
	width:100%;
	height:70px;
	border-left:1px solid #c8c8ca;
	border-right:1px solid #c8c8ca;
	border-bottom:1px solid #c8c8ca;
	background:white;
	padding-right:20px;
	cursor:pointer;
}

.plan_mnu{
	display:block;
	height:70px;
	line-height:70px;
	padding-left:35px;
	padding-right:35px;
	font-size:18px;
	color:#49b2e9;
	float:left;
}
.pdfexcel_box{
	display:inline-block;
	background:#ededed;
	height:40px;
	line-height:40px;
	padding-left:23px;
	padding-right:23px;
	float:right;
	margin-left:10px;
	margin-top:14px;
}

.page{
	margin-top:30px;
	padding-bottom:60px;
	display:none;
}

.page.show{
	display:block;
}

.page_left{
	float:left;
	width:744px;
	min-height:500px;
	padding-right:25px;
}

.day_box{
	width:100%;
	padding-top:30px;
}

.day_txt{
	float:left;
	background:#203341;
	height:60px;
	line-height:60px;
	color:white;
	font-weight:bold;
	font-size:22px;
	width:110px;
	text-align:center;
}

.day_info_box{
	width:100%;
	height:60px;
}

.day_info{
	float:left;
	width:609px;
	background:white;
	border-top:1px solid #e5e5e5;
	border-right:1px solid #e5e5e5;
	height:60px;
}

.day_info_left{
	float:left;
	width:430px;
	padding-left:10px;
}

.date{
	font-size:12px;
	color:#b3b3b3;
	font-weight:bold;
	padding-top:13px;
}

.day_title{
	color:#363636;
	font-weight:bold;
	font-size:18px;
	padding-top:5px;
}

.day_sch_box{
	width:100%;
	border:1px solid #e5e5e5;
	background:white;
	min-height:100px;
}

.day_sch_num{
	height:100%;
	text-align:center;
	float:left;
	width:110px;
}

.sch_content{
	width:604px;
	float:left;
	padding-top:15px;
}

.sch_num{
	width:30px;
	height:30px;
	border-radius:50%;
	color:white;
	background:#223b68;
	margin:0 auto;
	font-size:18px;
	font-weight:bold;
	line-height:32px;
	text-align:center;
	margin-top:35px;
}

.spot_img{
	float:left;
	width:70px;
	height:70px;
}

.spot_content_box{
	width:425px;
	float:left;
	padding-left:10px;
}

.spot_name{
	font-size:17px;
	color:#555555;
	font-weight:bold;
}

.spot_btn_box{
	width:109px;
	float:left;
	height:100%;
	padding-right:15px;
	margin-top:20px;
}

.page_right{
	float:left;
	width:348px;
	position:relative;
}
</style>

<!--<script type="text/javascript" src="/js/place.js"></script>-->

<script>
<?php echo "var c_list = ".json_encode(getCityList()).";"?>
<?php echo "var a_list = ".json_encode(getAttractionList()).";"?>

window.onload = function() {

	var cookie = getCookieSplited("plan");

	var getDate = function() {
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		today = yyyy + '년 ' + mm + '월 ' + dd + '일';
		return today;
	}
	var incHeight = function() {
		var el = document.getElementById("sizeup");
		var height = el.offsetHeight;
		var newHeight = height + 102;
		el.style.height = newHeight + 'px';
	}

	var writeDay = function(dat, city) {
		if(document.getElementById("ss").innerHTML != null)
			document.getElementById("ss").innerHTML += '</div><div class="day_box" data-id="1"><div id="days"></div><div class="day_info_box"><div class="day_txt">DAY'+dat+'</div> <div class="day_info"><div class="day_info_left"><div class="date">'+getDate()+'</div><div class="day_title">'+city+'</div>	</div>	</div></div>';
		else	
			document.getElementById("ss").innerHTML = '<div class="day_box" data-id="1"><div id="days"></div><div class="day_info_box"><div class="day_txt">DAY'+dat+'</div> <div class="day_info"><div class="day_info_left"><div class="date">'+getDate()+'</div><div class="day_title">'+city+'</div>	</div>	</div></div>';
		incHeight();
	}

	var writeAttraction = function(att) {
		if(document.getElementById("ss").innerHTML != null)
			document.getElementById("ss").innerHTML +=	'<div class="day_sch_box" data-id="1-1" style="height: 102px;"><div class="day_sch_num"> <div class="sch_num">1</div></div><div class="sch_content" style=" height: 85px;"><img src="https://irs1.4sqi.net/img/general/width640/42166642_OJp861ij59Z-mbB8mUuKll8MG3pnNrQc4koNlygrgw8.jpg" class="spot_img"><div class="spot_content_box"><div class="spot_name">'+att+'</div></div><div class="spot_btn_box"><img src="./img/x-ico.png" alt="" class="spot_btn map_view" onclick="set_center(27.67131303,85.42925797)"><img src="./img/i-ico.png" alt="" class="spot_btn spot_info_btn"><div class="clear"></div></div><div class="clear"></div></div><div class="clear"></div><div class="clear"></div></div>';
		else
			document.getElementById("ss").innerHTML =	'<div class="day_sch_box" data-id="1-1" style="height: 102px;"><div class="day_sch_num"> <div class="sch_num">1</div></div><div class="sch_content" style=" height: 85px;"><img src="https://irs1.4sqi.net/img/general/width640/42166642_OJp861ij59Z-mbB8mUuKll8MG3pnNrQc4koNlygrgw8.jpg" class="spot_img"><div class="spot_content_box"><div class="spot_name">'+att+'</div></div><div class="spot_btn_box"><img src="./img/x-ico.png" alt="" class="spot_btn map_view" onclick="set_center(27.67131303,85.42925797)"><img src="./img/i-ico.png" alt="" class="spot_btn spot_info_btn"><div class="clear"></div></div><div class="clear"></div></div><div class="clear"></div><div class="clear"></div></div>';

		incHeight();
	}
	var sday = -99;
	var dat = 1;
	for(var i = 0; i < cookie.length; i++) {
		var c_json = JSON.parse(cookie[i]);
		var type = c_json[0];
		var id = c_json[1];
		if (type == 0) { // City
			for (key in c_list) {
				if(key == id) {
					document.write(c_list[key].split(",")[1] + "<br>");
					//wirteDay(
				}
			}
		} else if (type == 1) { // Attraction
			for (key in a_list) {
				if(key == id) {
					if(sday == -99 || sday != a_list[key].split(",")[0]) {
						sday = a_list[key].split(",")[0];
						writeDay(dat++ , c_list[a_list[key].split(",")[0]].split(",")[1]);
					}
					writeAttraction(a_list[key].split(",")[1]);
				}
			}
		} else if (type == -1) { // date
			document.write(id);
		}
	}
}
</script>

<div id="sizeup">
	<div class="plan_mnu_box" style="">
		<div class="plan_mnu" data-id="1">
			일정		</div>
		<div class="pdfexcel_box">
			<div class="pe_txt">
				다운로드			</div>

			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="wrap page show" data-id="1" style="">
		<div class="page_left" id="ss">
	<!-- <div id="days"></div><!--<div class="day_box" data-id="1"></div>-->
	<!--<div id="sch">
		<!--
		<div class="day_sch_box" data-id="1-1" style="height: 102px;">
		<div class="day_sch_num">
			<div class="sch_num">1</div></div><div class="sch_content" style=" height: 85px;">
				<img src="https://irs1.4sqi.net/img/general/width640/42166642_OJp861ij59Z-mbB8mUuKll8MG3pnNrQc4koNlygrgw8.jpg" class="spot_img">
				<div class="spot_content_box">
					<div class="spot_name">Taumadi (Nyatapola) Square</div></div>
					<div class="spot_btn_box"><img src="./img/x-ico.png" alt="" class="spot_btn map_view" onclick="set_center(27.67131303,85.42925797)"><img src="./img/i-ico.png" alt="" class="spot_btn spot_info_btn" onclick="window.open('/ko/city/bhaktapur_10635/attraction/taumadi-nyatapola-square_826633');">
						<div class="clear"></div></div>
						<div class="clear"></div></div>
						<div class="clear"></div>
							<div class="clear"></div></div> </div>-->
		
</div>
<div class="page_right">
	<div class="clear"></div>
</div>
</div>
</div>
</div>
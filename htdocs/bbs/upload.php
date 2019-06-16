<?php

include("_common.php");


$category = $_GET['category'];
$uploads_dir = ROOTDIR.'/img/area';
$fkid = $_POST['fkid'];
$name = $_POST['name'];

echo $category;

if($category == "country")
	$sql = "insert into `place_{$category}` values(0, '{$fkid}', '{$name}');";
else
	$sql = "insert into `place_{$category}` values(0, '{$fkid}', '{$name}', '');";

if(!sqlInsert($sql)) {
	alert("등록에 실패했습니다.", "area_regist.php");
	exit();
}

$insertedid = mysqli_insert_id($db_conn);

if ($category == "city") {
	$continentid = getContinentId($fkid);
	
	$uploads_dir .= "/{$continentid}";
} else if ($category == "attraction") {
	$countryid = getCountryId($fkid);
	$continentid = getContinentId($countryid);
	
	$uploads_dir .= "/{$continentid}/{$countryid}";
}

$uploads_dir .= "/{$fkid}/{$insertedid}";

if ( !is_dir($uploads_dir) ) {
	if ( !mkdir($uploads_dir, 0777, true) ) {
		alert("경로 생성에 실패했습니다.", "{$category}_regist.php");
		exit();	
	}
}

alert("등록이 완료되었습니다.", "{$category}_regist.php");
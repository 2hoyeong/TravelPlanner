<?php
session_start();

include_once("db_config.php");

define("ROOTPATH", getURL()['url']);
define("ROOTDIR", __DIR__);
define("BBSPATH", ROOTPATH."/bbs");

$test = "testsetsteest";

function getURL()
{
    $result['path'] = str_replace('\\', '/', dirname(__FILE__));
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', $_SERVER['SCRIPT_NAME']);
    $document_root = str_replace($tilde_remove, '', $_SERVER['SCRIPT_FILENAME']);
    $root = str_replace($document_root, '', $result['path']);
    $port = $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';
    $user = str_replace(str_replace($document_root, '', $_SERVER['SCRIPT_FILENAME']), '', $_SERVER['SCRIPT_NAME']);
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    if(isset($_SERVER['HTTP_HOST']) && preg_match('/:[0-9]+$/', $host))
        $host = preg_replace('/:[0-9]+$/', '', $host);
    $host = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*]/", '', $host);
    $result['url'] = $http.$host.$port.$user.$root;
    return $result;
}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function sqlInsert($sql)
{
	global $db_conn;
	if (startsWith(strtolower($sql), "insert")) {
		$result = $db_conn->query($sql);
		if ($result) return true;
		else echo $db_conn->error;
	}
	return false;
}

function sqlSelect($sql)
{
	global $db_conn;
	$post = array();
	if (startsWith(strtolower($sql), "select")) {
		$result = $db_conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
	}
	return false;
}

function alert($msg='', $url='') 
{
	echo "<script>";
	if($msg) {
		echo "alert('{$msg}');";
	}
	if ($url) {
		echo "window.location.replace('{$url}');";
	}
	
	echo "</script>";
}

function getPostById($id) 
{
	$sql = "SELECT * FROM `post` WHERE `PostID` = {$id}";
	$post = sqlSelect($sql);
	if($post) {
		return $post->fetch_assoc();
	} else {
		return false;
	}
}

function getContinentList()
{
	global $db_conn;
	$list = array();
	$sql = "select * from `place_continent`";
	$sqlresult = sqlSelect($sql);
	if($sqlresult) {
		while(($row = $sqlresult->fetch_assoc())) {
			$list[$row['ContinentID']] = $row['ContinentName'];
		}
	}
	return $list;
}

function getCountryList()
{
	global $db_conn;
	$list = array();
	$sql = "select * from `place_country`";
	$sqlresult = sqlSelect($sql);
	if($sqlresult) {
		while(($row = $sqlresult->fetch_assoc())) {
			$list[$row['CountryID']] = $row['ContinentID'].",".$row['CountryName'];
		}
	}
	return $list;
}

function getCityList()
{
	global $db_conn;
	$list = array();
	$sql = "select * from `place_city`";
	$sqlresult = sqlSelect($sql);
	if($sqlresult) {
		while(($row = $sqlresult->fetch_assoc())) {
			$list[$row['CityID']] = $row['CountryID'].",".$row['CityName'];
		}
	}
	return $list;
}

function getCityId($attractionid) {
	$cityid = sqlSelect("Select `CityID` from `place_attraction` where `AttractionID` = {$attractionid}");
	$cityid = $cityid->fetch_assoc()['CityID'];
	
	return $cityid;
}

function getCountryId($cityid) {
	$countryid = sqlSelect("Select `CountryID` from `place_city` where `CityID` = {$cityid};");
	$countryid = $countryid->fetch_assoc()['CountryID'];
	
	return $countryid;
}

function getContinentId($countryid) {
	$continentid = sqlSelect("Select `ContinentID` from `place_country` where `CountryID` = {$countryid};");
	$continentid = $continentid->fetch_assoc()['ContinentID'];
	
	return $continentid;
}

function getAttractionList()
{
	global $db_conn;
	$list = array();
	$sql = "select * from `place_attraction`";
	$sqlresult = sqlSelect($sql);
	if($sqlresult) {
		while(($row = $sqlresult->fetch_assoc())) {
			$list[$row['AttractionID']] = $row['CityID'].",".$row['AttractionName'];
		}
	}
	return $list;
}

function getCityById($cityid) {
	return sqlSelect("Select * from `place_city` where `cityid` = {$cityid}")->fetch_assoc();
}

function getAttractionById($attractionid) {
	return sqlSelect("Select * from `place_attraction` where `AttractionID` = {$attractionid}")->fetch_assoc();
}

function getCityImageURLs($cityid) {
	
	$result = array();
	
	$countryid = getCountryId($cityid);
	$continentid = getContinentId($countryid);
	
	$url = ROOTDIR."/img/area/{$continentid}/{$countryid}/{$cityid}/";
	$rurl = ROOTPATH."/img/area/{$continentid}/{$countryid}/{$cityid}/";
	
	if (!is_dir($url))
		return false;

	
	foreach(glob($url . '*.jpg') as $filename) {
		array_push($result, $rurl.basename($filename));
	}
	
	return $result;
}

function getAttractionImageURLs($attractionid) {
	
	$result = array();
	
	$cityid = getCityId($attractionid);
	$countryid = getCountryId($cityid);
	$continentid = getContinentId($countryid);
	
	$url = ROOTDIR."/img/area/{$continentid}/{$countryid}/{$cityid}/{$attractionid}/";
	$rurl = ROOTPATH."/img/area/{$continentid}/{$countryid}/{$cityid}/{$attractionid}/";
	
	if (!is_dir($url))
		return false;

	
	foreach(glob($url . '*.jpg') as $filename) {
		array_push($result, $rurl.basename($filename));
	}
	
	return $result;
}

?>
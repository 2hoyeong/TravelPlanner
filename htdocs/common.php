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

function alert($msg='', $url='') {
	echo "<script>";
	if($msg) {
		echo "alert('{$msg}');";
	}
	if ($url) {
		echo "window.location.replace('{$url}');";
	}
	
	echo "</script>";
}

?>
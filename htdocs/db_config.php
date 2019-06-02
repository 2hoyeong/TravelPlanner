<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "TravelPlanner";

$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db_conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}

$db_conn->query("set session character_set_connection = utf8;");
$db_conn->query("set session character_set_results = utf8;");
$db_conn->query("set session character_set_client = utf8;");


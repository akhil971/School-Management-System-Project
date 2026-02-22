<?php
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'localhost:8081' || $_SERVER['HTTP_HOST'] == 'localhost') {
	$conn = new mysqli("localhost", "root", "", "project_db");
} else {
	$conn = new MySQLi("localhost", "", "", "");
}
if ($conn->connect_errno) {
	echo "connection failed!!";
}
date_default_timezone_set('Asia/Kolkata');

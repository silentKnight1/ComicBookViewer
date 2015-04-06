<?php
/**
 * DB Configuration
 */
define('DB_HOST',			'localhost');
define('DB_USER',			'root');
define('DB_PASS',			'root');
define('DB_NAME',			'comic');
$limit = 15; #item per page
# db connect
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME) or die('Could not connect to MySQL DB ');
?>

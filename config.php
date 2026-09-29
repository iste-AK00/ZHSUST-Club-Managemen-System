<?php
$db_host = getenv('MYSQLHOST') ?: 'localhost';
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') !== false ? getenv('MYSQLPASSWORD') : '';
$db_name = getenv('MYSQLDATABASE') ?: 'club_ms';
$db_port = (int)(getenv('MYSQLPORT') ?: 3306);

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$con) {
    echo "Database Connection Error!";
}
?>

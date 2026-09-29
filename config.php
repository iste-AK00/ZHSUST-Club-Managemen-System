<?php
$db_name='railway';
$db_host=getenv('MYSQLHOST') ?: 'localhost';
$db_user=getenv('MYSQLUSER') ?: 'root';
$db_pass=getenv('MYSQLPASSWORD') ?: '';
$db_port=getenv('MYSQLPORT') ?: '3306';
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name,$db_port);
if(!$con){
echo "Database Connection Error!";
}
?>

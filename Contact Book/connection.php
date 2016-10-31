<?php

$host_name = "localhost";
$user_name = "sachizcont";
$pass_name = "qwerasd";
$db_name = "my_contact";

$link = mysql_connect($host_name,$user_name,$pass_name) or die("Error Connection".mysql_error());
$db = mysql_select_db($db_name,$link) or die("Error Database".mysql_error());

?>

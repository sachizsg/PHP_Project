<?php
error_reporting(E_ALL^E_NOTICE && E_ALL^E_WARNING);
session_start();
include('connection.php');

$user = mysql_real_escape_string(strip_tags(stripslashes($_POST['uname'])));
$passwd = mysql_real_escape_string(strip_tags(stripslashes($_POST['pass']))); 

$login = mysql_query("SELECT * FROM mcontacts WHERE (uname = '$user') AND (cpwd = '$passwd')");

if (mysql_num_rows($login) == 1) 
	{
      
        $_SESSION['uname'] = $_POST['uname'];
      
        header('Location: my_contact.php');
		$_SESSION['uname'] = $user;
	}
	else 
		   {
     		  header('Location: login.php');
		   }

?>

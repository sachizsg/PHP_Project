<?php
error_reporting(E_ALL^E_NOTICE && E_ALL^E_WARNING);
session_start();
if (isset($_SESSION['uname']))
	    {
			header('Location: my_contact.php');
	    }
	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:::Contact book:::</title>
<style type="text/css">
body
  {
	background-image:url(images/bg6.png);
  }

span.warning
{
	font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#333333;
}

#main
{
	width:900px;
	height:600px;
	margin-left:180px;
}
a  {
	text-decoration:none; color:#3366FF;
	}
a:hover
{
   text-decoration:underline; color:#3366FF;
}


</style>
</head>

<body>
<div id="main">
  <table width="1019" border="0">
  <tr>
    <th width="10" height="132" scope="col">&nbsp;</th>
    <th colspan="2" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <th height="160" scope="row">&nbsp;</th>
    <td width="543" rowspan="2"><img src="images/book3.png" width="454" height="456"></td>
    <td width="452" align="center" >
	<fieldset style="width:250px; border:ridge #1166d0" ><legend><font style="font-family:Arial, Helvetica, sans-serif; font-size:18px;   font-weight:500;color:#003366">Login</font></legend>
	<form action="logip.php" method="post">
	  <table width="260">
	  <tr><td width="74"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">User Name</font></td>
	  <td width="7"> : </td>
	  <td width="153"><input type="text" name="uname" /></td>
	  </tr>
	  <tr><td><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">Password</font></td>
	  <td>:</td>
	  <td><input type="password" name="pass" /></td></tr>
	  <tr>
	  
	  <td><td colspan="3"></td></tr>
	  <tr>
	    <td height="17" colspan="3">
	  <span class="warning">(Requierd fields can not left blank)</span>	    </td>
	  </tr>
	  <tr>
	    <td height="30" align="center">&nbsp;</td>
	    <td align="center">&nbsp;</td>
	    <td align="left"><input type="submit" name="sub" value="Login" /></td>
	    </tr>
	  <tr>
	      <td height="21" colspan="3" align="center"><a href="registration.php"><font style="font-family:Arial, Helvetica, sans-serif; font-size:12px">Register Free</font></a>
	        |
	     <a href="forgotpassword.php"><font style="font-family:Arial, Helvetica, sans-serif; font-size:12px">Forgot password </font></a></td>
	      </tr>
	  </table>
	</form>
	</fieldset>	</td>
    </tr>
  <tr>
    <th height="177" scope="row">&nbsp;</th>
    <td align="center"> 
<p style="font-size:15px; font-family:Arial, Helvetica, sans-serif; color:#333333;"><br>In this Contact Book provides you to add your all contacts.Such as name,address,phone number and email.<br> And also Retrive them as you need in any time !
</p>  
</td> 
    </tr>
</table>

</div>




</body>
</html>

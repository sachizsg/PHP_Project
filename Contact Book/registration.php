<?php
error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['reg']))
{
	include('connection.php');
	
    if(!empty($_POST['fname']) &&  !empty($_POST['uname']) && !empty($_POST['pwd']) && !empty($_POST['cpwd']) && !empty($_POST['email']))

   {
	$fname=mysql_real_escape_string(strip_tags(stripslashes($_POST['fname'])));
	$uname=mysql_real_escape_string(strip_tags(stripslashes($_POST['uname'])));		
	$pwd=mysql_real_escape_string(strip_tags(stripslashes($_POST['pwd'])));
	$cpwd=mysql_real_escape_string(strip_tags(stripslashes($_POST['cpwd'])));			
	$email=mysql_real_escape_string(strip_tags(stripslashes($_POST['email'])));
	
	
	
		$chk_uname=mysql_query("SELECT uname FROM mcontacts WHERE uname='$uname'");
		if(mysql_num_rows($chk_uname)>0)
		{
			 $uname_status="Username already exits";			
		}
		else
		{
			$chk_mail=mysql_query("SELECT email FROM mcontacts WHERE email='$email'");
			if(mysql_num_rows($chk_mail)>0)
			{
				$email_status="Email already exits";
			}
			else
			{
				$pass_len=strlen(trim($pwd));
				if($pass_len<6)
				{
					$msg="Password Should more than 6 characters";
				}
				else
				{
					if($pwd != $cpwd)
					{	
						$pass_match="Password not match!";
					}
					else
					{
						if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)))
						{
							$email_vaildate="Email is not valid!";
						}
						else
						{
							mysql_query("INSERT INTO mcontacts VALUES ('','$fname','$uname','$cpwd','$email')");
							$good="Successfully Registered..Thank You"." ".$uname." ".".";					
						}
					}
				}
			}
		}
	}
	else
	{
		$msg="Required fields cannot left blank";
	}
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

span
  {
   font-family:Arial, Helvetica, sans-serif;
   font-size:12px;
  }

#main
{
  width:900px;
  height:600px;
  margin-left:180px;
}
a {
	text-decoration:none;
  }
a:hover
   {
	color:#F00;
   }

#que
{
  width:160px;
}
</style>
</head>

<body>

<div id="main">
  <table width="1035" border="0">
  <tr>
    <th width="10" height="141" scope="col">&nbsp;</th>
    <th width="521" scope="col">&nbsp;</th>
    <th width="19" scope="col">&nbsp;</th>
    <th width="467" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="160" scope="row">&nbsp;</th>
    <td rowspan="2"><img src="images/register.png" width="497" height="332"></td>
    <td rowspan="2">&nbsp;</td>
    <td align="center" >
	<fieldset style="width:300px; border:ridge #1166d0">
	<legend><font style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#003366; font-weight:500">Registration</font></legend>
	<form action="" method="post">
	  <table width="305" height="251">
	  <tr>
	    <td width="123"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">First Name </font></td>
	    <td width="8"> : </td>
	  <td width="145"><input type="text" name="fname" /></td>
	  </tr>
	 
	  <tr>
	    <td><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">User Name</font> </td>
	    <td>:</td>
	  <td><input type="text" name="uname" /></td></tr>
	  <tr>
    <td colspan="5" class="pass"><span style="color:red"><?php echo $uname_status; ?></span></td>
    </tr><tr><td><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">Password</font></td>
	  <td>:</td>
	  <td><input type="password" name="pwd" /></td></tr><tr>
	    <td><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399"> Confirm Password</font></td>
	    <td>:</td>
	  <td><input type="password" name="cpwd" /></td></tr>
	  <tr>
    <td colspan="5" class="pass"><span style="color:red"><?php echo $pass_match; ?></span></td>
    </tr><tr>
	    <td><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">E-mail</font></td>
	    <td>:</td>
	  <td><input type="text" name="email" /></td></tr>
	  <tr>
    <td colspan="5" class="pass"><span style="color:red"><?php echo $email_vaildate; ?></span></td>
    </tr>
	  <tr>
	  <td colspan=4><span style="color:green"><?php echo $good; ?></span>
  				&nbsp;
                <span style="color:red"><?php echo $msg; ?></span>
	  <tr>
	    <td height="26"><a href="login.php">
	      <input type="button" name="login" value="Login" /></a></td>
	    <td>&nbsp;</td>
	    <td><input type="submit" name="reg" value="Register" />
          <input type="submit" name="reg" value="Clear" /></td>
	  </tr>
	  </table>
	</form>
	</fieldset></td>
    </tr>
  <tr>
    <th height="175" scope="row">&nbsp;</th>
    <td align="center"><p style="font-size:15px; font-family:Arial, Helvetica, sans-serif; color:#333333;"><br>In this Contact Book provides you to add your all contacts.Such as name,address,phone number and email.<br> And also Retrive them as you need in any time !
</p>  
</td> 
    </tr>
</table>
</div>
</body>
</html>

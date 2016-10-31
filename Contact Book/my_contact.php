<?php
error_reporting(E_ALL^E_NOTICE && E_ALL^E_WARNING);
session_start();
$uname = $_SESSION['uname'];
	if (!isset($_SESSION['uname'])) 
	{
        header('Location: login.php');
	}

//insert button click event
if(isset($_POST['insert']))
{
	include('connection.php');
//check all fields empty or not
if((empty($_POST['name']))||(empty($_POST['address']) && empty($_POST['hnumber']) && empty($_POST['mnumber']) && empty($_POST['email']))||(empty($_POST['name']) && empty($_POST['address']) && empty($_POST['hnumber']) && empty($_POST['mnumber']) && empty($_POST['email'])))
	  {
		 $msg="Required fields cannot left blank";
	  }
  else
       {
	       $name=mysql_real_escape_string(strip_tags(stripslashes($_POST['name'])));
           $address=mysql_real_escape_string(strip_tags(stripslashes($_POST['address'])));
           $hnumber=mysql_real_escape_string(strip_tags(stripslashes($_POST['hnumber'])));	 
		   $mnumber=mysql_real_escape_string(strip_tags(stripslashes($_POST['mnumber'])));	
		   $email=mysql_real_escape_string(strip_tags(stripslashes($_POST['email'])));
	    //data validation
	      if(!is_numeric($_POST['name']) && is_numeric($_POST['hnumber']) && is_numeric($_POST['mnumber']))
	       {
			 $chk_name=mysql_query("SELECT name FROM contacts WHERE name='$name'");
			 
			 if(mysql_num_rows($chk_name)>0)
		  	   {
		 		  $msg="Name already exits";			
		  	   }
			 else
			 {			
				 if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)))
				 {
			 	    $msg="Invalid email";
				 }
		           else
			 		{
						mysql_query("INSERT INTO contacts VALUES ('','$uname','$name','$address','$hnumber','$mnumber','$email')");
						$good="Congradulations... record added successfully..!!";			
					}			
	   		  }
           }
	    else
	     {
		    $msg="Invalid characters has entered to certain fields";
	     }
     }
}

//delete button click event
if(isset($_POST['delete']))
	{
		$mail=$_POST['email'];	
		if($mail != NULL )
		  {
			include("connection.php");
			$result=mysql_query("SELECT * FROM contacts WHERE email='$mail'")or die("query error".mysql_error());

		  if(mysql_num_rows($result)!=0)
		    {	
			   include("connection.php");
			   $result=mysql_query("DELETE FROM contacts WHERE email='$mail'")or die("query error".mysql_error());
			   $good="successfully deleted.";
		     }
		    else
			  { 
				$msg="There was no email for that you specified..";
			  }
	      }	
      else
	     { 
		   $msg="Please enter valid email address if you want to delete some contact.";
	     }
    }

//update button click event
/*if(isset($_POST['update']))
 {
		$host_name = "localhost";
		$user_name = "sachicont";
		$pass_name = "qwer";
		$db_name = "mycontact";

		$link = mysql_connect($host_name,$user_name,$pass_name) or die("Error Connection".mysql_error());
	   if(!$link )
	    {
 		 die('Could not connect: '.mysql_error());
	    }
     $db = mysql_select_db($db_name,$link) or die("Error Database".mysql_error());
	 $result=mysql_query("UPDATE contacts SET hnumber='$hnumber' WHERE name='$name' AND address='$address'");
	 $retval=mysql_query($result,$link );
	if(!$retval )
	 {
  		die('Could not update data: ' . mysql_error());
	 }
  echo "Updated data successfully";
// mysql_close($link);
}


/*if(isset($_POST['search']))
{ 
	$name=$_POST['name'];			
	if($name != NULL )
		{
		if(mysql_num_rows($result)!=0)
		   {
			$result=mysql_query("SELECT * FROM contacts WHERE name='$name'")or die("query error".mysql_error()); 
			$good="Successfully seleted.";
			}
			else
			   {
			$msg="Please enter valid name."; 
				}	
		}		
else
   { 
$msg="Please specify name to search on. There was no match for that you specified..";
    }
	 
 }*/
 
?>
<!--starting html code-->
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
  margin-left:200px;
 }
  a {
	text-decoration:none; color:#0066FF;
	}
a:hover{
text-decoration:underline; color:#3366FF;
	
       }
#que
 {
width:160px;
 }
</style>
</head>
<body>
<div id="main">
  <table width="970" border="0">
  <tr>
    <th width="10" height="141" scope="col">&nbsp;</th>
    <th width="517" scope="col">&nbsp;</th>
    <th width="29" scope="col">&nbsp;</th>
    <th width="461" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="160" scope="row">&nbsp;</th>
    <td rowspan="2"><img src="images/zz1.png" ></td>
    <td rowspan="2">&nbsp;</td>
    <td align="center" >
	<fieldset style="width:300px; border:ridge #1166d0">
	<legend><font style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#993333; font-weight:500">
    <?php echo $_SESSION['uname']; ?></font></legend>
	<form action="" method="post">
	  <table width="283" height="246">
	 
        <tr>
	    <td width="103" height="30"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">First Name </font></td>
	    <td width="7"> : </td>
	  <td width="157" colspan="2"><input type="text" name="name" /></td>
	  </tr>
	 <tr>
	    <td height="30"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">Address</font> </td>
	    <td>:</td>
	  <td colspan="2"><input type="text" name="address" /></td></tr>
	  <tr><td height="30"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">Home Phone </font></td>
	  <td>:</td>
	  <td colspan="2"><input type="text" name="hnumber" /></td></tr><tr>
	    <td height="30"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399"> Mobile Number</font></td>
	    <td>:</td>
	  <td colspan="2"><input type="text" name="mnumber" /></td></tr>
	  <tr>
	    <td height="30"><font style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#003399">E-mail</font></td>
	    <td>:</td>
	  <td colspan="2"><input type="text" name="email" /></td></tr>
	  <tr>
    <td colspan="6" class="pass"><span style="color:red"><?php echo $msg; ?></span> &nbsp;<span style="color:green"><?php echo $good; ?></span></td>
	  </tr>
	  <tr>
	    <td height="29" colspan="5">
	      <input type="submit" name="insert" value="Insert" />
	      <input type="submit" name="search" value="Search"/>
	      <input type="submit" name="delete" value="Delete" />
	      <input type="submit" name="update" value="Update"/>
	    </td>
	  </tr>
	  <tr>
	    <td height="26" colspan="3">
<!--logout button click event-->
	      <font style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:500; color:#000000">&nbsp;Do you want to logout? &nbsp;</font><a href="logout.php"><font style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" >Logout</font></a></td>
	    </tr>
	  </table>
	  </form>
	
     </fieldset>
	 <br>
	<hr color="#666666">
	</td>
    </tr>
    <tr>
    <th height="162" scope="row">&nbsp;</th>
<td>
<!--Print a table-->
<?php
include('connection.php');
$query = "SELECT name,address,hnumber,mnumber,email FROM contacts WHERE uname='$uname' ";
$result = mysql_query($query);
echo "<table border=1 bordercolor=\"#000099\" style=\"font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#CC0033;\" >";
print '<tr><td>Name</td><td>Address</td><td>Home Phone</td><td>Mobile No</td><td>Email</td></tr>';
while ($row = mysql_fetch_assoc($result))
{
    print "<tr><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['hnumber']."</td><td>".$row['mnumber']."</td><td>".$row['email']."</td></tr>";
} 
echo "</table>";
?>

</td>
</tr>
</table>
</div>
</body>
</html>


<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		fieldset
		{
			border:2px white solid;
			font-size: 20px;
			margin: 0 auto;
			width:500px;
			color: blue;
		}
		form{
			padding: 3px;
			margin-top: 20px; 
			font-size: 18px;
			background-color: yellow;
		} 
		p a{
			font-size: 20px;
		}
		body 
		{
			background-image: url(art.jpg);
			background-size: cover;
			background-repeat: no-repeat;

		}
		legend{
			color:white;
			font-size: 30px;
		}
	</style>
</head>
<body>
<?php
$username=isset($_SESSION["username"]) ? $_SESSION["username"] : "";
$password=isset($_SESSION["password"]) ? $_SESSION["password"] : "";
$rolename=isset($_SESSION["rolename"]) ? $_SESSION["rolename"] : "";
$lastlogin=isset($_SESSION["lastlogin"]) ? $_SESSION["lastlogin"] :"";
$emailid=isset($_SESSION["emailid"]) ? $_SESSION["emailid"] :"";
$sq=isset($_SESSION["sq"]) ? $_SESSION["sq"] :"";
$sans=isset($_SESSION["sans"]) ? $_SESSION["sans"] :"";
?>
<fieldset>
<legend>Register user</legend>

	<form action="registeruser.php" method="post">
	<table align="center" cellspacing="10" cellpadding="5">
	<tr>
		<td>
			<label for="username">Enter User:</label>
		</td>
		<td>
			<input type="text" name="username" id="username" value="<?php echo $username;?>"/>
		</td>
	</tr>
	<tr>
		<td>
			<label for="password">Enter password:</label>
		</td>
		<td>
			<input type="password" name="password" id="password"  value="<?php echo $password;?>"/>
		</td>
	</tr>
	<tr>
		<td>
			<label for="rolename">Choose rolename:</label>
		</td>
		<td>
			<select name="rolename" id="rolename" value="<?php echo $rolename; ?>"/>
			<option>Artist</option>
			<option>User</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<label for="lastlogin">Last login:</label>
		</td>
		<td>
			<input type="text" name="lastlogin" id="lastlogin" value="<?php echo $lastlogin;?>"/>
		</td>
	</tr>

	<tr>
		<td>
			<label for="emailid">Enter emailid:</label>
		</td>
		<td>
			<input type="text" name="emailid" id="emailid"  value="<?php echo $emailid;?>"/>
		</td>
	</tr>
	<tr>
		<td>
			<label for="sq">Security question:</label>
		</td>
		<td>
			<select name="sq"  id="sq">
			<option>what's your nick name?</option>
			<option>what is your mother name?</option>
			<option>what is your father name?</option>
			<option>where are you belongs from here?</option>
			<option>what are you doing?</option>
			<option>what is your name?</option>
			</select>
		</td>
	</tr>

	<tr>
		<td>
			<label for="sans">Security answer:</label>
		</td>
		<td>
			<input type="text" name="sans" id="sans"  value="<?php echo $sans;?>"/>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<input type="submit" value="register">
		</td>
	</tr>

	</table>
	<p align="center">
	<a href="login.php"> I have a already login</a>
		<img src="login2.jpg" style="width: 90px;">
	</p>
	</form>
</fieldset>
<?php
if(isset($_SESSION["message"]))
{
echo '<h1 align="center">'.$_SESSION["message"].'</h1>';
}
unset($_SESSION["message"]);

?>
</body>
</html>



<?php  session_start(); 
if (isset($_SESSION["artistname"]) )
{
	header("location:artist/artistinfo.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>art gallery login</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
	#container{
		text-align: center;
	}
	fieldset a{
		width: 700px;
		font-size: 20px;
	}
	fieldset{
		margin-left: 270px;
	}

</style>

</head>
<body id="top">
<?php include_once("headerart.php"); ?>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
		<?php
		$uname=isset($_SESSION["uname"])? $_SESSION["uname"] :"";
		$pass=isset($_SESSION["pass"])? $_SESSION["pass"] : "";
		?>
		<fieldset style="border: 2px solid green; width:450px;">
    	<legend align="center" style="color:brown;">Login User</legend>
    	<form action="loginuser.php" method="post">
    	<table align="center" cellspacing="10" cellpadding="5">
		<tr>
			<td>
				<label for="uname">Enter User:</label>
			</td>
			<td>
				<input type="text" name="uname" id="uname"  value="<?php echo $uname; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="pass">Enter password:</label>
			</td>
			<td>
				<input type="password" name="pass" id="pass" value="<?php echo $pass; ?>"/>
				
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<a href="changepass.php" style=" text-decoration: underline;">Forget Password</a>

			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" value="Login">
			</td>
		</tr>
		</table>
		</form>
		
		</fieldset>
		<p>
		<a href="register.php" style="border: 1px solid ;background-color: #bbcce9;color:blue;font-size:20px;"> Go to register create account</a>
		<img src="login.jpg" style="width:60px;">
		</p>
		<?php
		if(isset($_SESSION["message"]))
		{
		echo '<h1 align="center">'.$_SESSION["message"].'</h1>';
		}
		unset($_SESSION["message"]);
		//unset($_SESSION["artistname"]);

		?>
	</main>
</div>
<?php include_once("footerart.php"); ?>

</body>
</html>


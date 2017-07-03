<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>change password</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<?php include_once("headerart.php"); ?>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <?php
    $newpassword=isset($_POST["newpassword"])? $_POST["newpassword"]:"";
    $confirmpassword=isset($_POST["confirmpassword"])? $_POST["confirmpassword"]:"";

    ?>
	<form action="changepsd.php" method="post">
		<table cellpadding="10" cellspacing="5" align="center">
		  	<tr>
		  		<td>
		  			<label for="newpassword">new Password</label>
		  		</td>
		  		<td>
		  			<input type="password" name="newpassword" id="newpassword" value="<?php echo $newpassword;?>"/>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<label for="confirmpassword">Confirm Password</label>
		  		</td>
		  		<td>
		  			<input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword;?>">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="reset" value="reset password">
		  		</td>
		  		<td>
		  			<input type="submit" value="change password">
		  		</td>
		  	</tr>
		</table>
	</form>
	<?php
	if(isset($_SESSION["message"]))
	{
		echo '<h2 align="center" style="color:green;">'.$_SESSION["message"].'</h2>';
	}//unset($_SESSION["message"]);
	?>
	</main>
</div>
<?php include_once("footerart.php"); ?>

</body>
</html>
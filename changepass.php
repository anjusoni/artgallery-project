<?php 
session_start(); 
require("admin/dbconnect.php");
?>
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
    	$reset="no";
    	$message="";
    	$user=isset($_POST["user"])?$_POST["user"]:"";
    	$sq=isset($_POST["sq"])? $_POST["sq"]:"";
        $sans=isset($_POST["sans"])? $_POST["sans"]:"";
        if (isset($_POST["reset"])){
        $query= " select username,sq,sans from logininfo where username='{$user}' ";
        $query.=" and sq='{$sq}' and sans='{$sans}'";
        $result=mysqli_query($con,$query);
        //echo $query;
        if($result && mysqli_num_rows($result)>0)
        {
        	//mysqli_free_result($result);
        	$reset="yes";
        }else{
        	$message="Invalid user,,, you forget anything.. so try again";
        }mysqli_close($con);
       }
        if ($reset== "no"){
	?>
	<form  method="post">
		<table cellpadding="10" cellspacing="5" align="center">
			<tr>
				<td>
					<label for="user"> your Name:</label>
				</td>
				<td>
					<input type="text" name="user" id="user" value="<?php echo $user; ?>">
				</td>
			</tr>
		  	<tr>
		  		<td>
					<label for="sques">Security question:</label>
				</td>
				<td>
					<select name="sq"  id="sques">
					<option>what your nick name?</option>
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
					<label for="sanswer">Security answer:</label>
				</td>
				<td>
					<input type="text" name="sans" id="sanswer"  value="<?php echo $sans;?>"/>
				</td>
			</tr>
		  	<tr>
		  		<td colspan="2" align="center">
		  			<input type="submit" value="reset password" name="reset">
		  		</td>
		  	</tr>
		</table>
	</form>
	<?php
		}
		elseif($user!= ""){
	?>
	<form method="post" action="updatepassword.php">
	<table align="center" cellspacing="10" cellpadding="10">
	<input type="hidden" name="user" value=" <?php echo $user; ?>" />
	<tr>
		<td>
			<label for="np"> change password:</label>
		</td>
		<td>
			<input type="text" name="np">
		</td>
	</tr>
	<tr>
		<td>
			<label for="cp"> confirm password: </label>
		</td>
		<td>
			<input type="text" name="cp">
		</td>
	</tr>
	<tr>
		<td align="right" colspan="2">
			<input type="submit" value="reset password">
		</td>
	</tr>
	</table>
	</form>
	
	<?php
		}
	?>
	<h1 align="center">
		<?php
		if(isset($_SESSION["message"]))
		{
		 	echo $_SESSION["message"]; 
		}unset($_SESSION["message"]);
		?>
	</h1>
	</main>
</div>
<?php include_once("footerart.php"); ?>

</body>
</html>
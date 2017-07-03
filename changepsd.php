<?php
session_start();
if(isset($_POST["newpassword"]) && isset($_POST["confirmpassword"]))
{
	$newpassword=$_POST["newpassword"];
	$confirmpassword=$_POST["confirmpassword"];
	$message="";
	$notvalid=true;
		
	if(empty($newpassword) || empty($confirmpassword))
	{
		$message="please enter any password..";
	}
	else
	{	
		require("admin/dbconnect.php");
		$query=" update logininfo set password='{$newpassword}'";
		$query.=" where username='".$_SESSION["user"]."' ";
		$result=mysqli_query($con,$query);
		if($result)
		{
			if($newpassword==$confirmpassword)
			{
				$message=" your new password has been changed ";
			}
			else{
				$message=" password does not match...try again";
			}
		}
		else{
			$message="password changed due to failure".mysqli_error($con);
		}
		require("admin/dbclose.php");
	}//echo "$message";
	$_SESSION["message"]=$message;
	
}
header("location:changepassword.php");
?>
<?php
session_start();
$user=$_POST["user"];
$_SESSION["user"]=$user;
print_r($_SESSION);
$status="";
print_r($_POST);
if(isset($_POST["np"]) && isset($_POST["cp"]))
{
	$np=$_POST["np"];
	$cp=$_POST["cp"];
	$message="";
	if(empty($np) || empty($cp))
	{
		$message="please enter any values..";
	}
	else
	{	
		require("admin/dbconnect.php");
		$query=" update logininfo set password='{$np}' where username=";
		$query.=" '{$user}' ";
		$result=mysqli_query($con,$query);
		echo $query;
		if($result)
		{
			if($np == $cp)
			{
				$message=" your password has been changed ";
				$status="yes";
			}
			else{
				$message=" password does not match...try again";
			}
		}
		else{
			$message="password changed due to failure".mysqli_error($con);
		}
		require("admin/dbclose.php");
	}echo $message;
	//$_SESSION["message"]=$message;	
	//if(isset($_SERVER["HTTP_REFERER"]))
	//{
	//	header("location:" . $_SERVER["HTTP_REFERER"]);
	//}else{
	//header("Location:changepass.php");
	//}
	//header("Location:changepass.php");
}
?>
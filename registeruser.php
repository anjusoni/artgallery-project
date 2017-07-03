<?php
session_start();
require ("admin/dbconnect.php");
print_r($_POST);
$notregister = true;
if(isset($_POST["username"]) && isset($_POST["password"]) && 
	isset($_POST["rolename"]) && isset($_POST["lastlogin"])&& isset($_POST["emailid"]) && isset($_POST["sq"])&& isset($_POST["sans"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$rolename=$_POST["rolename"];
		$lastlogin=$_POST["lastlogin"];
		$emailid=$_POST["emailid"];
		$sq=$_POST["sq"];
		$sans=$_POST["sans"];

		$_SESSION["username"]=$username;
		$_SESSION["password"]=$password;
		$_SESSION["rolename"]=$rolename;
		$_SESSION["lastlogin"]=$lastlogin;
		$_SESSION["emailid"]=$emailid;
		$_SESSION["sq"]=$sq;
		$_SESSION["sans"]=$sans;

		$message="";

		if (empty($username) || empty($password) || empty($rolename) || empty($emailid) || empty($sq) || empty($sans))
		{
			$message="please enter values in the boxes";

		}
		$query1= " select username from logininfo where username='{$username}' ";
		$check= mysqli_query($con,$query1);
		if( $check && mysqli_num_rows($check)>0)
		{
			$message="this pearson is already exist";
		}
		else
		{
			$query= " insert into logininfo";
			$query.="(username,password,rolename,lastlogin,emailid,sq,sans)";
			$query.=" values('$username','$password','$rolename',NULL,'$emailid',
			'$sq','$sans')";
			$result=mysqli_query($con,$query);
			if($result)
			{
				if($rolename=="User")
				{
				$message=" welcome to new user....";
				$notregister = false;
				$_SESSION["aname"]=$uname;
				header("location:index.php");
				}
				else
				{
					$notregister = false;
					$message=" welcome artist....";
					$_SESSION["artistname"]=$uname;
					header("location:artist/artistinfo.php");
					
				}
				
			}
			else
			{
				$message="invalid user...try again" . mysqli_error($con);
			}
		}
		$_SESSION["message"]=$message;

	}
require("admin/dbclose.php");
if($notregister)
{
	header("Location:register.php");
}
?>

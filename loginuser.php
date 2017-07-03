<?php
session_start();
if(isset($_POST["uname"]) && isset($_POST["pass"]))
{
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
	$_SESSION["uname"]=$uname;
	$_SESSION["pass"]=$pass;
	$message="";
	$notvalid=true;
		
	if(empty($uname) || empty($pass))
	{
		$message="please enter any user && password..";
	}
	else
	{	
		require("admin/dbconnect.php");
		$query= " select username, password, rolename ,emailid";
		$query.= " from logininfo";
		$query.= " where username='{$uname}'";

		$result= mysqli_query($con,$query);
	 	if($result && mysqli_num_rows($result)>0 )
		{
			$row=mysqli_fetch_array($result);
			mysqli_free_result($result);
			if($row["username"]==$uname )
			{
				if($row["password"]==$pass)
				{
					if($row["rolename"]== "Artist")

					{
						$notvalid=false;
						$_SESSION["artistname"] = $uname;
						header("location:artist/artistinfo.php");
					}
					else if($row["rolename"]== "Admin")
					{
						$_SESSION["admin"]=$uname;
						$notvalid=false;
						header("location:admin/index.php");
					}
					else if($row["rolename"]== "User")
					{
						$_SESSION["user"]=$uname;
						$notvalid=false;
						header("location:index.php");
					}
				}
				else
				{
					$message="invalid password...try again";
				}
			}
		}

		else
		{
			$message="Something is wrong..";
		}

	}
	$_SESSION["message"]=$message;
	require("admin/dbclose.php");	
}
if($notvalid)
	{
		header("location:login.php");
	}
	print_r($_SESSION);
?>
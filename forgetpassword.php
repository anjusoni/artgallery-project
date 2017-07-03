<?php
session_start(); 
print_r($_POST);
$jump = "no";
if(isset($_POST["user"]) && isset($_POST["sques"]) && isset($_POST["sanswer"]))
{
	$user=$_POST["user"];
	$sques=$_POST["sques"];
	$sanswer=$_POST["sanswer"];
	require("admin/dbconnect.php");
	$message="";
	$query=" select username,sq,sans from logininfo";
	$query.=" where username='".$user."' ";
	$result=mysqli_query($con,$query);
	echo $query;
	if ($result && mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			list($username,$sq,$sans)=$row;
			if($sq==$sques && $sans==$sanswer)
			{
				$jump="yes";
				header("Location:resetpassword.php");

			}
			else{
					$message=" invalid user and ...try again";
			}$_SESSION["message"]=$message;
		}//echo $message;
		
	}require("admin/dbclose.php");
}
if($jump== "yes")
{
	header("Location:resetpassword.php");
}	
?>

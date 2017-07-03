<?php
session_start();
if(isset($_GET["auctionprice"]) && isset($_GET["artid"]))
{
	$auctionprice=$_GET["auctionprice"];
	$artid=$_GET["artid"];
	$message="";
		
	if((empty($auctionprice) && !is_numeric($auctionprice)))
	{
		$message="please enter any values..";
	}
	elseif(is_numeric($auctionprice))
	{	
		$username = $_SESSION["user"];
		require("admin/dbconnect.php");
		$query= " insert into auctioninfo ";
		$query.= " (auctionprice,artid,auctiondate,username,isapprove)";
		$query.= " values({$auctionprice},{$artid},curdate(),'{$username}','no')";
		$result= mysqli_query($con,$query);
	 	if($result)
		{
			$auctionid=mysqli_insert_id($con);
			$message=" auction values are submitted...";
		}	
		
		else
		{
			$message=" insertion auction due to failure:".mysqli_error($con);
		}
		require("admin/dbclose.php");	
	}
	else
	{
		$message="please fill box with numeric value in autionprice..";
	}
	$_SESSION["message"]=$message;
}
if(isset($_SERVER["HTTP_REFERER"]))
{
	header("location:" . $_SERVER["HTTP_REFERER"]);
}else{	
	header("Location:viewartdetail.php");
}
?>
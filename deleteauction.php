<?php
session_start();
if(isset($_GET["auctionid"]))
	{
		$auctionid=$_GET["auctionid"];
		
		$message="";
			include ("admin/dbconnect.php");
			$query= " delete from auctioninfo";
			$query.= " where auctionid='{$auctionid}'";
			$result=mysqli_query($con,$query);
			if($result)
			{
				$message="this auction is removed of that photo....";
			}
			else
			{
				$message="deletion due to failure...".mysqli_error($con);
			}
			include("admin/dbclose.php");
	}
		$_SESSION["message"]=$message;		
	header("location:myauction.php");
?>
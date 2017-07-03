<?php
session_start();
//print_r($_GET);
if(isset($_GET["auctionid"]) && isset($_GET["artid"]) && isset($_GET["artname"])
	&& isset($_GET["auctionprice"]))
	{
		$auctionid=$_GET["auctionid"];
		$artid=$_GET["artid"];
		$artname=$_GET["artname"];
		$auctionprice=$_GET["auctionprice"];
		
		$message="";
			include_once("admin/dbconnect.php");
			$query= " update auctioninfo";
			$query.= " set auctionprice='{$auctionprice}'";
			$query.= " where auctionid='{$auctionid}'";
			$result=mysqli_query($con,$query);
			if($result>0)
			{
				$message="updated auction information is ....";
			}
			else
			{
				$message="updation due to failure...".mysqli_error($con);
			}
			include_once("admin/dbclose.php");
			
		}
	$_SESSION["message"]=$message;
	
header("location:myauction.php");
?>
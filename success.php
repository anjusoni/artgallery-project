<?php
session_start();
if(isset($_SESSION["auctionid"]))
{
	include("admin/dbconnect.php");
	$query=" update auctioninfo set ispaid='yes' ";
	$query.=" where auctionid=". $_SESSION["auctionid"];
	$result=mysqli_query($con,$query);
	if($result)
	{
		
	}
	include("admin/dbclose.php");
	unset($_SESSION["auctionid"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 align="center" style="color:blue;"> your order has been placed now...</h1>
</body>
</html>
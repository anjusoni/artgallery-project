<?php
session_start();
require("admin/dbconnect.php");
$auctionid=isset($_GET["auctionid"])?$_GET["auctionid"]:"";
$query=" select auctionid , auctionprice , ( select artname from artinfo"; 
$query.=" where artid = auctioninfo.artid) as artname";
$query.=" from auctioninfo where auctionid={$auctionid} ";
$result=mysqli_query($con,$query);
if($result && mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		list($auctionid,$auctionprice,$artname)=$row;
		$url = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_cart&upload=1&business=auctionstore@gmail.com";
	$successURL = "http://localhost/projectwork/success.php";
	$failureURL = "http://localhost/projectwork/failure.php";
	$i = 1;
	$url .= "&item_name_" . $i . "=" . $artname . "&amount_" . $i . "=" . $auctionprice . "&quantity_" . $i . "=1";
	$url .= "&currency=USD";
	$url .= "&return=" . $successURL;
	$url .= "&cancel_return=" . $failureURL;
	header("location:$url");
	$_SESSION["auctionid"]=$auctionid;
	}mysqli_free_result($result);
}
require("admin/dbclose.php");
?>
<?php include("admin/dbconnect.php"); 
session_start();
?>
<!DOCTYPE html>
<html>
<title>View Art Gallery</title>
<meta charset="utf-8">
<style type="text/css">
  #container img
  {
    width: 100px;
    height: 100px;
  }
</style>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<?php include("headerart.php"); ?>
<!-- ############################################################################################### -->

<div class="wrapper row3">
  <main id="container" class="clear"> 
  <h2 style="color: brown">*** Welcome 
  <?php
    print_r($_SESSION["user"]);
  ?> *** 
  </h2>
    <!-- container body --> 
    <h1 align="center" style="color:blue; font-size: 28px;">my auction available here...</h1>
    <table align="center" cellspacing="5" cellpadding="4" border="2" rules="all">
    <th>Artid</th>
    <th>Artname</th>
    <th>Auctionprice</th>
    <th>Isapprove</th>
    <th>Delete Auction</th>
    <th>Edit Auction</th>
    <th>Art Image</th>
    
    <?php
    $auctionid=isset($_GET["auctionid"])? $_GET["auctionid"]:"";
    $query=" SELECT auctionid,ai.artid,artname,auctionprice,";
    $query.=" isapprove,apid,artextname,ispaid from auctioninfo ";
    $query.=" as ai join artphoto as ap on ai.artid = ap.artid ";
    $query.=" join artinfo aii on ai.artid = aii.artid where username = 
              '".$_SESSION["user"]."' ";
    $result=mysqli_query($con,$query);
    if($result && mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_row($result))
      {
        list($auctid,$artid,$artname,$auctionprice,$isapprove,$apid,$artextname,$ispaid)=$row;
        $imgpath=" artistupload/{$apid}.{$artextname}";
        echo "<tr>";
        if($auctionid == $auctid)
        {
                  echo '<form method="get" action="editauction.php">';
                  echo '<td><input  readonly="readonly" type="text" name="artid" value="'.$artid.'" size="10">
                  <input  readonly="readonly" type="hidden" name="auctionid" value="'.$auctionid.'" size="10">
                  </td>';
                  echo '<td><input readonly="readonly" type="text" name="artname" value="'.$artname.'"
                  size="10"> </td>';
                  echo '<td><input type="text" name="auctionprice" value="'.$auctionprice.'" size="10"></td>';
                  echo '<td><input readonly="readonly" type="text" name="isapprove" value="'.$isapprove.'" size="10"></td>';

                  echo '<td align="center" colspan="2"><input type="submit"
                   value="update details"/> </td>';
                   echo '<td><img src="'.$imgpath.'" ></td>';
                  echo '</form>';
        }
        else{
            echo "<td>$artid</td>";
            echo "<td>$artname</td>";
            echo "<td align='center'>$auctionprice</td>";
            echo "<td align='center'>";
            echo $isapprove;
            if($isapprove=="yes" && $ispaid=='no')
              {
                echo '<br/><a href="paypal.php?auctionid='.$auctid.'"><img src="paypal-checkout-button.png" /></a>';
              }
            else if($ispaid == 'yes' ){
                echo "it has been already paid";
            }
            echo "</td>";
            echo '<td><a href="deleteauction.php?auctionid='.$auctid.'" onclick="return confirm(\'are you want to delete this auction\')">delete this auction</td>';
            echo '<td><a href="myauction.php?auctionid='.$auctid.'">edit auction
            </td>';
            echo '<td><img src="'.$imgpath.'" ></td>';
          }
        echo "</tr>";
      }
    }
    ?></table>
    <!-- / container body -->
    <div class="clear">
    <br/>
    <?php
    if(isset($_SESSION["message"]))
    {
      echo '<h1 align="center" style="color:brown">'.$_SESSION["message"].'</h1>';
    }unset($_SESSION["message"]);
    ?>
    </div>
  </main>
</div>
<!-- ################################################################################################ --> 

<?php include("footerart.php"); ?>
</body>
</html>
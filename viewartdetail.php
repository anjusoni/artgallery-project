<?php 
session_start();
include("admin/dbconnect.php"); 
?>
<!DOCTYPE html>
<html>
<title>View Art Gallery</title>
<meta charset="utf-8">
<style type="text/css">
  #artdetail{
    border: #ae20dd dotted 4px; 
    margin-bottom: 12px;
    padding: 5px;
    width: 500px;
    background-color: #afffdd;
  }
   #photo{
    border:  red double 7px; 
    padding: 5px;
    width:300px;
  }
</style>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<?php include("headerart.php"); ?>

<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <!-- ################################################################################################ -->
    <h1 style="color: red; font-style:italic;" > Art Information Details Here...</h1>
    <?php   
       $artid=isset($_GET["artid"])? $_GET["artid"]:"";
    	 $query="select artid,artname,artistid,listprice,description,issold";  
       $query.=" from artinfo where artid='{$artid}' ";
       $result=mysqli_query($con,$query);
       if($result && mysqli_num_rows($result)>0)
       {
        while ($row=mysqli_fetch_row($result)) {
          list($artid,$artname,$artistid,$listprice,$description,$issold)=$row;
          echo '<div id="artdetail">';
          echo "<h1>";
          echo 'artname:'.$artname.'<br/>';
          echo 'listprice:'.$listprice.'<br/>';
          echo 'description:'.$description.'<br/>';
          echo 'issold:'.$issold.'<br/>';
          echo "</h1>";         
          echo '</div>';
        }mysqli_free_result($result);
       }

       $query=" select artphotoname,apid,artextname from artphoto";
       $query.="  where artid='{$artid}' ";
       
       $result= mysqli_query($con,$query);
       if($result && mysqli_num_rows($result)>0)
       {$i=0;
        while ($row=mysqli_fetch_row($result)) {
          list($artphotoname,$apid,$extname)=$row;
          echo '<div id="photo">';
          echo '<img src="artistupload/'.$apid .'.' . $extname . '" style="width:230px; height:250px; padding:5px;">';
          echo '</div>';
          echo '<br/>';
          
        }mysqli_free_result($result);
        }
        $artistid=isset($_GET["artistid"])? $_GET["artistid"]: "";
        $query=" select artistid,name from artistinfo ";
        $query.=" where artistid IN ( select artistid from artinfo where artid = {$artid}) ";
        $result=mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0)
        {
          while($row=mysqli_fetch_row($result)){
            list($artistid,$name)=$row;
            echo '<br/><h1 style="color:#09cdfe">Artist:'.$name.'</h1>';
            
          }mysqli_free_result($result);
        }
    ?>
    <!-- ################################################################################################ --> 
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ --> 
<div id="comments" style="background-color: #ffffff;">
  <div class= "clear">
    <?php
    $artid=isset($_GET["artid"])? $_GET["artid"]: "";
          if (isset($_SESSION["uname"]))
          {
            echo '<form method="get" action="auctioninfo.php">';
            echo '<table align="center" border="1" rules="all" cellspacing="5" cellpadding="5">';
            echo '<tr>';
            echo '<td><label for="auctionprice">auctionprice:</label></td>';
            echo '<td><input type="text" name="auctionprice" id="auctionprice" size="10"  ></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td><label for="artid">artid:</label></td>';
            echo '<td><input type="hidden" name="artid" id="artid" value="' .$artid . '"></td>';
            echo '</tr>';
            echo'<td colspan="2" align="center"><input type="submit" value="add auction"></td>';
            echo '</table>';
            echo '</form>';
          }
          else{
                 echo '<h1 align="center" style="colo:red">';
              echo '<a href="register.php">Go To Register For participating In Auction</a>';
              echo '</h1>';

          }
      ?> 

  </div>
  <?php
  if (isset($_SESSION["message"]))
  {
    echo '<h1 align="center">'.$_SESSION["message"].'</h1>';
  }unset($_SESSION["message"]);
  ?>
  <br/>
</div>

<!-- ################################################################################################ --> 
<?php include("footerart.php"); ?>

<!-- ################################################################################################ -->

</body>
</html>
<?php include("admin/dbclose.php"); ?>

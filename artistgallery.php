<?php include("admin/dbconnect.php"); ?>
<!DOCTYPE html>
<html>
<title>View Art Gallery</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<?php include("headerart.php"); ?>
<!-- ############################################################################################### -->

<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <!-- ################################################################################################ -->
    <h1 align="center"  style="border: red 5px groove; width:300px; padding:10px;">Gallery of artist photos...</h1>
    <p>
    <table align="center" border="1" cellpadding="10" rules="all" bgcolor="yellow">
    <?php
    $artistid=isset($_GET["artistid"])? $_GET["artistid"]: "";
    //$query=" Select * from artphoto ";
      $query= " select artistid, artname, categoryid,listprice,
                   description,issold, ";
      $query.= " ifnull((select concat(apid,'.',artextname)from artphoto ";
      $query.=" where artid = artinfo.artid limit 1),'no_photo.jpg') ";
      $query.=" as photoname from artinfo ";
      $query .= " where artistid = {$artistid}";
      $result=mysqli_query($con,$query);
      if($result && mysqli_num_rows($result)>0)
      {$i=0;
        while($row=mysqli_fetch_row($result))
        {
          list($artid,$artname,$cid,$lp,$description,$issold,$photoname)=$row;
          $imgpath=" artistupload/{$photoname} ";
          if($i==0)
          {
            echo "<tr>";
          }$i++;
          echo '<td>';
          echo "<h1>".$artname ."<h1>".'<img src="'.$imgpath.'" style="width:220px; height:240px;">';
          echo '</td>';
          if($i==4)
          {
            echo "</tr>";
            $i=0;
          }
        }if($i!=0){
            echo "</tr>";
          }mysqli_free_result($result);
      }else{
        echo "<h3> there is no photos that artist..</h3>";
      }
    ?>
    </table>
    </p>
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ --> 

<?php include("footerart.php"); ?>
</body>
</html>
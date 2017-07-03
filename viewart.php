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
 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <!-- ################################################################################################ -->
    <div id="gallery">
      <figure>
        <header class="heading" style="color:green;">View Arts Here...</header>
        <ul class="nospace clear">
         <?php
            $categoryid=isset($_GET["categoryid"]) ? $_GET["categoryid"] :"";
          $query= " select artid,artistid, artname, categoryid,listprice,
                   description,issold, ";
          $query.= " ifnull((select concat(apid,'.',artextname)from artphoto ";
          $query.=" where artid = artinfo.artid limit 1),'no_photo.jpg') ";
          $query.=" as photoname from artinfo ";
          $query .= " where categoryid = '{$categoryid}'";
          $result= mysqli_query($con,$query);
          if($result && mysqli_num_rows($result)>0)
          {
              $i = 0;
              while($row=mysqli_fetch_array($result))
              {
                list($artid,$aid,$artname,$cid,$lp,$description,$issold,$photoname)=$row;
                $status = "";
                if($i==0)
                {
                  $status = "first";
                }
                $i++;
                echo '<li class="one_quarter ' . $status . '">';
                echo '<a href="viewartdetail.php?artid=' .$artid .'">';
                echo $artname . ' <br/><img src="artistupload/'.$photoname.'" style="width:200px; height:250px;" ></a>';
                echo "</li>";
                if($i==4)
                {
                  $i=0;
                }
              }
              mysqli_free_result($result);
          }
        ?> 
        </ul>
        

        <figcaption style="border: groove blue 8px; padding:5px; width:300px;">
        <h1 style="color: brown">Gallery Description:</h1>
        <?php  
        $q1=" select categoryid,description,categoryname from categoryinfo";
        $q1.=" where categoryid='{$categoryid}' ";
        $r1=mysqli_query($con,$q1);
        if($r1 && mysqli_num_rows($r1)>0)
        {
          while($row=mysqli_fetch_array($r1))
          {
            list($catid,$description,$categoryname)=$row;
            echo '<h1 style="color:brown;">'.$description.'<h1>';
            
          }mysqli_free_result($r1);
        }
        ?>
        </figcaption>
      </figure>
    </div>
    <!-- ################################################################################################ --> 
    
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ --> 
<?php include("footerart.php"); ?>

</body>
</html>
<?php include("admin/dbclose.php"); ?>
      
<?php include("admin/dbconnect.php"); ?>
<!DOCTYPE html>

<html>
<head>
<title>artist information</title>
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
        <header class="heading">view artist here:...</header>
        <ul class="nospace clear">
        <?php
            $query=" select artistid , name ,ifnull((select concat ";
            $query.= " (photoid,'.',extname) from artistphoto ";
            $query.=" where artistid = artistinfo.artistid limit 1 ),
                      'no_photo.jpg')";
            $query.=" as photoname from artistinfo";
            $result=mysqli_query($con,$query);
          if($result && mysqli_num_rows($result)>0)
          {
              $i = 0;
              while($row=mysqli_fetch_array($result))
              {
                list($artistid,$name,$photoname)=$row;
                $status = "";
                if($i==0)
                {
                  $status = "first";
                }
                $i++;
                echo '<li class="one_quarter ' . $status . '">';
                echo '<a href="artistgallery.php?artistid=' .$artistid .'">';
                echo $name . ' <br/><img src="aphoto/'.$photoname.'" ></a>';
                echo "</li>";
                if($i==4)
                {
                  $i=0;
                }
              }
              mysqli_free_result($result);
          }
        ?>
          
    
    <!-- ################################################################################################ --> 
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ --> 
<?php include("footerart.php"); ?>

<!-- ################################################################################################ --> 

</body>
</html>
<?php include("admin/dbclose.php"); ?>
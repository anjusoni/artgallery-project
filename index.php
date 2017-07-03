<?php
session_start();
include("admin/dbconnect.php"); ?>
<!DOCTYPE html>
<!--
Template Name: Integral
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>art gallery</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
  #container{
    width: 100%;
    margin-left: 90px;
  }
 </style>   
</head>
<body id="top">
<!-- ################################################################################################ --> 
<?php include("headerart.php"); ?>

<!-- ################################################################################################ --> 
<div class="wrapper row3">
  <br/>
  <h1 align="center" style="color:#5023bb;">------WELCOME TO ART GALLERY----</h1>
    <center>
      <img src="artmain.png">
    </center>
    <main id="container" class="clear">
    <!-- container body --> 
    <img src="artgallery.jpg" style="width: 540px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images121.jpg"  style="width:230px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="artgallery2.jpg"  style="width:300px;"><br/><br/>

    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>

<div id="comments" style="background-color: #ffffff;">
  <div class= "clear">
  </div>
</div>
<!-- ################################################################################################ --> 
<?php include("footerart.php"); ?>

</body>
</html>
<?php include("admin/dbclose.php"); ?>
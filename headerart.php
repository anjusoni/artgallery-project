<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="#">ART GALLERY</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Categories</a>
          <ul>
          <?php
            require("admin/dbconnect.php");
            $query=" select categoryid, categoryname ";
            $query.=" from categoryinfo";
            $result=mysqli_query($con,$query);
            if($result && mysqli_num_rows($result)>0)
            {
              while($row = mysqli_fetch_row($result))
              {
                list($catid ,$catname )  = $row;
                echo '<li><a href="viewart.php?categoryid=' . $catid;
                echo '">' . $catname . '</a></li>';
              }
              mysqli_free_result($result);
            }
          ?>
          </ul>            
        </li>
        <li><a class="drop" href="viewartist.php">Artist</a></li>
        
        <?php
        if(isset($_SESSION["user"]))
        {
          ?>
          <li>
          <a href="myauction.php">my auctions</a></li>

        <li><a href="#">settings</a>
          <ul>
            <li><a href="changepassword.php">change password</a></li>
            <li><a href="signout.php">Sign Out</a></li>
          </ul>
        </li>
        <?php
        }else{
          ?>
        
        <li><a href="login.php">Sign In</a></li>
        <?php
      }
        ?>
      </ul> 
    </nav>
    <!-- ################################################################################################ --> 
  </header>
  
</div>
<!-- ################################################################################################ --> 


<!-- ################################################################################################ --> 

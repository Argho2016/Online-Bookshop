<html>
  <head>
    <title>
      boikinun
    </title>
    <link rel="stylesheet" href="../../css/navi.css">
    <link rel="stylesheet" href="../../css/list.css">
    <link rel="stylesheet" href="../../css/addEmployee.css">
    <link rel="stylesheet" href="../../css/navi2.css">

  </head>
  <body>
    <table  width="100%" height="100%">
      <tr id="header">
        <td colspan="2">
            <a class="navbar-brand" href="homepageD.php"><img src="../../img/books.png" width="38" height="38"></a>
            <span class="navbar-text logoText">boikinun.com</span>

            <?php

              if($_SESSION) {
              ?>

              <form class="cart-form" action="../../lib/logout.php" method="post">
                <button class="logout" type="submit"  name="login">Logout</button>
                <input type="hidden" name="navId" value="employeeList">
              </form>

              <?php
            } else  {
              ?>
              <a class="login" href="loginPageD.php">Login</a>
              <?php
            }

            ?>


            <!--
            <span class="userInfo"><?php echo "Welcome " . $_SESSION['userName']; ?></span>
            -->


            <form class="cart-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
              <a class="cart-logo" href="cart_view.php"><img class="cart-logo" src="../../img/cart.png" height="35" width="35" style="margin-left: 10px; margin-right: 30px;"></a>
              <span class="cart_count" style="color: #FFAD33;font-size: 18px; font-weight: bold; padding: 0px;background-color: white;"></span>
              <input type="hidden" name="navId" value="employeeList">
            </form>




            <?php

              if($_SESSION) {
              ?>

              <div class="navbar-2" style="background-color:white"  >
                <div id="sidebar-2" style="float: right" >
                  <ul style="width:260px" >
                    <li class="dropdown-2" style="float:right" >
                      <a href="javascript:void(0)" class="dropbtn-2" ><span class="customerPro"><?php echo "Welcome ". $_SESSION['userName']; ?></span></a>
                      <div class="dropdown-content-2" style="float:left" style="min-width: 0px">
                        <a href="post.php">Post an Ad.</a>
                        <a href="myAds.php">My Ads</a>
                        <a href="myProfile.php">My Profile</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <?php
              }

            ?>





            <!--
            <form class="search" action="index.html" method="post" >
              <input id="search-input" type="text" placeholder="Search" name="Search"/>
              <input id="search-button" type="submit" name="searchSubmit" value="search" />
            </form>
            <form class="" action="cart.php" method="post">
                   <button type="submit" name="cart"><img src="img/cart.png" align="center" width="30" height="30" alt="cart img not found"></button>
            </form>
          -->
        </td>
      </tr>

      <tr class="navbar">
        <td id="sidebar">


          <ul>
            

            <li class="dropdown">
              <a href="oldbooks.php" class="dropbtn">Old Books</a>
            </li>

          <li class="dropdown">
            <a href="newBooks.php" class="dropbtn">New Books</a>
            
          </li>
        </ul>



        </td>
      </tr>

      <tr valign="top">
        <td colspan="8">
          <!-- Argo ur code is here -->

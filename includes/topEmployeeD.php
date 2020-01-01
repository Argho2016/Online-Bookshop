<html>
  <head>
    <title>
      Employee Dashboard
    </title>
    <link rel="stylesheet" href="../../css/navi.css">
    <link rel="stylesheet" href="../../css/list.css">
    <link rel="stylesheet" href="../../css/addEmployee.css">
    <link rel="stylesheet" href="../../css/editEmployee.css">
    <script src="../../js/alerts.js"></script>

  </head>
  <body>
    <table  width="100%" height="100%">
      <tr id="header">
        <td colspan="2">
            <a class="navbar-brand" href="employeeD.php"><img src="../../img/books.png" width="38" height="38"></a>
            <span class="navbar-text logoText">boikinun.com</span>
            <form class="cart-form" action="../../lib/logout.php" method="post">
              <button class="logout" type="submit"  name="login">Logout</button> </a>
              <input type="hidden" name="navId" value="employeeList">
            </form>


            <span class="userInfo"><?php echo "Welcome " . $_SESSION['userName']; ?></span>
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
							    <a href="javascript:void(0)" class="dropbtn">Old Books</a>
							    <div class="dropdown-content">
										<a href="oldAdsReview.php">Review Books</a>
										<a href="oldbookList.php">Book List</a>
							    </div>
							  </li>

								<li class="dropdown">
							    <a href="javascript:void(0)" class="dropbtn">Customer</a>
							    <div class="dropdown-content">
										<a href="customerList.php">Customer list</a>
							    </div>
							  </li>

							<li class="dropdown">
								<a href="javascript:void(0)" class="dropbtn">New Books</a>
								<div class="dropdown-content">
									<a href="addNewBook.php">Add Books</a>
									<a href="editNewBook.php">Edit Books</a>
									<a href="newBooksReview.php">New Books Review</a>
								</div>
							</li>

							<li class="dropdown">
								<a href="javascript:void(0)" class="dropbtn">Profile</a>
								<div class="dropdown-content">
									<a href="adminProfile.php">My Profile</a>
								</div>
							</li>
						</ul>

        </td>
      </tr>

      <tr valign="top">
        <td colspan="8">
          <!-- Argo ur code is here -->

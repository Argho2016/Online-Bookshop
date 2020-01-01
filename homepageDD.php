<?php
	session_start();
	print_r($_SESSION);
?>

<?php
	if (!$_SESSION) {
		//header('location:homepageD.php');
	} else {
		?>





		<?php
	}
?>

<html>
	<head>
		<title>
			boikinun
		</title>
		<link rel="stylesheet" href="css/navi.css">
		<link rel="stylesheet" href="css/list.css">
		<link rel="stylesheet" href="css/addEmployee.css">

	</head>
	<body>
		<table  width="100%" height="100%">
			<tr id="header">
				<td colspan="2">
						<a class="navbar-brand" href="homepageD.php"><img src="img/books.png" width="38" height="38"></a>
						<span class="navbar-text logoText">boikinun.com</span>

						<form class="cart-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
							<button class="login" type="submit"  name="nav">Login</button> </a>
							<input type="hidden" name="navId" value="loginPage">
						</form>


						<form class="cart-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
							<button class="cart-logo" type="submit" name="button"><img class="cart-logo" src="img/cart.png" height="35" width="35"></button>
							<input type="hidden" name="navId" value="employeeList">
						</form>

						<form class="search" action="index.html" method="post" >
							<input id="search-input" type="text" placeholder="Search" name="Search"/>
							<input id="search-button" type="submit" name="searchSubmit" value="search" />
						</form>





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
					    <a href="javascript:void(0)" class="dropbtn">Employee</a>
					    <div class="dropdown-content">
					      <form class="nav" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
					      	<input type="submit" name="nav" value="Employee List">
									<input type="hidden" name="navId" value="employeeList">
					      </form>
								<form class="nav" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
					      	<input type="submit" name="nav" value="Add Employee">
									<input type="hidden" name="navId" value="addEmployee">
					      </form>
					    </div>
					  </li>

						<li class="dropdown">
					    <a href="javascript:void(0)" class="dropbtn">Books</a>
					    <div class="dropdown-content">
								<a href="oldbooksList.php">Old Books</a>
	              <a href="newbooksList.php">New Books</a>
	              <a href="AddBook.php">Add Books</a>
					    </div>
					  </li>

						<li class="dropdown">
					    <a href="javascript:void(0)" class="dropbtn">Customer</a>
					    <div class="dropdown-content">
								<a href="customerList.php">Customer list</a>
					    </div>
					  </li>

					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">Books</a>
						<div class="dropdown-content">
							<a href="oldbooksList.php">Old Books</a>
							<a href="newbooksList.php">New Books</a>
							<a href="AddBook.php">Add Books</a>
						</div>
					</li>

					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">Order</a>
						<div class="dropdown-content">
							<a href="transactionList.php">Ordel list</a>
						</div>
					</li>
				</ul>


				</td>
			</tr>

			<tr valign="top">
				<td colspan="8">
					<!-- Argo ur code is here -->


					<?php
						if (isset($_POST['nav']) == true) {
							if ($_POST['navId'] === "employeeList") {
								include_once "includes/employeeList.php";
							} elseif ($_POST['navId'] === "addEmployee") {
								include_once "includes/addEmployee.php";
							} elseif ($_POST['navId'] === 'loginPage' ) {
								include_once "includes/loginPage.php";
							} elseif ($_POST['navId'] === 'customerRegistration') {
								include_once "includes/addCustomer.php";
							}
						}
						else {
						}


					?>


				  <!-- upto this point -->
				</td>
			</tr>

		</table>



	<!-- upto this point -->

	</body>
	</html>

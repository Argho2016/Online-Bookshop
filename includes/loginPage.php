<link rel="stylesheet" href="../../css/loginPage.css">

<?php
include_once("../../core/user_service.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['login'])) {
			$result = loginValidation($_POST['email'],$_POST['password']);
			if (mysqli_num_rows($result)>0) {
				$rows = mysqli_fetch_array($result);

		    session_unset();
		    $_SESSION['id'] = $rows['id'];
		    $_SESSION['userEmail'] = $rows['email'];
		    $_SESSION['userType'] = $rows['flag'];
		    $_SESSION['userName'] = $rows['name'];

		    //print_r($_SESSION);
		    if ($_SESSION['userType'] === '1') {
		      header('location:adminD.php');
		    } elseif ($_SESSION['userType'] === '2') {
		      header('location:employeeD.php');
		    } elseif ($_SESSION['userType'] === '3') {
		      header('location:homepageD.php');
		    }
			}
			else {
				echo 'Wrong username or password';
			}
    } else if (isset($_POST['nav'])) {
    	//header('location:addCustomer.php');
			?>
			<script type="text/javascript">
				window.location.href = 'addCustomer.php';
			</script>
			<?php
    }
}
?>

<div class="tbl_details">
	<table >
		<tr>
			<td colspan="20">Login</td>
		</tr>
	</table>
</div>

<div class="container-loginBox">
  <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="text" placeholder="Email" class="fname" name="email"><br>
    <input type="password" placeholder="Password" class="lname" name="password"><br>
    <input type="submit" value="Login" name="login" class="loginButton">
  </form>

	<p class="account">Don’t have an account?<a class="register" href="userRegistration.php"></p>
	<form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
		<input class="loginButton" type="submit" name="nav" value="Register Now!">
		<input type="hidden" name="navId" value="customerRegistration">
	</form>
</div>

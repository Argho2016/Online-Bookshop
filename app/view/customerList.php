<?php
	session_start();
	print_r($_SESSION);
?>


<?php
	if ($_SESSION) {
		if ($_SESSION['userType'] === "3") {
			header('location:homepageD.php');
		} elseif ($_SESSION['userType'] === "2") {
			header('location:employeeD.php');
		} else{
				?>

				<?php include_once '../../includes/topAdminD.php'; ?>

				<?php include_once '../../includes/customerList.php'; ?>
				<?php include_once '../../includes/bottomAdminD.php'; ?>

				<?php
		}
	}
?>

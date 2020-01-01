<?php
	session_start();
?>

<?php
	if ($_SESSION) {
		if ($_SESSION['userType'] === "1") {
			header('location:adminD.php');
		} elseif ($_SESSION['userType'] === "2") {
			header('location:employeeD.php');
		} else{
			?>

				<?php include_once '../../includes/topHomepage.php'; ?>


				<?php include_once '../../navigations/homepageDNav.php' ?>


				 <?php include_once '../../includes/bottomHomepage.php'; ?>



		<?php
		}
	} else {
		?>

		<?php include_once '../../includes/topHomepage.php'; ?>


		<?php include_once '../../navigations/homepageDNav.php' ?>


		 <?php include_once '../../includes/bottomHomepage.php'; ?>


		<?php
	}
?>

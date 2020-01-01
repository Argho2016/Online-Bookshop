<?php
	session_start();
	//print_r($_SESSION);
?>

<?php
	if ($_SESSION) {
		if ($_SESSION['userType'] === "1") {
			header('location:adminD.php');
		} elseif ($_SESSION['userType'] === "2") {
			header('location:employeeD.php');
		} else{
			?>

				<?php include '../../includes/topHomepage.php'; ?>

        <?php include_once '../../includes/postAdRegistration.php' ?>


				 <?php include '../../includes/bottomHomepage.php'; ?>



		<?php
		}
	} else {
		?>

		<?php include '../../includes/topHomepage.php'; ?>




		 <?php include '../../includes/bottomHomepage.php'; ?>


		<?php
	}
?>

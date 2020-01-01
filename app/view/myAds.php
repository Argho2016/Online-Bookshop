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

				<?php include_once '../../includes/topHomepage.php'; ?>

        <?php include_once '../../includes/myAds.php' ?>


				 <?php include_once '../../includes/bottomHomepage.php'; ?>



		<?php
		}
	} else {
		?>
    <script type="text/javascript">
      window.location.href = "loginPageD.php";
    </script>
		
		<?php
	}
?>

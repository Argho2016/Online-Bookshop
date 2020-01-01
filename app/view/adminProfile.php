<?php
	session_start();
	print_r($_SESSION);
?>


<?php
	if ($_SESSION) {
		if ($_SESSION['userType'] === "3") {
			header('location:homepageD.php');
		} else {
				include_once '../../includes/topAdminD.php';

				include_once '../../includes/adminProfile.php';
				include_once '../../includes/bottomAdminD.php';
		}
	}
?>

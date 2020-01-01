<?php
	session_start();
	print_r($_SESSION);
?>



							<?php
								// if (isset($_POST['nav']) == true) {
								// 	if ($_POST['navId'] === "editEmployeeAccount") {
								// 		include 'includes/editEmployeeAccount.php';
								// 	}
								// }
								// else {
								// }
							?>


<?php
	if ($_SESSION) {
		if ($_SESSION['userType'] === "3") {
			header('location:homepageD.php');
		} else {
				include_once '../../includes/topAdminD.php';

				include_once '../../includes/editEmployeeAccount.php';
				include_once '../../includes/bottomAdminD.php';
		}
	}
?>

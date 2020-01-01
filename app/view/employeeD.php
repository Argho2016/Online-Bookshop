<?php
	session_start();
	//print_r($_SESSION);
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
									} elseif ($_SESSION['userType'] === "1") {
										header('location:adminD.php');
									} else{
										?>

											<?php include_once '../../includes/topEmployeeD.php'; ?>


											 <?php include_once '../../includes/bottomEmployeeD.php'; ?>



									<?php
									}
								}
							?>

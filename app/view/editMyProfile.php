<?php
	session_start();
	//print_r($_SESSION);
?>

<?php
	if ($_SESSION) {
		 include '../../includes/topHomepage.php'; 

     include_once '../../includes/editMyProfile.php' ;


		 include '../../includes/bottomHomepage.php'; 

	}
?>

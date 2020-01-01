<?php
include_once("../../core/user_service.php");


if ($_GET['type']=='email') {
  $userList = loadUserList();
} else if ($_GET['type']=='add') {
  $dd = $_GET['dd'];
  $mm = $_GET['mm'];
  $yyyy = $_GET['yyyy'];
  $DOB = $dd.'/'.$mm.'/'.$yyyy;
  $userList = addEmployee($_GET['name'], $_GET['email'], $_GET['password'], $_GET['phoneNumber'], $_GET['address'], $_GET['gender'], $DOB, show_date(), $_GET['flag']);
}
echo json_encode($userList);

?>

<?php
include_once("../../core/user_service.php");

$result = removeUser($_GET['user_id']);

echo json_encode($result);

?>

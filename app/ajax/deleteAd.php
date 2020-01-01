<?php
include_once("../../core/oldBook_service.php");

$result = removeAd($_GET['id']);

echo json_encode($result);

?>

<?php
include_once("../../core/oldBook_service.php");

if ($_GET['type'] == 'underReview') {
  $adsUnderReviewList = loadAdsUnderReviewList($_GET['str']);
  //print_r($adsUnderReviewList);
  echo json_encode($adsUnderReviewList);
}

if ($_GET['type'] == 'pending') {
  $adsPendingList = loadAdsPendingList($_GET['str']);
  //print_r($adsUnderReviewList);
  echo json_encode($adsPendingList);
}


?>

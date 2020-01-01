
<?php
include_once("../../core/oldBook_service.php");
// $type = $_GET['type'];
// if ($type == 'search') {
//   $ads = loadAllPublishedAds($_GET['str']);
// } else if ($type == 'area') {
//   $ads = loadOldBooksByArea($_GET['str']);
// } else if ($type == 'city') {
//   $ads = loadAllPublishedAds($_GET['str']);
// } else {
//   $ads = loadAllPublishedAds($_GET['str']);
// }

$ads = loadAllPublishedAds($_GET['city'],$_GET['area'],$_GET['search'],$_GET['orderBy']);

//$allOldPublishedBooks=loadAllOldPublishedBooksList();

//print_r($ads);
echo json_encode($ads);

?>

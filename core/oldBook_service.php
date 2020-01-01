<?php
include_once("/../data/oldBook_data_access.php");

function addedDate() {
  return date('d/m/y H:iA');
}



// $added_date = show_date();
  //load user by id
  function loadUser($user_id) {
    return getUserById($user_id);
  }

  function addOldBook($city,$area,$title,$description,$phone_number,$price,$image_name,$image_type,$image_tmp_name,$image_error,$image_size,$status){
    global $fileNameNew;
    if ($image_name!=="") {
      $fileExt = explode('.',$image_name);
      $fileActualExt = strtolower(end($fileExt));

      if ($image_error === 0) {
        echo $image_size;
        if ($image_size < 512000000) {
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = '../../uploads/'.$fileNameNew;
          move_uploaded_file($image_tmp_name, $fileDestination);
        } else {
          ?>
          <!-- <script>
            alert("Your file is too big!");
          </script> -->
          <?php
        }
      } else {
        ?>
        <script>
          alert("There was an error uploading file!");
        </script>
        <?php
      }
    }
    $oldBook = array("city"=>$city,"area"=>$area,"title"=>$title,"description"=>$description,"phone_number"=>$phone_number,"price"=>$price,"image_name"=>$fileNameNew, "added_date"=>addedDate(), "user_id"=>$_SESSION['id'], "status"=>$status);
    return addOldBook_DA($oldBook);
  }


    function updateOldBook($city,$area,$title,$description,$phone_number,$price,$image_name,$image_type,$image_tmp_name,$image_error,$image_size,$id,$oldImageName,$status){
      global $fileNameNew;
      $fileNameNew=$oldImageName;
      if ($image_name!=="") {
        $fileExt = explode('.',$image_name);
        $fileActualExt = strtolower(end($fileExt));

        if ($image_error === 0) {
          //echo $image_size;
          if ($image_size < 51200) {
            $fileNameNew = null;
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = '../../uploads/'.$fileNameNew;
            move_uploaded_file($image_tmp_name, $fileDestination);
          } else {
            ?>
            <script>
              alert("Your file is too big!");
            </script>
            <?php
          }
        } else {
          ?>
          <script>
            alert("There was an error uploading file!");
          </script>
          <?php
        }
      }
      $oldBook = array("city"=>$city,"area"=>$area,"title"=>$title,"description"=>$description,"phone_number"=>$phone_number,"price"=>$price,"image_name"=>$fileNameNew, "added_date"=>addedDate(), "user_id"=>$_SESSION['id'], "id"=>$id, "status"=>$status);
      return editOldBook_DA($oldBook);
    }
    //echo "$fileNameNew";



function loadAllOldBooks(){
    return getAllOldBooks();
}

function loadOldBook($id){
    return getOldBookById($id);
}

function loadAllNotices(){
    return getAllNotices();
}

function loadNotices($id){
    return getNoticesById($id);
}

function deleteNotices($oldBook_id) {
  return deleteNotices_DA($oldBook_id);
}

function updateNotices($book_id,$notice1,$notice2,$notice3) {
  // if ($notice1 != "" && $notice2 != "" && $notice3 != "") {
  //   $notices = array("notice"=>$notice1,"notice"=>$notice2,"notice"=>$notice3);
  // } elseif ($notice1 != "" && $notice2 != "") {
  //   $notices = array("notice"=>$notice1,"notice"=>$notice2);
  // } elseif ($notice1 != "" && $notice3 != "") {
  //   $notices = array("notice"=>$notice1,"notice"=>$notice3);
  // } elseif ($notice2 != "" && $notice3 != "") {
  //   $notices = array("notice"=>$notice2,"notice"=>$notice3);
  // } elseif ($notice1 != "") {
  //   $notices = array("notice"=>$notice1);
  // } elseif ($notice2 != "") {
  //   $notices = array("notice"=>$notice2);
  // } elseif ($notice3 != "") {
  //   $notices = array("notice"=>$notice3);
  // } else {
  //   echo "no notice found";
  // }
  $notices = array("notice1"=>$notice1,"notice2"=>$notice2,"notice3"=>$notice3);
  return updateNotices_DA($book_id,$notices);
}

function loadAllOldPublishedBooksList(){
    return getAllOldPublishedBooksList();
}

function loadBookList($this_page_first_result, $results_per_page, $status) {
  return getBookList($this_page_first_result, $results_per_page, $status);
}

function loadAllOldUnpublishedBooksList(){
    return getAllOldUnpublishedBooksList();
}
//for search
// function loadAllPublishedAds($str) {
//   return getAllPublishedAds($str);
// }
function loadAllPublishedAds($city,$area,$search,$orderBy) {
  return getAllPublishedAds($city,$area,$search,$orderBy);
}



//Load All ands currently under review
function loadAdsUnderReviewList($str) {
  $adsUnderReviewList = getUnpublishedBooksList($str);
  return $adsUnderReviewList;
}
//load pending ads
function loadAdsPendingList($str) {
  $adsPendingList = getPendingBooksList($str);
  return $adsPendingList;
}
//filter area my area
function loadOldBooksByArea($s) {
  $oldPublishedBooksList = loadAllOldPublishedBooksList();
  //print_r($oldPublishedBooksList);
  $ads = array();
  // echo "<br><br>";
  // echo count($oldUnpublishedBooksList);
  // echo $oldUnpublishedBooksList[0]['status'];
  $i = 0;
  foreach ($oldPublishedBooksList as $book) {
    if ($book['area'] == $s ) {
      $ads[$i] = $book;
      $i++;
    }
  }

  return $ads;
}

function updateAdStatus($book_id,$status) {
  return updateAdStatus_DA($book_id,$status);
}

function removeAd($id){
    return deleteAd($id);
}


?>

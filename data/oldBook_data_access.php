<?php
include_once("/../lib/db.php");

//load user info by id
function getUserById($user_id){
    $query="SELECT * FROM tbl_users WHERE id=$user_id";
    $result=executeQuery($query);
    $user=null;
    if($result){
        $user=mysqli_fetch_assoc($result);
    }
    return $user;
}

function getBookList($this_page_first_result, $results_per_page, $status) {
  $query = "SELECT * FROM tbl_oldBooks WHERE status='$status' LIMIT $this_page_first_result, $results_per_page";
  $result = executeQuery($query);
  $arr = array();
  if($result){
     for ($i=0; $row =mysqli_fetch_array($result) ; $i++) {
         $arr[$i]=$row;
     }
  }
  return $arr;
}

function addOldBook_DA($oldBook){
    $query="INSERT INTO tbl_oldBooks(city, area, title, description, phone_number, price, image_name, added_date, user_id, status)
                              VALUES('$oldBook[city]','$oldBook[area]','$oldBook[title]','$oldBook[description]','$oldBook[phone_number]','$oldBook[price]','$oldBook[image_name]','$oldBook[added_date]','$oldBook[user_id]','$oldBook[status]')";
    return executeNonQuery($query);
}

function editOldBook_DA($oldBook){
    $query="UPDATE tbl_oldBooks SET city='$oldBook[city]', area='$oldBook[area]', title='$oldBook[title]', description='$oldBook[description]', phone_number='$oldBook[phone_number]', price='$oldBook[price]', image_name='$oldBook[image_name]', added_date='$oldBook[added_date]', user_id='$oldBook[user_id]',
                                    status='$oldBook[status]' WHERE id='$oldBook[id]' ";
    return executeNonQuery($query);
}

function getAllOldBooks(){
    $query="SELECT * FROM tbl_oldBooks";
    $result=executeQuery($query);
    $oldBooksList=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
           $oldBooksList[$i]=$row;
       }
    }
    return $oldBooksList;
}

function getOldBookById($id){
    $query="SELECT * FROM tbl_oldBooks WHERE id=$id";
    $result=executeQuery($query);
    $oldBook=null;
    if($result){
        $oldBook=mysqli_fetch_assoc($result);
    }
    return $oldBook;
}

function getAllNotices(){
    $query="SELECT * FROM tbl_notices";
    $result=executeQuery($query);
    $noticesList=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
           $noticesList[$i]=$row;
       }
    }
    return $noticesList;
}

function deleteNotices_DA($oldBook_id) {
  $query="DELETE FROM tbl_notices WHERE oldBook_id=$oldBook_id";
  return executeNonQuery($query);
}

function getNoticesById($id){
    $query="SELECT * FROM tbl_notices WHERE oldBook_id=$id";
    $result=executeQuery($query);
    $notices=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
           $notices[$i]=$row;
       }
    }
    return $notices;
}

function updateNotices_DA($book_id,$notices){
  $query="INSERT INTO tbl_notices(notice1,notice2,notice3,oldBook_id)
                 VALUES('$notices[notice1]','$notices[notice2]','$notices[notice3]','$book_id')";
  return executeNonQuery($query);
}

function getAllOldPublishedBooksList(){
    $query="SELECT * FROM tbl_oldBooks WHERE status='reviewed'";
    $result=executeQuery($query);
    $oldPublishedBooksList=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
           $oldPublishedBooksList[$i]=$row;
       }
    }
    return $oldPublishedBooksList;
}

function getAllOldUnpublishedBooksList(){
    $query="SELECT * FROM tbl_oldBooks WHERE (status='underReview' OR status='pending' OR status='edited')";
    $result=executeQuery($query);
    $userList=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
           $oldUnpublishedBooksList[$i]=$row;
       }
    }
    return $oldUnpublishedBooksList;
}
//ads underReview with search
function getUnpublishedBooksList($str) {
  $query="SELECT * FROM tbl_oldBooks WHERE (status='underReview' OR status='edited') AND (title LIKE '%".$str."%' OR description LIKE '%".$str."%' OR price LIKE '%".$str."%')";
  $result=executeQuery($query);
  $adsUnderReviewList=array();
  if($result){
     for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
         $adsUnderReviewList[$i]=$row;
     }
  }
  return $adsUnderReviewList;
}

//ads pending with search
function getPendingBooksList($str) {
  $query="SELECT * FROM tbl_oldBooks WHERE (status='pending') AND (title LIKE '%".$str."%' OR description LIKE '%".$str."%' OR price LIKE '%".$str."%')";
  $result=executeQuery($query);
  $adsPendingList=array();
  if($result){
     for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) {
         $adsPendingList[$i]=$row;
     }
  }
  return $adsPendingList;
}
//for search
// function getAllPublishedAds2($str){
//   $query="SELECT * FROM tbl_oldBooks WHERE status='reviewed' AND (title LIKE '".$_GET['str']."%' || description LIKE '".$_GET['str']."%' || city LIKE '".$_GET['str']."%' || area LIKE '".$_GET['str']."%')";
//   $result = executeQuery($query);
//   $ads = array();
//   if ($result) {
//     $i=0;
//     while($row=mysqli_fetch_array($result)){
//         $ads[$i]=$row;
//         $i++;
//     }
//   }
//   return $ads;
// }
function getAllPublishedAds($city,$area,$search,$orderBy){
  $query="SELECT * FROM tbl_oldBooks WHERE status='reviewed' AND (title LIKE '%".$search."%' OR description LIKE '%".$search."%') AND city LIKE '%".$city."%' AND area LIKE '%".$area."%' ORDER BY $orderBy";
  $result = executeQuery($query);
  $ads = array();
  if ($result) {
    $i=0;
    while($row=mysqli_fetch_array($result)){
        $ads[$i]=$row;
        $i++;
    }
  }
  return $ads;
}

function updateAdStatus_DA($book_id,$status) {
  $query="UPDATE tbl_oldBooks SET status='$status' WHERE id='$book_id'";
  $result = executeNonQuery($query);
  return $result;
}

function deleteAd($id){
    $query="DELETE FROM tbl_oldBooks WHERE id=$id";
    return executeNonQuery($query);
}

?>

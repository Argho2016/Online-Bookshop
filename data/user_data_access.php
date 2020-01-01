<?php
include_once("/../lib/db.php");
?>

<?php

function getLoginValidation($email, $pass) {
  $query="SELECT * FROM tbl_users WHERE email='$email' AND password='$pass'";
  $result = executeQuery($query);

  return $result;
}

function getUserList() {
  $query="SELECT * FROM tbl_users";
  $result=executeQuery($query);
  $userList=array();
  if($result){
     for ($i=0; $row =mysqli_fetch_array($result) ; $i++) {
         $userList[$i]=$row;
     }
  }
  return $userList;
}

function getCustomerList($this_page_first_result, $results_per_page, $flag) {
  $query = "SELECT * from tbl_users WHERE flag=$flag LIMIT $this_page_first_result, $results_per_page";
  $result = executeQuery($query);
  $arr = array();
  if($result){
     for ($i=0; $row =mysqli_fetch_array($result) ; $i++) {
         $arr[$i]=$row;
     }
  }
  return $arr;
}

function deleteUser($id){
    $query="DELETE FROM tbl_users WHERE id=$id";
    return executeNonQuery($query);
}

function addEmployee_DA($user) {
  $query = "INSERT INTO tbl_users(name, email, password,	phone_number,	address, gender, date_of_birth, added_date, flag) VALUES ('$user[name]', '$user[email]', '$user[pass]', '$user[phoneNumber]', '$user[address]', '$user[gender]', '$user[DOB]', '$user[added_date]', '$user[flag]' )";
  return executeNonQuery($query);
}
function updateMyProfile_DA($user, $id) {
  $query = "UPDATE tbl_users SET name='$user[name]', password='$user[pass]',	phone_number='$user[phoneNumber]',	address='$user[address]', modified_date='$user[modified_date]' WHERE id=$id";
  return executeNonQuery($query);
}

function getUserById($id){
    $query="SELECT * FROM tbl_users WHERE id=$id";
    $result=executeQuery($query);
    $user=null;
    if($result){
        $user=mysqli_fetch_assoc($result);
    }
    return $user;
}

?>

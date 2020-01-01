  <?php include_once("/../data/user_data_access.php"); ?>

<?php

function addedDate() {
  return date('d/m/y H:iA');
}

function loginValidation($email, $pass) {
  return getLoginValidation($email, $pass);
}

function loadUserList() {
  return getUserList();
}

function customerCount($flag) {
  $userList = loadUserList();
  $c = 0;
  for ($i=0; $i < count($userList) ; $i++) {
    if ($userList[$i]['flag'] == $flag) {
      $c++;
    }
  }
  echo "$c";
  return $c;
}

function loadCustomerList($this_page_first_result, $results_per_page, $flag) {
  return getCustomerList($this_page_first_result, $results_per_page, $flag);
}

function addEmployee($name, $email, $pass, $phoneNumber, $address, $gender, $DOB, $date, $flag) {
  $user = array("name"=>$name,"email"=>$email,"pass"=>$pass,"phoneNumber"=>$phoneNumber,"address"=>$address,"gender"=>$gender,"DOB"=>$DOB,"added_date"=>$date,"flag"=>$flag);
  return addEmployee_DA($user);
}

function updateMyProfile($name, $pass, $phoneNumber, $address,  $date, $id) {
  $user = array("name"=>$name, "pass"=>$pass,"phoneNumber"=>$phoneNumber,"address"=>$address, "modified_date"=>$date);
  return updateMyProfile_DA($user, $id);
}

function loadUserById($id) {
  return getUserById($id);
}

function removeUser($id){
    return deleteUser($id);
}



?>

<?php
  if (isset($_POST['nav']) == true) {
    if ($_POST['navId'] === "employeeList") {
      include_once "includes/employeeList.php";
    } elseif ($_POST['navId'] === "addEmployee") {
      include_once "includes/addEmployee.php";
    } elseif ($_POST['navId'] === 'loginPage' ) {
      include_once "includes/loginPage.php";
    } elseif ($_POST['navId'] === 'customerRegistration') {
      include_once "includes/addCustomer.php";
    }
  }
  else {
    
  }


?>

<?php
  if (isset($_POST['deleteEmployee'])) {
    $deleleEmployee = $_POST['deleteID'];
    $conn = mysqli_connect("localhost", "root", "", "project") or die("Connection Error: " . mysqli_connect_error(). "<br/>");
    $sql = "DELETE FROM tbl_users WHERE id=$deleleEmployee";
    if (mysqli_query($conn, $sql)) {
      header("location:../adminD.php");
    }
    else {
      echo "Unable to delete.. Error: " . mysqli_error($conn);
    }
  }
 ?>

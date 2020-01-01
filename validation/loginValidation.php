<?php
  session_start();
?>

<?php
  $email = $_POST['email'];
  $password = $_POST['password'];
  //echo $ppassword;
  //echo $email;
  $conn=mysqli_connect('localhost', 'root', '', 'project') or die('Connection error: ' . mysqli_connect_error() . '<br/>');
  $sql="SELECT * FROM tbl_users WHERE email = '$email' AND  password = '$password'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)>0) {
    $rows = mysqli_fetch_array($result);

    session_unset();
    $_SESSION['id'] = $rows['id'];
    $_SESSION['userEmail'] = $rows['email'];
    $_SESSION['userType'] = $rows['flag'];
    $_SESSION['userName'] = $rows['name'];

    print_r($_SESSION);
    if ($_SESSION['userType'] === '1') {
      header('location:../app/view/adminD.php');
    } elseif ($_SESSION['userType'] === '2') {
      header('location:../app/view/employeeD.php');
    } elseif ($_SESSION['userType'] === '3') {
      header('location:../app/view/homepageD.php');
    }

  }
  else {
    print_r($_SESSION);
    echo "<script>
            window.alert('Wrong Email and Password...');

          </script>";



  }

?>

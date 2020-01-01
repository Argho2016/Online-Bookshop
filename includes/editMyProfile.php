<script src="../../js/editMyProfile.js"; > </script>

<?php
include_once("../../core/user_service.php");

$userList = loadUserById($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $name = $_POST['name'];
  $pass = $_POST['pass'];
  $address = $_POST['address'];
  $phoneNumber = $_POST['phoneNumber'];
  $result = updateMyProfile($name, $pass, $phoneNumber, $address, addedDate(), $_SESSION['id']);
  // if ($result) {
    ?>
    <script>
      alert("Successfully Edited");
    </script>
    <?php
  // }
}


?>

<div class="tbl_details">
  <table >
    <tr>
      <td colspan="20">Update Profile</td>
    </tr>
  </table>
</div>
<!-- onsubmit="return validation()" -->
<form class="emp-registration" action="" method="POST"  onsubmit="return validation()" >
  <fieldset>
    <legend align="center">My Info</legend>
    <table align="center">
      <tr>

        <td width="200">Name</td>
        <td>:<input type="text" id="name" name="name" placeholder="Enter name..." value="<?=$userList['name']; ?>"/></td>
        <td rowspan="7";>
          <fieldset style="background-color: hsl(0, 0%, 94%); width:250px; height: 150px;">
            <p>Issues:</p>
            <label id="comment"></label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:<input type="password" id="password" name="pass" placeholder="Enter password..." value="<?=$userList['password']; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>:<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password..." value="" /></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>:<input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number..." value="<?=$userList['phone_number']; ?>"> </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>

      <tr>
        <td>Address</td>
        <td>:<input type="text" id="address" name="address" placeholder="Enter address" value="<?=$userList['address']; ?>"> </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="update"  id='update' value="Update">
        </td>
      </tr>
    </table>
  </fieldset>
</form>

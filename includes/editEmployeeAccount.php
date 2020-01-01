<div class="tbl_details">
  <table >
    <tr>
      <td colspan="20">Edit Account</td>
    </tr>
  </table>
</div>

<form class="emp-edit" action="validation/editEmployeeAccountValidation.php" method="post">
  <fieldset>
    <legend align="center">Edit Profile</legend>
    <table align="center">
      <tr>
        <td width="50%">Name</td>
        <td>:<input type="text" name="name" placeholder="Enter name..." /></td>
      </tr>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:<input type="password" name="password" placeholder="Enter password..." /></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>:<input type="password" name="confirmPassword" placeholder="Enter password..." /></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>:<input type="phoneNumber" name="phoneNumber" placeholder="Enter Phone number..." /></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>: <input type="text" name="address"  placeholder="Enter address..."> </td>
      </tr>

      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="editEmployeeAccount" value="Edit">
          &nbsp
          <input type="submit" name="reset" value="Reset">
          &nbsp
        </td>
      </tr>
    </table>
  </fieldset>
</form>


<?php var_dump($_SERVER['PHP_SELF']); ?>

<script src="../../js/addEmployeeValidaton.js"; > </script>

<?php
include_once("../../core/user_service.php");

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $confirmPassword = $_POST['confirmPassword'];
  $phoneNumber = $_POST['phoneNumber'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $dd = $_POST['dd'];
  $mm = $_POST['mm'];
  $yyyy = $_POST['yyyy'];

  $DOB = $dd.'/'.$mm.'/'.$yyyy;
  $result = addEmployee($name, $email, $pass, $phoneNumber, $address, $gender, $DOB, addedDate(), '3');
  // if ($result) {
    ?>
    <script>
      alert("Successfully Added");
      window.location.href="<?='loginPageD.php?' ?>";
    </script>
    <?php
  // }
}


?>

<div class="tbl_details">
  <table >
    <tr>
      <td colspan="20">Add Employee</td>
    </tr>
  </table>
</div>
<!-- onsubmit="return validation()" -->
<form class="emp-registration" action="" method="POST"  onsubmit="return validation()" >
  <fieldset>
    <legend align="center">Employee Info</legend>
    <table align="center">
      <tr>

        <td width="200">Name</td>
        <td>:<input type="text" id="name" name="name" placeholder="Enter name..."/></td>
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
        <td>Email</td>
        <td>:<input type="text" id="email" name="email" onchange="getUserList(this)" placeholder="Enter emaail..." /></td>
      </tr>

      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:<input type="password" id="password" name="pass" placeholder="Enter password..."/></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>:<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password..."/></td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>:<input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number..."> </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>

      <tr>
        <td>Address</td>
        <td>:<input type="text" id="address" name="address" placeholder="Enter address"> </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="10">
          <fieldset >
            <legend >Gender</legend>
            <input type="radio" id='r1' name="gender" value="male"/>Male
            <input type="radio" id='r2' name="gender" value="female"/>Female
            <input type="radio" id='r3' name="gender" value="other"/>Other
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="10">
          <fieldset>
            <legend>Date of Birth</legend>
            <table>
              <tr>
                <td>
                  <input type="text" name="dd" id="dd" />
                </td>
                <td>/</td>
                <td>
                  <input type="text" name="mm" id="mm" />
                </td>
                <td>/</td>
                <td>
                  <input type="text" name="yyyy" id="yyyy" />
                </td>
                <td><?php echo "<i>(dd/mm/yyyy)</i>"; ?></td>
              </tr>
            </table>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr/></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="add"  id='add' value="Add">
        </td>
      </tr>
    </table>
  </fieldset>
</form>

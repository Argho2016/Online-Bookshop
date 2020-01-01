<link rel="stylesheet" href="../../css/showProfile.css">
<script src="../../js/user.js" charset="utf-8"></script>

<?php
include_once("../../core/user_service.php");
$user=loadUserById($_SESSION['id']);
// print_r($user);
// echo "<br/>";
// print_r($oldBook);
?>

<div class="showProfile-background">
  <table class="showProfile-table">
    <tr>
      <td colspan="50">
        <fieldset>
          <legend>Details</legend>
          <label id="name"><?=$user['name'];?></label>
          <p>Since: <?=$user['added_date'];?></p>
          <hr>
          <hr>
          Address: <?=$user['address'];?>
          <hr>
          Gender: <?=$user['gender'];?>
          <hr>
          DOB: <?=$user['date_of_birth'];?>
          <hr>
          Phone number: <?=$user['phone_number'];?>
          <hr>
          Email: <?=$user['email'];?>
          <hr>
        </fieldset>
        <fieldset>
          <a href="editMyProfile.php?str=<?php $_SESSION['id'] ?>">Edit</a> | <a href="#" onclick="exeDelMyProfile(<?=$user['id'];?>)">Delete</a> your account
        </fieldset>
      </td>
    </tr>





  <!-- <div class="showProfile-background">
      <div class="showProfile-table">
        <p>title</p>
        <img src="../../img/book1.jpg"  alt="No picture uploaded" >

      </div>
  </div> -->
  </table>
</div>

<link rel="stylesheet" href="../../css/showOldBook.css">

<?php
include_once("../../core/oldBook_service.php");
$oldBook=loadOldBook($_GET['id']);
$user=loadUser($oldBook['user_id']);
// print_r($user);
// echo "<br/>";
// print_r($oldBook);
?>

<div class="showOldBook-background">
  <table class="showOldBook-table">
    <tr>
      <td colspan="50">
        <fieldset>
          <legend>Title</legend>
          <label id="title"><?=$oldBook['title']  ?></label>
        </fieldset>
      </td>
    </tr>
    <tr width="200px">
      <!-- <td valign='top'> <p>price</p> </td> -->

      <td>
        <fieldset >
          For sale by <?=$user['name'] ?> <?=$oldBook['added_date'] ?> <?=$oldBook['area'] ?>, <?=$oldBook['city'] ?>
        </fieldset>
      </td>
      <td rowspan="2" width="1%">
        <fieldset>
          <img src="../../uploads/<?=$oldBook['image_name'] ?>"  alt="No picture uploaded" >
        </fieldset>
      </td>
    </tr>
    <tr>
      <td>
        <fieldset>
          <legend>Price</legend>
          <?=$oldBook['price'] ?> TK.
        </fieldset>
      </td>
    </tr>
    <tr>
      <td>
        <fieldset>
          <legend>Description</legend>
          <?=$oldBook['description'] ?>
        </fieldset>
      </td>
    </tr>
      <td>
          <fieldset class="showOldBook-fieldset">
            <legend>Contact</legend>
            <hr>
            <fieldset>
              <legend>phone</legend>
              <?=$oldBook['phone_number'] ?>
            </fieldset>
            <fieldset>
              <legend>email</legend>
              <?=$user['email']; ?>
            </fieldset>
          </fieldset>
      </td>
    </tr>



  <!-- <div class="showOldBook-background">
      <div class="showOldBook-table">
        <p>title</p>
        <img src="../../img/book1.jpg"  alt="No picture uploaded" >

      </div>
  </div> -->
  </table>
</div>

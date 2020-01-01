<link rel="stylesheet" href="../../css/postAdRegistration.css">
<script src="../../js/post.js" > </script>


<?php
include_once("../../core/oldBook_service.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $status="underReview";
    $result=addOldBook($_POST['city'],$_POST['area'],$_POST['title'],$_POST['description'],$_POST['phone_number'],$_POST['price'],$_FILES['image']['name'],$_FILES['image']['type'],$_FILES['image']['tmp_name'],
                        $_FILES['image']['error'],$_FILES['image']['size'],$status);
    if($result){
      ?>
      <script>
        alert("Successfully Added");
        window.location.href="<?='myAds.php?' ?>";
      </script>
      <?php
    }
}
?>



  <form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  enctype="multipart/form-data" onsubmit="return validation()" >
    <table class="post-table">
      <tr>
        <td>Sell an item</td>
      </tr>
      <tr>
        <td> <hr/> </td>
      </tr>
      <tr>
        <td>
          <select id="city" onchange="loadArea()" name="city">
              <option>--Please select City--</option>
              <option>Dhaka</option>
              <option>Chittagong</option>
          </select>

          <select id="area" name="area">
              <option>--Please select Area--</option>
          </select>

          <label id="jCA"></label>

        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <!-- add  photo -->
      <tr>
        <td class="img" colspan="3">

          <!-- <form class='' action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" >
            <input type="file" name="userfile[]" value="" multiple="" >
            <input type="submit" name="submit" value="Upload">
          </form> -->
          <input id="image" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" multiple="" onchange="imgCount()" />
          <p id="show-image"></p>



        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td>
          <input type="text" id="title" name="title" placeholder="Title" value="">
          <label id="jTitle"></label>
        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td>
          <input type="text" id="description" placeholder="Description" name="description" class="" value=""> <label></label>
          <label id="jDescription"></label>
        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="price" id="price" placeholder="Price" value="">
          <label id="jPrice"></label>
        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="phone_number" id="phone_number" placeholder="Enter phone number if you wish to contacted via phone" value="">
          <label id="jphone_number"></label>
        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td>
          Email: <?php echo $_SESSION['userEmail']; ?>
        </td>
      </tr>
      <tr>
        <td> <hr> </td>
      </tr>
      <tr>
        <td> <input type="submit" name="post" value="Post Ad"> </td>
      </tr>



    </table>
  </form>



<!--
    <div class="">
      <form>
        <input type="text" placeholder="Book Name" class="bookName" name="oldBookName"><br>
        <input type="text" placeholder="Writer Name" class="oldWriterName" name="oldWriterName"><br>
        <input type="text" placeholder="Publication" class="oldPublication" name="oldPublication"><br>
        <input type="text" placeholder="Subject" class="oldSubject" name="oldSubject"><br>
        <input type="text" placeholder="Price" class="price" name="oldPrice"><br>
        <input type="text" placeholder="Mobile No" class="oldMobile" name="oldMobile"><br>
        <input type="submit" value="Post Ad" class="adPostButton">
      </form>
    </div> -->

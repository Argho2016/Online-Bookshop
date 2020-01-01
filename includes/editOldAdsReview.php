<link rel="stylesheet" href="../../css/postAdRegistration.css">
<script src="../../js/post.js" > </script>

<?php
include_once("../../core/oldBook_service.php");
//var_dump($_GET['id']);
//$oldBook=loadOldBook($_GET['id']);
$status="pending";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['giveNotice'])) {
      $oldBook=loadOldBook($_GET['id']);
      $result=updateOldBook($_POST['city'],$_POST['area'],$_POST['title'],$_POST['description'],$_POST['phone_number'],$_POST['price'],$_FILES['image']['name'],$_FILES['image']['type'],$_FILES['image']['tmp_name'],
                            $_FILES['image']['error'],$_FILES['image']['size'],$_GET['id'],$oldBook['image_name'],$status);
      $result2 = updateNotices($_GET['id'],$_POST['notice1'],$_POST['notice2'],$_POST['notice3']);
      if($result){
        //header('Location:myAds.php.php');
        ?>
        <script>
          alert("Successfully added notice...");
          window.location.href="<?='oldAdsReview.php' ?>";
        </script>
        <?php
      }
    } elseif (isset($_POST['publishAd'])) {
      $book_id = $_GET['id'];
      $status = 'reviewed';
      $reslut = updateAdStatus($book_id,$status);
      if ($reslut) {
        deleteNotices($book_id);
        ?>
        <script type="text/javascript">
          alert("Published Successfully...");
          window.location.href="<?='oldAdsReview.php' ?>";
        </script>
        <?php
      }
    }
}
$oldBook=loadOldBook($_GET['id']);
?>


<form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"  enctype="multipart/form-data" onsubmit="return validation()" >
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
            <option><?=$oldBook['city'] ?></option>
            <option>--Please select City--</option>
            <option>Dhaka</option>
            <option>Chittagong</option>
        </select>

        <select id="area" name="area">
            <option><?=$oldBook['area'] ?></option>
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
        <p>Old Image</p>
        <img src="../../uploads/<?=$oldBook['image_name'] ?>" alt="">
        <p>Select new image</p>
        <input id="image" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" multiple="" onchange="imgCount()" />
        <p id="show-image"></p>



      </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="text" id="title" name="title" placeholder="Title" value="<?=$oldBook['title'] ?>">
        <label id="jTitle"></label>
      </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="text" id="description" placeholder="Description" name="description" class="" value="<?=$oldBook['description'] ?>"> <label></label>
        <label id="jDescription"></label>
      </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="price" id="price" placeholder="Price" value="<?=$oldBook['price'] ?>">
        <label id="jPrice"></label>
      </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="phone_number" id="phone_number" placeholder="Enter phone number if you wish to contacted via phone" value="<?=$oldBook['phone_number'] ?>">
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
      <td> <hr> </td>
    </tr>
    <tr>
      <td> Add notices </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="notice1" value="" placeholder="notice1">
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="notice2" value="" placeholder="notice2">
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="notice3" value="" placeholder="notice3">
      </td>
    </tr>
    <tr>
      <td> <hr> </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="giveNotice" value="Give notice">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="publishAd" value="Publish Ad.">
      </td>
    </tr>
  </table>
</form>

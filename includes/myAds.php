<link rel="stylesheet" href="../../css/myAds.css">
<script src="../../js/deleteAd.js" charset="utf-8"></script>

<?php
include_once("../../core/oldBook_service.php");
//shows error message
// if (isset($_GET['report'])) {
//   reportOldBook($_GET['report']);
// }
$oldBooksList=loadAllOldBooks();
$noticesList=loadAllNotices();

$oldPublishedBooksList=loadAllOldPublishedBooksList();
$oldUnpublishedBooksList=loadAllOldUnpublishedBooksList();

// print_r($oldPublishedBooksList);
// echo "<br><br>";
?>

  <table class="myAds-table" border="1px">
    <tr>
      <td colspan="50">Ads under review</td>
    </tr>
    <tr >
      <td colspan='50'> <hr/> </td>
    </tr>
    <?php
      foreach ($oldUnpublishedBooksList as $oldUnpublishedBooks) {
        ?>
        <div class="">
          <tr>
            <td colspan="50"> <hr> </td>
          </tr>
          <tr>
            <td colspan="50">
              <div class="myAds-notice">
                <?php
                $notices=loadNotices($oldUnpublishedBooks['id']);
                // /print_r($notices);
                //echo count($notices);
                if (count($notices) != 0) {
                  echo "<b>Reason:</b> You ad has been rejected for the reason provided below.";
                }
                foreach ($notices as $notice) {
                ?>
                  <?php if ($notice['notice1'] != ''): ?>
                    <ul>
                      <li>
                        <?=$notice['notice1'] ?>
                      </li>
                    </ul>
                  <?php endif; ?>
                  <?php if ($notice['notice2'] != ''): ?>
                    <ul>
                      <li>
                        <?=$notice['notice2'] ?>
                      </li>
                    </ul>
                  <?php endif; ?>
                  <?php if ($notice['notice3'] != ''): ?>
                    <ul>
                      <li>
                        <?=$notice['notice3'] ?>
                      </li>
                    </ul>
                  <?php endif; ?>
                <?php
                }
                ?>
              </div>
            </td>


          </tr>

          <tr>
            <td colspan="4" width="120"> <img src="../../uploads/<?=$oldUnpublishedBooks['image_name'] ?>" alt="" width="120" height="160"> </td>
            <td colspan="4" valign="top">
              <a href="showOldBook.php?id=<?=$oldUnpublishedBooks['id'] ?>"><?=$oldUnpublishedBooks['title'] ?></a>
              <p class="info"><?=$oldUnpublishedBooks['city'] ?></p>
              <p class="info"> <b> <?=$oldUnpublishedBooks['price'] ?> </b> </p>
            </td>
            <?php
              if (count($notices) != 0) {
                ?>
                <td colspan="4" width="1%">
                  <a href="editMyAd.php?id=<?=$oldUnpublishedBooks['id'] ?>">Edit</a>|<a onclick="exeDelMyAd(<?=$oldUnpublishedBooks['id'] ?>)" href="#">Delete</a>
                </td>
                <?php
              }
            ?>
          </tr>
        </div>
        <?php
      }
    ?>

    <tr>
      <td colspan="50"> <hr> </td>
    </tr>
    <tr>
      <td colspan="50">Published Ads</td>
    </tr>
    <tr >
      <td colspan='50'> <hr/><br> </td>
    </tr>
    <?php
      foreach ($oldPublishedBooksList as $oldPublishedBooks) {
    ?>
    <tr>
            <td width="120"> <img src="../../uploads/<?=$oldPublishedBooks['image_name'] ?>" alt="" width="120" height="160"> </td>
            <td colspan="50" valign="top">
              <!-- <input type="submit" id="myAds-title" name=" " value="<?=$oldPublishedBooks['title'] ?>"> -->
              <a href="showOldBook.php?id=<?=$oldPublishedBooks['id'] ?>"><?=$oldPublishedBooks['title'] ?></a>
              <p class="info"><?=$oldPublishedBooks['city'] ?></p>
              <p class="info"> <b> <?=$oldPublishedBooks['price'] ?> </b> </p>
              <a style="float:right;" onclick="exeDelMyAd(<?=$oldPublishedBooks['id'] ?>)" href="#"> | Delete </a><a style="float:right;" href="editMyAd.php?id=<?=$oldUnpublishedBooks['id'] ?>"> Edit</a>
            </td>
            <?php
          }
         ?>
    </tr>

  </table>
  <!-- <div class="content">
    <img src="../../img/book1.jpg" alt="" width="120" height="160">
    <label class="info">book1</label>
    <label class="info">book1</label>
  </div> -->

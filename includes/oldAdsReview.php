<link rel="stylesheet" href="../../css/oldAdsReview.css">
<script src="../../js/oldBooksReview.js" >
</script>
<?php
include_once("../../core/oldBook_service.php");
// $adsUnderReviewList = loadAdsUnderReviewList($_GET['str']);
// print_r($adsUnderReviewList);

?>

<fieldset>
  <b style="margin-left: 42%;">Ads under review</b>
</fieldset>

<div class="oldAdsReview-background">
  <table class="oldAdsReview-table">
    <td>
      <fieldset>
        <input type="text" id="search-underReview" onkeyup="loadAdsUnderReview()" class="oldAdsReview-search-str" name="search" placeholder="What are you searching for?" value="">
      </fieldset>
    </td>
  </table>
  <table class="oldAdsReview-table" id='ads-underReview'>

  </table>
</div>

<div class="oldAdsReview-background">
  <table class="oldAdsReview-table">
    <tr>
      <th id="pageNav-underReview">

      </th>
    </tr>
  </table>
</div>


<fieldset>
  <b style="margin-left: 42%;">Pending Ads</b>
</fieldset>
<div class="oldAdsReview-background">
  <table class="oldAdsReview-table">
    <td>
      <fieldset>
        <input type="text" id="search-pending" onkeyup="loadAdsPending()" class="oldAdsReview-search-str" name="search2" placeholder="What are you searching for?" value="">
      </fieldset>
    </td>
  </table>
  <table class="oldAdsReview-table" id='ads-pending'>

    <!-- <tr>
      <td valign='top' height='150px' width='100%'>
        <fieldset>
          <a href='#'><img id='image' src='../../img/book1.jpg' alt='image unavailable' style='float:left; width:120px; height:150px;'></a>
          <a href='showOldBook.php?id=' id='title' style='padding-left:10px;font-size:20px;'>title</a>
          <div id='city' style='margin-left:130px; margin-top:30px'>"+pendingAds[i].city+"</div>
          <div id='price' style='margin-left:130px; margin-top:10px'>"+pendingAds[i].price+"</div>
          <div style='float:right; margin-top:30px'>"+pendingAds[i].added_date+"</div>
          <div style='float:right; margin-top:-100px; margin-right:-125px;'>status</div>
        </fieldset>
      </td>
      <td>
        <fieldset>
          <a href='editOldAdsReview.php?id="+pendingAds[i].id+"'>edit</a>|<a href='#'>Delete</a></fieldset>
        </td>
      </tr> -->

  </table>
</div>
<div class="oldAdsReview-background">
  <table class="oldAdsReview-table">
    <tr>
      <th id="pageNav-pending">

      </th>
    </tr>
  </table>
</div>


<script type="text/javascript">
  window.onload = function() {
   loadAdsUnderReview();
   loadAdsPending();
  }
</script>

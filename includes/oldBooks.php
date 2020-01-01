<link rel="stylesheet" href="../../css/oldBooks.css">

<script src="../../js/oldBooks.js" >
</script>

<?php
include_once("../../core/oldBook_service.php");
  // $allOldPublishedBooks=loadAllOldPublishedBooksList();
//$ads = loadOldBooksByArea('mirpur');
//print_r($ads);

?>




<script type="text/javascript">

</script>
<div class="oldBooks-background" >
  <table class="oldBooks-table">
    <tr>
      <td colspan="50">
        <fieldset>
          <form class="oldBooks-search-input" action="" method="get">
            <input type="text" id="search" onkeyup="loadAllBooks(this.value, this)" class="oldBooks-search-str" name="search" placeholder="What are you searching for?" value="">
          </form>
        </fieldset>
      </td>
    </tr>

    <tr>
      <td rowspan=""  valign="top">
        <fieldset style="float:left;">
          Location:
          <hr>
          <select id="city" onchange="loadArea(this.value, this)" placeholder="select" name="city">
              <option value="">--Please select City--</option>
              <option>Dhaka</option>
              <option>Chittagong</option>
          </select>

          <select id="area" name="area" onchange="loadAllBooks(this.value, this)">
              <option value="">--Please select Area--</option>
          </select>
        </fieldset>
        <fieldset style="float:left;">
          Sort results by:
          <hr>
          <select name="" id='order-by' onchange="loadAllBooks(this.value, this)">
            <option>Date: Newest on the top</option>
            <option>Date: Oldest on the top</option>
            <option>Price: Hight to low</option>
            <option>Price: Low to high</option>
          </select>
        </fieldset>
      </td>
    </table>

    </div>
    <div class="oldBooks-background">
      <table class="oldBooks-table" id='oldBooks_list'>
        <!-- <tr>
          <td>
            <fieldset>
              <a href='#'><img id='image' src='../../img/book1.jpg' alt="" style="float:left; width:120px; height:150px;"></a>
              <a href='#' id='title' style="padding-left:10px;font-size:20px;">Title</a>

              <div id='city' style='margin-left:130px; margin-top:30px'>city</div>
              <div id='price' style='margin-left:130px; margin-top:10px'>price</div>

            </fieldset>
          </td>
        </tr>

        <tr>
          <td>
            <fieldset>
              <a href='#'><img id='image' src='../../img/book1.jpg' alt='' style='float:left; width:120px; height:150px;'></a>
              <a href='#' id='title' style='padding-left:10px;font-size:20px;'>Title</a>

              <div id='city' style='margin-left:130px; margin-top:30px'>city</div>
              <div id='price' style='margin-left:130px; margin-top:10px'>price</div>

            </fieldset>
          </td>
        </tr> -->
      </table>
    </div>

    <div class="oldBooks-background">
    <table class="oldBooks-table" >
      <tr>
        <th id="pageNav">

        </th>
      </tr>
    </table>


</div>
<script type="text/javascript">
  window.onload = function() {
   loadAllBooks('', '');
  }
</script>

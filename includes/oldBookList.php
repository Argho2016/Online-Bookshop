<link rel="stylesheet" href="../../css/customerList.css">
<script src="../../js/deleteAd.js" charset="utf-8"></script>
<?php
include_once("../../core/oldBook_service.php");

$results_per_page = 10;
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$status = 'reviewed';
$this_page_first_result = ($page-1)*$results_per_page;
$number_of_results = count(loadAllOldUnpublishedBooksList());

$number_of_pages = ceil($number_of_results/$results_per_page);
$this_page_first_result = ($page-1)*$results_per_page;
$bookList = loadBookList($this_page_first_result, $results_per_page, $status);
//print_r($custList);
?>

<fieldset>
  <b style="margin-left: 42%;">Ads. List</b>
</fieldset>

<div class="customerList-background">
  <table class="customerList-table" style="border-collapse: collapse;">
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>description</th>
      <th>Phone Number</th>
      <th>Price</th>
      <th>City</th>
      <th>Area</th>
      <th>Image</th>
      <th>Added Date</th>
      <th>Operation</th>
    </tr>
    <?php foreach ($bookList as $list): ?>
      <tr>
        <td><?=$list['id'];?></td>
        <td><?=$list['title'];?></td>
        <td><?=$list['description'];?></td>
        <td><?=$list['phone_number'];?></td>
        <td><?=$list['price'];?></td>
        <td><?=$list['city'];?></td>
        <td><?=$list['area'];?></td>
        <td><img width="40px" height="50px" src="../../uploads/<?=$list['image_name'];?>"></td>
        <td><?=$list['added_date'];?></td>
        <td>
          <fieldset> <button type="button" name="button" onclick="exeDel(<?=$list['id'];?>)">DELETE</button> </fieldset>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<script type="text/javascript">

</script>

<div class="customerList-background">
  <table class="customerList-table">
    <tr>
      <th id="pageNav-underReview">
        <?php
        for ($page=1;$page<=$number_of_pages;$page++) {
          echo '<a href="oldBookList.php?page=' . $page . '">' . $page . '</a> ';
        }
        ?>
      </th>
    </tr>
  </table>
</div>

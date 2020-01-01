<link rel="stylesheet" href="../../css/customerList.css">
<script src="../../js/user.js" charset="utf-8"></script>
<?php
include_once("../../core/user_service.php");

$results_per_page = 10;
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$f = 3;
$this_page_first_result = ($page-1)*$results_per_page;
$number_of_results = customerCount($f);
$number_of_pages = ceil($number_of_results/$results_per_page);
$this_page_first_result = ($page-1)*$results_per_page;
$custList = loadCustomerList($this_page_first_result, $results_per_page, $f);
//print_r($custList);
?>

<fieldset>
  <b style="margin-left: 42%;">Ads under review</b>
</fieldset>

<div class="customerList-background">
  <table class="customerList-table" style="border-collapse: collapse;">
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Added Date</th>
      <th>Modified Date</th>
      <th>Operation</th>
    </tr>
    <?php foreach ($custList as $list): ?>
      <tr>
        <td><?=$list['id'];?></td>
        <td><?=$list['name'];?></td>
        <td><?=$list['email'];?></td>
        <td><?=$list['phone_number'];?></td>
        <td><?=$list['address'];?></td>
        <td><?=$list['gender'];?></td>
        <td><?=$list['date_of_birth'];?></td>
        <td><?=$list['added_date'];?></td>
        <td><?=$list['modified_date'];?></td>
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
          echo '<a href="customerList.php?page=' . $page . '">' . $page . '</a> ';
        }
        ?>
      </th>
    </tr>
  </table>
</div>

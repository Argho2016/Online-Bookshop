<link rel="stylesheet" href="../../css/customerList.css">
<script src="../../js/user.js" charset="utf-8"></script>
<?php
include_once("../../core/newBooksList.php");

$results_per_page = 10;
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$status = '0';
$this_page_first_result = ($page-1)*$results_per_page;
$number_of_results = count(loadOrderList($this_page_first_result, $results_per_page, $status));
echo 'order list '.$number_of_results;
$number_of_pages = ceil($number_of_results/$results_per_page);
$this_page_first_result = ($page-1)*$results_per_page;
//$orderList = loadOrderList($this_page_first_result, $results_per_page, $status);
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    if (isset($_POST['accept'])) {
        $result = updateOrderList('1', $_POST['pId']);
    } elseif (isset($_POST['cancel'])) {
        $result = updateOrderList('2', $_POST['pId']);
    }
}

$orderList = loadOrderList($this_page_first_result, $results_per_page, $status);

//print_r($orderList);
?>

<fieldset>
  <b style="margin-left: 42%;">Order List</b>
</fieldset>

<div class="customerList-background">
  <table class="customerList-table" style="border-collapse: collapse;">
    <tr>
      <th>Customer name</th>
      <th>Phone number></th>
      <th>Alt. Phone number</th>
      <th>Qualtity</th>
      <th>Total price</th>
      <th>Order Date</th>
      <th>Address</th>
      <th>Product ID</th>
      <th>Order ID</th>
      <th>Operation</th>
    </tr>
    <?php foreach ($orderList as $list): ?>
      <tr>
        <td><?=$list['name'];?></td>
        <td><?=$list['phone'];?></td>
        <td><?=$list['aphone'];?></td>
        <td><?=$list['quantity'];?></td>
        <td><?=$list['total'];?></td>
        <td><?=$list['odate'];?></td>
        <td><?=$list['address'];?></td>
        <td><?=$list['product_id'];?></td>
        <td><?=$list['order_id'];?></td>
        <td>
          <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='post'>
            <fieldset> <input type="submit" name="accept" value='Accept' id=""> </fieldset>
                        <input type="hidden" name="pId" value='<?=$list['product_id'];?>'>
            <fieldset> <input type="submit" name="cancel" value='Cancel' > </fieldset>
          </form>
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
          echo '<a href="newBooksReview.php?page=' . $page . '">' . $page . '</a> ';
        }
        ?>
      </th>
    </tr>
  </table>
</div>

<?php
include_once("/../lib/db.php");

function getOrderList($this_page_first_result, $results_per_page, $status) {
  $query="SELECT * from orders WHERE status=$status LIMIT $this_page_first_result, $results_per_page";
  $result=executeQuery($query);
  $orderList=array();
  if($result){
     for ($i=0; $row =mysqli_fetch_array($result) ; $i++) {
         $orderList[$i]=$row;
     }
  }
  return $orderList;
}


function updateOrderList_DA($status, $pId) {
  $query="UPDATE orders SET status='$status' WHERE product_id='$pId'";
  return executeNonQuery($query);
}



function getAllNewBooks()
{
    $query="SELECT * FROM newbooks";
    $result=executeQuery($query);
    $booksList=array();
    if($result){
       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
           $booksList[$i]=$row;
       }
    }
    return $booksList;
}

function loadBookDetail($name)
{
	$query = "SELECT * FROM newbooks WHERE slug = '$name'";
	$result = executeQuery($query);
	$book = null;
	if($result)
	{
		$book = mysqli_fetch_assoc($result);
	}

	return $book;
}

function addNewBookData($uphoto, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description)
{
  $query = "INSERT INTO newbooks(imageName, bookName, slug, writerName, publication, subject, price, quantity, description) VALUES('$uphoto', '$bookName', '$slug', '$writerName', '$publicationName', '$subjectName', $price, $quantity, '$description')";

  return executeNonQuery($query);
}

function getBookData($bname)
{
  $query = "SELECT * FROM newbooks WHERE slug = '$bname'";
  $result = executeQuery($query);
  $book = null;
  if($result)
  {
    $book = mysqli_fetch_assoc($result);
  }

  return $book;
}

function getQuan($id)
{
  $query = "SELECT quantity FROM newbooks WHERE id = $id";
  $result = executeQuery($query);
  $book = null;
  if($result)
  {
    $book = mysqli_fetch_assoc($result);
  }

  return $book;
}

function updateBookData($id, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description)
{
  $quan = getQuan($id);
  $newQuan = $quan['quantity'] + $quantity;
  $query = "UPDATE newbooks SET bookName='$bookName', slug='$slug', writerName='$writerName', publication='$publicationName', subject='$subjectName', price=$price, quantity=$newQuan, description='$description' WHERE id=$id";
  return executeNonQuery($query);
}
?>
<?php
include_once ("/../data/newBooksData.php");

function loadOrderList($this_page_first_result, $results_per_page, $status) {
	return getOrderList($this_page_first_result, $results_per_page, $status);
}

function updateOrderList($status, $pId) {
	return updateOrderList_DA($status, $pId);
}

function loadAllNewBooks()
{
    return getAllNewBooks();
}

function loadBook($name)
{
	return loadBookDetail($name);
}

function addNewBook($uphoto, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description)
{
	return addNewBookData($uphoto, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description);
}

function getBook($bname)
{
	return getBookData($bname);
}

function updateBook($id, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description)
{
	return updateBookData($id, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description);
}
?>

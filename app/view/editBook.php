<?php 
	session_start();
	include_once ("../../core/newBooksList.php");

	$bname = isset($_GET['book']) ? $_GET['book'] : '';

	$bookUpdate = getBook($bname);

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$bookName = $_POST["newBookName"];
		$writerName = $_POST["newWriterName"];
		$publicationName = $_POST["newPublication"];
		$subjectName = $_POST["newSubject"];
		$price = $_POST["newPrice"];
		$quantity = $_POST["bquantity"];
		$slug = str_replace(' ', '-', $bookName);
		$description = $_POST["bdescription"];
		$id = $bookUpdate['id'];

		$result = updateBook($id, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description);
		if($result)
		{
			header("Location:editNewBook.php");
		}
	}
	include_once ("../../includes/topEmployeeD.php"); 	
?>

<html lang="en">
 	<head>
 	  <title>Post Ad</title>
 	  <meta charset="utf-8">
 	  <meta name="viewport" content="width=device-width, initial-scale=1">
 	  <link rel="stylesheet" href="zstyle.css">
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 	</head>

  <body>
    <div class="row">
        <div class="col-md-6 col3">
          <form method="POST" >
            <input type="text" placeholder="Book Name" class="bookName" name="newBookName" value="<?=$bookUpdate['bookName'] ?>"><br>
            <input type="text" placeholder="Writer Name" class="oldWriterName" name="newWriterName" value="<?=$bookUpdate['writerName'] ?>"><br>
            <input type="text" placeholder="Publication" class="oldPublication" name="newPublication" value="<?=$bookUpdate['publication'] ?>"><br>
            <input type="text" placeholder="Subject" class="oldSubject" name="newSubject" value="<?=$bookUpdate['subject'] ?>"><br>
            <input type="text" placeholder="Price" class="price" name="newPrice" value="<?=$bookUpdate['price'] ?>"><br>
            <input type="text" placeholder="Quantity" class="bquantity" name="bquantity" value="<?=$bookUpdate['quantity'] ?>"><br>
            <textarea rows="4" cols="50" placeholder="Description" class="bdescription" name="bdescription" value="<?=$bookUpdate['description'] ?>"></textarea><br>
            <input type="submit" name="updateBook" value="Update" class="updateBook">
          </form>
        </div>
    </div>
  </body>
</html>
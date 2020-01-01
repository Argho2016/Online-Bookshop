<?php 
	session_start();
	include_once ("../../includes/topAdminD.php"); 
	include_once ("../../core/newBooksList.php");

	if(isset($_POST['addBook']))
	{
		if((empty($_POST["newBookName"])) || (empty($_POST["newWriterName"])) || (empty($_POST["newPublication"])) || (empty($_POST["newSubject"])) || (empty($_POST["newPrice"])) || (empty($_POST["bquantity"])))
		{
			$message = "Require All Field's!";
			echo "<SCRIPT>alert('$message');</SCRIPT>";
		}
		else
		{
			$photo_name = $_FILES['image']['name'];
			$photo_tname = $_FILES['image']['tmp_name'];
			$uphoto = time().$photo_name;
			$bookName = $_POST["newBookName"];
			$writerName = $_POST["newWriterName"];
			$publicationName = $_POST["newPublication"];
			$subjectName = $_POST["newSubject"];
			$price = $_POST["newPrice"];
			$quantity = $_POST["bquantity"];
			$description = $_POST["bdescription"];
			$slug = str_replace(' ', '-', $bookName);

			$result = addNewBook($uphoto, $bookName, $slug, $writerName, $publicationName, $subjectName, $price, $quantity, $description);

			if($result)
			{
				move_uploaded_file($photo_tname, '../newBooks/'.$uphoto);
				$message = "Book Added!";
				echo "<SCRIPT>alert('$message');</SCRIPT>";
			}
			else
			{
				echo "Error!";
			}
		}
	}
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
        <div class="col-md-6 col1">
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
          <p><img class="imgUpload" id="output" width="200" height="200" /></p>
		  <p><label class="imgLabel" for="file" style="cursor: pointer;">Upload</label></p>
          <script>
            var loadFile = function(event){
              var image = document.getElementById('output');
              image.src = URL.createObjectURL(event.target.files[0]);
            };
          </script>
        </div>
        <div class="col-md-6 col2">
            <input type="text" placeholder="Book Name" class="bookName" name="newBookName"><br>
            <input type="text" placeholder="Writer Name" class="oldWriterName" name="newWriterName"><br>
            <input type="text" placeholder="Publication" class="oldPublication" name="newPublication"><br>
            <input type="text" placeholder="Subject" class="oldSubject" name="newSubject"><br>
            <input type="text" placeholder="Price" class="price" name="newPrice"><br>
            <input type="text" placeholder="Quantity" class="bquantity" name="bquantity"><br>
            <textarea rows="4" cols="50" placeholder="Description" class="bdescription" name="bdescription"></textarea><br>
            <input type="submit" name="addBook" value="Add" class="addNewBook">
          </form>
        </div>
    </div>
  </body>
</html>

<?php include_once ("../../includes/topAdminD.php"); ?>
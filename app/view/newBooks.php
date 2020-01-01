<?php
    session_start();
	include_once ("../../includes/topHomepage.php");
	include 'scripts.php';
	include_once ("../../core/newBooksList.php");

    $result = loadAllNewBooks();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="zstyle.css">
	</head>
	<body>
		<div class="bookList">
		    <div class="row">
		        <div class="col-sm-12">
					<?php
						try
						{
							$inc = 4;
							foreach ($result as $row)
							{
								$image = (!empty($row['imageName'])) ? '../newBooks/'.$row['imageName'] : '../newBooks/noimage.jpg';
								$inc = ($inc == 4) ? 1 : $inc + 1;
			       					if($inc == 1) echo "<div class='row' style='margin-left:10px; margin-top:25px'>";
			       						echo "
			       							<div class='col-sm-3'>

			       									<div class='card' style='width:280px; margin-top:25px'>
			       										<img class='card-img-top' src='".$image."' style='width:100%; height:230px'>
			       										<div class='card-body'>
			       											<h4 class='card-title'><a href='product.php?product=".$row['slug']."'>".$row['bookName']."</a></h4>
			       											<a href='product.php?product=".$row['slug']."' class='btn btn-primary'>Add to Cart</a>
			       										</div>
			       									</div>

			       							</div>
			       						";
			       					if($inc == 4) echo "</div>";
							}

							if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e)
						{
							echo "There is some problem in connection: " . $e->getMessage();
						}
					?>
		        </div>
		    </div>
		</div>
	</body>
</html>

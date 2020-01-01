<?php 
	session_start();
	include_once ("../../core/cartInfo.php");

	$output = '';

	if (isset($_SESSION['userName'])) 
	{
		if (isset($_SESSION['cart'])) 
		{
			foreach ($_SESSION['cart'] as $row) 
			{
				$pid = $row['productid'];
			    $quantity = $row['quantity'];
			    $uid = $_SESSION['id'];

				$productDetail = loadProduct($uid, $pid);
				

				if ($productDetail['numrows'] < 1) 
				{
					$insert = insertNewProduct($uid, $pid, $quantity);
				}
				else
				{
					$update = updateProduct($pid, $quantity, $uid);
				}
			}
			unset($_SESSION['cart']);
		}

		try
		{
			$total = 0;
			$uid = $_SESSION['id'];
			$result = bookDetails($uid);
			foreach ($result as $row) 
			{
				$image = (!empty($row['imageName'])) ? '../newBooks/'.$row['imageName'] : '../newBooks/noimage.jpg';
				$subtotal = $row['price'] * $row['cartQuantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['cartid']."' class='cart_delete'>X</button</td>
						<td><img src='".$image."' width='50px' height='50px'></td>
						<td>".$row['bookName']."</td>
						<td>".number_format($row['price'], 2)."</td>
						<td>".$row['cartQuantity']."</td>
						<td>".number_format($subtotal, 2)."</td>
					</tr>
				";
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>".number_format($total, 2)."</b></td>
				<tr>
			";
		}
		catch(PDOException $e)
		{
			$output .= $e->getMessage();
		}
	}
	else
	{
		if(count($_SESSION['cart']) != 0)
		{
			$total = 0;
			foreach($_SESSION['cart'] as $row)
			{
				$product = bDetails($row['productid']);
				$image = (!empty($product['imageName'])) ? '../newBooks/'.$product['imageName'] : '../newBooks/noimage.jpg';
				$subtotal = $product['price'] * $row['quantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><img src='".$image."' width='100px' height='100px'></td>
						<td>".$product['bookName']."</td>
						<td>&#36; ".number_format($product['price'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['productid']."'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['productid']."'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['productid']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
				
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>".number_format($total, 2)."</b></td>
				<tr>
			";
		}

		else
		{
			$output .= "
				<tr>
					<td colspan='6' align='center'>Shopping cart empty</td>
				<tr>
			";
		}
		
	}
	echo json_encode($output);
?>
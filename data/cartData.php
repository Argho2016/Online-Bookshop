<?php
	include_once("/../lib/db.php"); 

	function loadBookData($uid, $pid)
	{
		$query = "SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id = $uid AND product_id = $pid";
		$result = executeQuery($query);
		$product = null;
		if($result)
	    {
	       $product = mysqli_fetch_assoc($result);
	    }
	    return $product;
	}

	function insertProduct($uid, $pid, $quantity)
	{
		$query="INSERT INTO cart(user_id, product_id, quantity) VALUES($uid, $pid, $quantity)";
    	return executeNonQuery($query);
	}

	function productCountData($uid)
	{
		$query="SELECT * FROM cart WHERE user_id = $uid";
	    $result=executeQuery($query);
	    $productsList=array();
	    if($result)
	    {
	       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) 
	       { 
	           $productsList[$i]=$row;
	       }
	    }
	    return $productsList;
	}

	function updateProductData($pid, $quantity, $uid)
	{
		$query = "UPDATE cart SET quantity=$quantity WHERE user_id=$uid AND product_id=$pid";
		return executeNonQuery($query);
	}

	function updateCounterData($pid)
	{
		$query = "UPDATE newbooks SET counter=counter+1 WHERE id=$pid";
		return executeNonQuery($query);
	}

	function updateCounterDateData($pid, $date)
	{
		$query = "UPDATE newbooks SET counter=1, date_view=$date WHERE id=$pid";
		return executeNonQuery($query);
	}

	function bookDetailsData($uid)
	{
		$query = "SELECT *, cart.id AS cartid, cart.quantity AS cartQuantity FROM cart LEFT JOIN newbooks ON newbooks.id=cart.product_id WHERE user_id=$uid"; 

		$result=executeQuery($query);
	    $productsList=array();
	    if($result){
	       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
	           $productsList[$i]=$row;
	       }
	    }
	    return $productsList;
	}

	function bDetailsData($pid)
	{
		$query = "SELECT * FROM newbooks WHERE id=$pid"; 

		$result=executeQuery($query);
	    $productsList=array();
	    if($result){
	       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
	           $productsList[$i]=$row;
	       }
	    }
	    return $productsList;
	}

	function deleteFromCartData($id)
	{
		$query = "DELETE FROM cart WHERE id=$id";
		return executeNonQuery($query);
	}

	function updateQuantityData($id, $qty)
	{
		$query = "UPDATE cart SET quantity=$qty WHERE product_id=$id";
		return executeNonQuery($query);
	}

	function getTotalData($id)
	{
		$query = "SELECT * FROM cart LEFT JOIN newbooks ON newbooks.id=cart.product_id WHERE user_id=$id";

		$result=executeQuery($query);
		$total = 0;
		foreach ($result as $row) 
		{
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
		}

		return $total;
	}

	function deleteBookCart($id)
	{
		$query = "DELETE FROM cart WHERE user_id=$id";
		return executeNonQuery($query);
	}

	function updateOrderData($id, $name, $phone, $aphone, $address, $method, $total, $orderId, $date)
	{
		$query = "SELECT * FROM cart WHERE user_id=$id";
		$result = executeQuery($query);
		$status = 0;

		if($result)
		{
	       for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) 
	       { 
	           $query1 = "INSERT INTO orders(order_id, user_id, product_id, quantity, total, odate, status, payment_method, name, phone, aphone, address) VALUES($orderId, $id, $row[product_id], $row[quantity], $total, '$date', $status, '$method', '$name', '$phone', '$aphone', '$address')";
			    executeQuery($query1);
	       }
	    }

	    deleteBookCart($id);		
	}
?>
<?php
	include_once ("/../data/cartData.php"); 

	function loadProduct($uid, $pid)
	{
		return loadBookData($uid, $pid);
	}

	function insertNewProduct($uid, $pid, $quantity)
	{
		return insertProduct($uid, $pid, $quantity);
	}

	function productCount($uid)
	{
		return productCountData($uid);
	}

	function updateProduct($pid, $quantity, $uid)
	{
		return updateProductData($pid, $quantity, $uid);
	}

	function updateCounter($pid)
	{
		return updateCounterData($pid);
	}

	function updateCounterDate($pid, $date)
	{
		return updateCounterDateData($pid, $date);
	}

	function bookDetails($uid)
	{
		return bookDetailsData($uid);
	}

	function bDetails($pid)
	{
		return bDetailsData($pid);
	}

	function deleteFromCart($id)
	{
		return deleteFromCartData($id);
	}

	function updateQuantity($id, $qty)
	{
		return updateQuantityData($id, $qty);
	}

	function getTotal($id)
	{
		return getTotalData($id);
	}

	function updateOrder($id, $name, $phone, $aphone, $address, $method, $total, $orderId, $date)
	{
		return updateOrderData($id, $name, $phone, $aphone, $address, $method, $total, $orderId, $date);
	}
?>
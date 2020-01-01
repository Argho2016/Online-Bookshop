<?php
    session_start();
	include_once ("../../core/cartInfo.php");

    $output = array('error'=>false);

    $pid = $_POST['id'];
    $quantity = $_POST['quantity'];
    $uid = $_SESSION['id'];

    $productDetail = loadProduct($uid, $pid);

    if(isset($_SESSION['userName']))
    {
    	if($productDetail['numrows'] < 1)
    	{
    		try
    		{
    			$insert = insertNewProduct($uid, $pid, $quantity);

    			if($insert)
    			{
    				$output['message'] = 'Item added to cart';
    			}
    		}
    		catch(PDOException $e)
    		{
    			$output['error'] = true;
				$output['message'] = $e->getMessage();
    		}
    	}
    	else
    	{
    		$output['error'] = true;
			$output['message'] = 'Product already in cart';
    	}
    }
    else{
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        $exist = array();

        foreach($_SESSION['cart'] as $row){
            array_push($exist, $row['productid']);
        }

        if(in_array($id, $exist)){
            $output['error'] = true;
            $output['message'] = 'Product already in cart';
        }
        else{
            $data['productid'] = $id;
            $data['quantity'] = $quantity;

            if(array_push($_SESSION['cart'], $data)){
                $output['message'] = 'Item added to cart';
            }
            else{
                $output['error'] = true;
                $output['message'] = 'Cannot add item to cart';
            }
        }

    }
    echo json_encode($output);
?>
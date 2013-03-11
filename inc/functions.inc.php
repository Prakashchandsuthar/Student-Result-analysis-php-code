<?php

function writeShoppingCart() {
    if(!isset($_SESSION['cart'])) $_SESSION['cart']=('');
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>no items</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>'.count($items).' item'.$s.'|TOTAL:'.$_SESSION['total'].'$</p>';
	}
}

function showCart() {
	global $db;
	if(!isset($total))$total=0;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
	
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		
		foreach ($contents as $id=>$tempqty) {
			$sql = 'SELECT * FROM stock WHERE stockid = '.$id;
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$name.'</td>';
			$output[] = '<td>$'.$cost.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$tempqty.'" size="3" maxlength="3" /></td>';
			$total += $cost * $tempqty;
			$output[] = '<td>$'.($cost*$tempqty).'</td>';
			$output[] = '</tr>';
		}
	

	
	} else {
		$output[] = '<div class="title">You shopping cart is empty.</div><br><br>';
	}
	$_SESSION['total']=$total;
	return implode('',$output);
}
function updateproduct() {
	global $db;
	if(!isset($total))$total=0;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $id=>$tempqty) {
			$sql = "update stock set qty = qty-'$tempqty'  where stockid = '$id'";
			$result = mysql_query($sql);	
		}
	}


}
function updateproduct2($pid) {
	global $db;
	$date=date("d.m.y");
	if(!isset($total))$total=0;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $id=>$tempqty) {
		   	
			$query = 'SELECT * FROM stock WHERE stockid = '.$id;
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			extract($row);	
		
			$query =("INSERT INTO invoice (item,Total,whouse , transdate,typeid,pid,qty)
			VALUES ('$name',  '$cost','intenet', '$date',1, '$pid','$tempqty')")or die(mysql_error());
			mysql_query($query);
			$query = ("UPDATE stock set qty = qty - $tempqty where stockid = '$id'") or die(mysql_error());
			$result = mysql_query($query);
			$query=("select * from account where accid = $pid")or die(mysql_error());
			$result = mysql_query($query);
			if (mysql_num_rows($result) > 0){
			$query = ("UPDATE  account set account = account + $cost where accid=$pid") or die(mysql_error());	
			}
			else{
			$query = ("insert into account values('','$pid',1,'$cost')") or die(mysql_error());	
			}
			mysql_query($query);		
		}
	}


}



function showproduct() {
	global $db;
	if(!isset($total))$total=0;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $id=>$tempqty) {
			$sql = 'SELECT * FROM stock WHERE stockid = '.$id;
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td>'.$name.'</td>';
			$output[] = '<td>'.$tempqty.'</td>';
			$output[] = '<td>$'.$cost.'</td>';
			$output[] = '</tr>';
		}
	}
	$_SESSION['total']=$total;
	return implode('',$output);
}
?>

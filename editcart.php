<?php
session_start();
if(isset($_POST['id']) && isset($_POST['amount']) && $_POST['amount']!=""){
	require_once('ketnoi.php');
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	//$chenhlech=($_SESSION[$id][$size]-$amount);
	$results=mysqli_query($connect,"SELECT * FROM products WHERE ID='$id'");
	$row=mysqli_fetch_assoc($results);
	if($amount>$row['Amount']){
		$amount=$row['Amount'];
	}
	$_SESSION['cart'][$id]=$amount;
	//$_SESSION['cart'][$id]=$_SESSION['cart'][$id]-($chenhlech);
	
	if($amount==0){
		unset($_SESSION['cart'][$id]);
	}
	// $results=mysqli_query($connect,"SELECT * FROM products WHERE ID='$id'");
	// $row=mysqli_fetch_assoc($results);
	echo $row["Price"]*$amount;
	mysqli_free_result($results);
	mysqli_close($connect);
	
}
?>
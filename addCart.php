<?php
session_start();
if(isset($_POST['id']) && $_POST['id']!=""){
	$id=$_POST['id'];
	require_once('ketnoi.php');
	$sql="SELECT Amount FROM products WHERE ID='$id'";
	$rs=mysqli_query($connect,$sql);
	while ($row=mysqli_fetch_assoc($rs)) {
		$max=$row['Amount'];
	}
	//$size=$_POST['size'];
	if(isset($_SESSION['cart'][$id])){
		if($_SESSION['cart'][$id]+$_POST['soluong']<=$max){
			$_SESSION['cart'][$id]+=$_POST['soluong'];
		}
		else{
			$_SESSION['cart'][$id]=$max;
		}
	}
	else{
		$_SESSION['cart'][$id]=$_POST['soluong'];
	}
	// if(isset($_SESSION[$id][$size])){
	// 	$_SESSION[$id][$size]+=$_POST['soluong'];
	// }
	// else{
	// 	//$_SESSION[$id]=array();
	// 	$_SESSION[$id][$size]=$_POST['soluong'];
	// }
	
	$count=0;
	foreach($_SESSION['cart'] as $k=>$v){
		$count+=$v;
	}
//	$dem=0;
//	foreach($_SESSION['cart'] as $i=>$v){
//		foreach($_SESSION[$i] as $sz=>$sl){
//			$dem+=$sl;
//		}
//	}
	//$count=count($_SESSION['cart']);
	
	echo $count;
	//session_destroy();
}
?>
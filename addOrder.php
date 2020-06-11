
<?php

session_start();
if(isset($_POST['c_fname'])){
	$name=$_POST['c_fname'];
	$city=$_POST['c_city'];
	$company=$_POST['c_companyname'];
	$address=$_POST['c_address'];
	$email=$_POST['c_email_address'];
	$phone=$_POST['c_phone'];
	$note=$_POST['c_order_notes'];
	include_once('ketnoi.php');
	$rs=mysqli_query($connect,"SELECT * FROM orders");
	$idorder="OD_0".(mysqli_num_rows($rs)+1);
	date_default_timezone_set('Asia/Ho_Chi_Minh');	
	$date=date('Y-m-d'); //lay ngay hien tai year/month/day
	$total=$_SESSION['total'];
	if(isset($_SESSION['userid'])){
		$userid=$_SESSION['userid'];
	}
	else{
		$userid="";
	}
	$sql="INSERT INTO `orders` (`OrderID`, `UserID`, `Name`, `City`, `CompanyName`, `Address`, `Email`, `Phone`, `Notes`, `Total`, `Status`, `Created`) VALUES ('$idorder', '$userid', '$name', '$city', '$company', '$address', '$email', '$phone', '$note', '$total', '1', '$date');";
	mysqli_query($connect,$sql) or die("k thanh cong"); //gui order len mysql
	mysqli_free_result($rs);
	foreach($_SESSION['cart'] as $k=>$sl){
			$rs=mysqli_query($connect,"SELECT *FROM products WHERE ID='$k'");
			$row=mysqli_fetch_assoc($rs);
			$price=$row["Price"];
			$ttprice=($price*$sl);
			$sql="INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Amount`, `Total`) VALUES ('$idorder', '$k', '$price', '$sl', '$ttprice')";
			mysqli_query($connect,$sql) or die("loi chi tiet order");//dua chi tiet order len mysql
			mysqli_free_result($rs); // reset lai rs
			$sql="UPDATE `products` SET `Amount`=`Amount`-$sl,`AmountBuy`=`AmountBuy`+$sl WHERE ID = $k";
			mysqli_query($connect,$sql) or die("loi cap nhat so luong");
			unset($_SESSION['cart'][$k]);
	}
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
	mysqli_close($connect);
}
?>
<?php

header('Location: thankyou.php'); 
?>

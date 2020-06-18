<?php
session_start();
include('ketnoi.php');
$tk=$_POST['username'];
$mk=$_POST['password'];
$mk=md5($mk);
if(isset($_POST['logout']) && $_POST['logout']==1){
	unset($_SESSION['isLogin']);
	unset($_SESSION['nameLogin']); 
	unset($_SESSION['role']);
	
	unset($_SESSION['fullname']);
	unset($_SESSION['username']);
	unset($_SESSION['Email']);
	unset($_SESSION['phone']);
	unset($_SESSION['userid']);
	unset($_SESSION['cart']);
	return(false);
}
$result=mysqli_query($connect,"SELECT * FROM users WHERE Username='$tk' AND Password='$mk' AND Status=1");
if(mysqli_num_rows($result)==1){
	$_SESSION['isLogin']=1;
	$row=mysqli_fetch_assoc($result);
	$_SESSION['nameLogin']=$row["Name"];
	$_SESSION['role']=$row["Roleid"];
	$_SESSION['fullname']=$row["Name"];
	$_SESSION['username']=$row["Username"];
	$_SESSION['Email']=$row["Email"];
	$_SESSION['phone']=$row["Phone"];
	$_SESSION['userid']=$row["Userid"];
	$_SESSION['address']=$row["Address"];
	
	echo $row["Roleid"];
}else{
	echo 0;
}
	
?>
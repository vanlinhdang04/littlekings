<?php
	if(isset($_POST['r_email'])){
		$email=$_POST['r_email'];
		date_default_timezone_set("Asia/Ho_Chi_Minh"); //set thoi gian
		$date=date('Y-m-d'); //lay ngay thang
		$sql="INSERT INTO `email_notification`(`ID`, `Email`, `Status`, `Created`) VALUES ('','$email','1','$date')";
		require_once ('ketnoi.php');
		mysqli_query($connect,$sql) or die('loi nhan email nofication');
		mysqli_close($connect);
		header('Location: index.php');
	}
?>
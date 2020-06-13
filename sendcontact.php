<?php
	if(isset($_POST['c_fname']) and isset($_POST['c_email'])){
		$name=$_POST['c_fname'];
		$email=$_POST['c_email'];
		$subject=$_POST['c_subject'];
		$message=$_POST['c_message'];
		date_default_timezone_set("Asia/Ho_Chi_Minh"); //set thoi gian
		$date=date('Y-m-d'); //lay ngay thang
		$sql="INSERT INTO `contact`(`ContactID`, `Name`, `Email`, `Subject`, `Messenger`, `Status`, `Created`) VALUES ('','$name','$email','$subject','$message','1','$date');";
		include_once('ketnoi.php');
		mysqli_query($connect,$sql) or die($sql);
		mysqli_close($connect);
		header('Location: thankcontact.php');
	}
?>
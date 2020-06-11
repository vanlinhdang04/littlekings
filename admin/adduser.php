<?php
	if(isset($_POST['username']))
	{
	 	include_once("../ketnoi.php");
		$username=$_POST['username'];
		$password=$_POST['password'];
		$fullname=$_POST['fullname'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$role=$_POST['role'];
		$status=$_POST['status'];
		$error="";
		$password=md5($password);
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$date=date('Y-m-d');
		
		$result=mysqli_query($connect,"SELECT * FROM users");
		$userid="UR0" . (mysqli_num_rows($result)+1);
		//echo ($userid);
		mysqli_free_result($result);
		$result=mysqli_query($connect,"SELECT * FROM users WHERE Username='$username'");
		if($row=mysqli_num_rows($result)>0)
		{
			$error.=" 2";
		}
		mysqli_free_result($result);
		$result=mysqli_query($connect,"SELECT * FROM users WHERE Phone='$phone'");
		if($row=mysqli_num_rows($result)>0)
		{
			$error.=" 3";
		}
		mysqli_free_result($result);
		$result=mysqli_query($connect,"SELECT * FROM users WHERE Email='$email'");
		if($row=mysqli_num_rows($result)>0)
		{
			$error.=" 4";
		}
		mysqli_free_result($result);
		if($error!="")
		{
			echo($error);
			return false;
		}
		
		$query=mysqli_query($connect,"INSERT INTO `users`(`Userid`, `Username`, `Password`, `Name`, `Phone`, `Email`, `Roleid`, `Create`, `Status`) VALUES ('$userid','$username','$password','$fullname','$phone','$email','$role','$date','$status') ") or die("INSERT INTO `users`(`Userid`, `Username`, `Password`, `Name`, `Phone`, `Email`, `Roleid`, `Create`, `Status`) VALUES ('$userid','$username','$password','$fullname','$phone','$email','$role','$date','$status') ");
		echo(0);
		mysqli_close($connect);
	}
?>
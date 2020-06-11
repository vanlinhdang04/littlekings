<?php
session_start();
//ADMIN//
	if(isset($_POST['admin']))
	{
		include_once("../ketnoi.php");
		$userid=$_POST['userid'];
		$username=$_POST['username'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$role=$_POST['role'];
		$status=$_POST['status'];
		$error="";
		
		$query=mysqli_query($connect,"SELECT * FROM users WHERE Userid!='$userid' AND Phone='$phone'");
		if($row=mysqli_num_rows($query)>0)
		{
			$error.=" 1";
		}
		mysqli_free_result($query);
		
		
		$query=mysqli_query($connect,"SELECT * FROM users WHERE Userid!='$userid' AND Email='$email'");
		if($row=mysqli_num_rows($query)>0)
		{
			$error.=" 2";
		}
		if($error!="")
		{
			echo($error);
			return false;
		}
		$sql=mysqli_query($connect,"UPDATE `users` SET `Password`='$password',`Name`='$name',`Phone`='$phone',`Email`='$email',`Roleid`='$role',`Status`='$status' WHERE Userid='$userid'");
		
		
		
		mysqli_close($connect);
	}
//USER//
	if(isset($_POST['user']))
	{
		include_once("../ketnoi.php");
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$error="";	
		$userid=$_SESSION['userid'];
		$query=mysqli_query($connect,"SELECT * FROM users WHERE Userid!='$userid' AND Phone='$phone'");
		if($row=mysqli_num_rows($query)>0)
		{
			$error.=" 1";
		}
		mysqli_free_result($query);
		$query=mysqli_query($connect,"SELECT * FROM users WHERE Userid!='$userid' AND Email='$email'");
		if($row=mysqli_num_rows($query)>0)
		{
			$error.=" 2";
		}
		if($error!="")
		{
			echo($error);
			return false;
		}
		$sql=mysqli_query($connect,"UPDATE `users` SET `Name`='$name',`Phone`='$phone',`Email`='$email' WHERE Userid='$userid'");
		
		$_SESSION['nameLogin']=$firstname." ".$lastname;
		$_SESSION['email']=$email;
		$_SESSION['phone']=$phone;
		
		mysqli_close($connect);
	}
?>
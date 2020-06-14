<?php
	// include "../PHPMailer-master/src/PHPMailer.php";
	// include "../PHPMailer-master/src/Exception.php";
	// include "../PHPMailer-master/src/OAuth.php";
	// include "../PHPMailer-master/src/POP3.php";
	// include "../PHPMailer-master/src/SMTP.php";
	 
	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;
if(isset($_POST['rc_contactid'])){
	$id= $_POST['rc_contactid'];
	$mess= $_POST['rc_message'];
	$subject="Little Kings | Repply your contact.";
	$header  =  "From:littlekings@gmail.com \r\n";
    $header .=  "Cc:manager@gmail.com \r\n";
    
    $header .= "MIME-Version: 1.0\r\n";             //MỚI
    $header .= "Content-type: text/html\r\n";       //MỚI
	require_once('../ketnoi.php');
	$sql="SELECT * FROM contact WHERE ContactID='$id'";
	$rs=mysqli_query($connect,$sql);
	while ($row=mysqli_fetch_assoc($rs)){
		$name=$row['Name'];
		$message="<p>Dear ".$row['Name'].",</p>";
		$message.="<p>We have received your suggestions about ".$row['Subject'].".</p>";
		$message.="<p>".$mess."</p>";
		$message.="<p>Wish you a good day,</p>";
		$message.="<p>Thank you,</p>";
		$message.="<p>Manager Little Kings.</p>";
		$email= $row['Email'];
	}


//ryvlctufjxclmien
	//goi thu vien
    include('../PHPMailer-5.2.26/class.smtp.php');
    include "../PHPMailer-5.2.26/class.phpmailer.php"; 
    $nFrom = "Little Kings";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'littlekingsgu@gmail.com';  //dia chi email cua ban 
    $mPass = 'ryvlctufjxclmien';       //mat khau email cua ban
    $nTo = $name; //Ten nguoi nhan
    $mTo = $email;   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $message;   // Noi dung email
    $title = $subject;   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('littlekingsgu@gmail.com', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Co loi!';
    } else {
         
        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    }
}
?>
<?php 
	include('class.phpmailer.php');

	$email_address = $_POST['email'];

	//PHPMailer Object
	$mail = new PHPMailer;

	//From email address and name
	$mail->From = "from@liveramp.com";
	$mail->FromName = "Full Name";

	//To address and name
	$mail->addAddress("kumar.desai@liveramp.com", "Recepient Name");

	//Address to which recipient will reply
	$mail->addReplyTo("reply@liveramp.com", "Reply");

	//CC and BCC
	//$mail->addCC("cc@example.com");
	//$mail->addBCC("bcc@example.com");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Subject Text";
	$mail->Body = "<i>Mail body in HTML</i>". $email_address;

	if(!$mail->send()) 
	{
	    echo 'fail';
	} 
	else 
	{
	    echo 'success';
	}

 ?>
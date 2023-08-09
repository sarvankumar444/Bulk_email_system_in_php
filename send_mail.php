<?php
//send_mail.php

if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	require 'class/class.smtp.php';
	// require 'PHPMailer-master/class.phpmailer.php';
	 require 'class/PHPMailerAutoload.php';

	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		// $mail->SMTPDebug = 0;
		// $mail->SMTPDebug= '4';
		$mail = new PHPMailer;
		// $mail->IsSMTP();
		// $mail->Host = 'tls://smtp.gmail.com';			//Sets Mailer to send message using SMTP
		$mail->Host = 'smpt.gmail.com';						//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '587';								//Sets the default SMTP server port 25
		$mail->SMTPAuth = true;								//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'soulsarvankumar007@gmail.com';	//Sets SMTP username
		$mail->Password = 'dcqutmudhvmnpjzl';					//Sets SMTP password
		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'soulsarvankumar007@gmail.com';		//Sets the From email address for the message
		$mail->FromName = 'admin';		//Sets the From name of the message
		$mail->AddAddress($row["email"],$row["name"]);	    //Adds a "To" address
		$mail->WordWrap = 70;								//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);								//Sets message type to HTML
		$mail->Subject = 'this is a testing msg'; 				//Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
		
		<p>CSE STUDENTS ,Hello all</p>
		';

		$mail->AltBody = '';
		if(!$mail->send()) { 
			echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
		} else { 
			echo 'Message has been sent.'; 
		} 


		// $result = $mail->Send();						//Send an Email. Return true on success or false on error

		//  if($result["code"] == '440')
	// 	 if($result = $mail->Send())
	// 	{
	// 		$output .= html_entity_decode($result['full_error']);
	// 	}

	// }
	// if($output == '')
	// {
	// 	echo 'ok';
	// }
	// else
	// {
	// 	echo $output;
	// }
	}
}

?>
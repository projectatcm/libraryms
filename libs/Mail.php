<?php 

/**
* 
*/
class Mail{
	
	function __construct(){
		# code...
	}

	public function sendVerificationMail($name, $email, $username,$random_hash) {
		require 'PHPMailer/PHPMailerAutoload.php';
		require 'PHPMailer/class.phpmailer.php';
		require 'PHPMailer/class.smtp.php';
		$from = "projectatcm@gmail.com";
		$from_name = "Library Management System";
		$subject = "Password for access";
		$body = "This is the temporary password for lms : <br> Username : <b>$username</b><br>Password : <b>$random_hash</b>";
		$to = $email;
            $mail = new PHPMailer;  // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465; // 465 or 587
            $mail->Username = "projectatcm@gmail.com";
            $mail->Password = "[code]magos";
            $mail->SetFrom($from, $from_name);
            $mail->addReplyTo($from);
            $mail->Subject = $subject;
            $mail->IsHTML(true);
            $mail->Body = $body;
            $mail->AddAddress($to);
            if (!empty($cc)) {
            	$mail->addCC($cc);
            }
            if (!empty($bcc)) {
            	$mail->addBCC($bcc);
            }
            if (!$mail->Send()) {
            	echo $error = 'Mail error: ' . $mail->ErrorInfo;
            	return false;
            } else {
            	return true;
            }
        }

    }



    ?>
<?php

if(isset($_POST['message'])){


	$name = isset( $_POST['name'] ) ? $_POST['name'] : '';
	$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
	$phone = isset( $_POST['phone'] ) ? $_POST['phone'] : '';
	$office = "lawrencechrisojor@gmail.com"; //isset( $_POST['office'] ) ? $_POST['office'] : '';
	$subject = isset( $_POST['subject'] ) ? $_POST['subject'] : '';
	$message = isset( $_POST['message'] ) ? $_POST['message'] : '';

	$subject = isset($subject) ? $subject : 'New Message From Contact Form';

	$office .=",website@veritas.edu.ng";

	$botcheck = $_POST['botcheck'];

	$fmessage = " Name: $name <br />
			Email: $email <br />
			Phone: $phone <br />
			Message: <br />
			$message";


	if( $botcheck == '' ) {

    //$headers = "From: ".$name." <".$email.">\r\n"; $headers = "Reply-To: ".$email."\r\n";
    //$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
	//'X-Mailer: PHP/' . phpversion();

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
   // $headers = "From: ".$name." <".$email.">\r\n"; $headers = "Reply-To: ".$email."\r\n";
    $headers .= "From: $name <$email>" . "\r\n";

  if(mail($office, $subject, $fmessage, $headers))
    echo json_encode(['result'=>true, 'status'=>"Mail sent successfully."]);
    else {echo json_encode(['result'=>false, 'status'=>"Error sending mail. Try again later"]);}
   	} // end botcheck
	else {
		echo json_encode(['result'=>false, 'status'=>"Bot Detected"]);
	} //end botcheck else
 }
 else {
 	header("Location:"."../pages/contact.php?error="."Empty fields");
 	echo json_encode(['result'=>false, 'status'=>'Please fill the form fields properly']);
 } //


?>

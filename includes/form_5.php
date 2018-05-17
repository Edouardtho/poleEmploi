<?php	
	if(empty($_POST['name5']) || empty($_POST['email5']) || empty($_POST['name6']) || empty($_POST['name6']) || empty($_POST['email6']) || empty($_POST['name6']) || empty($_POST['email6']) || empty($_POST['message']))
	{
		return false;
	}
	
	$name5 = $_POST['name5'];
	$email5 = $_POST['email5'];
	$name6 = $_POST['name6'];
	$name6 = $_POST['name6'];
	$email6 = $_POST['email6'];
	$name6 = $_POST['name6'];
	$email6 = $_POST['email6'];
	$message = $_POST['message'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from My Site.";
	$email_body = "You have received a new message. \n\n".
				  "Name5: $name5 \nEmail5: $email5 \nName6: $name6 \nName6: $name6 \nEmail6: $email6 \nName6: $name6 \nEmail6: $email6 \nMessage: $message \n";
	$headers = "From: contact@yoursite.com\n";
	$headers .= "Reply-To: $email6";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>
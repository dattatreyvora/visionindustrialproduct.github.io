<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('Asia/Calcutta');

require_once('../class.phpmailer.php');
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail=new PHPMailer();

$body="<table>
		<tr>
		  <td>Selected Product : </td>
		  <td>".$_POST['category']."</td>
		</tr>
		<tr>
		  <td>Name Of Company : </td>
		  <td>".$_POST['companyname']."</td>
		</tr>
		<tr>
		  <td>Name Of Contact Person : </td>
		  <td>".$_POST['contactname']."</td>
		</tr>
		<tr>
		  <td>Designation : </td>
		  <td>".$_POST['designation']."</td>
		</tr>
		<tr>
		  <td>e-mail : </td>
		  <td>".$_POST['email']."</td>
		</tr>
		<tr>
		  <td>Telephone No. : </td>
		  <td>".$_POST['telno']."</td>
		</tr>
		<tr>
		  <td>Address : </td>
		  <td>".$_POST['address']."</td>
		</tr>
		<td>City : </td>
		  <td>".$_POST['mobile']."</td>
		</tr>
		<tr>
		  <td>Country : </td>
		  <td>".$_POST['country']."</td>
		</tr>
		<tr>
		<tr>
		  <td>Requirement Details : </td>
		  <td>".$_POST['reqdet']."</td>
		</tr>
	</table>";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "info@visionindustrialproduct.com";  // GMAIL username
$mail->Password   = "vision123";            // GMAIL password

$mail->SetFrom('webmaster@savitriya.com', 'Savitriya Team');

$mail->Subject = "Contact Us Inquiry By ".$_POST['contactname'];

$mail->MsgHTML($body);
$mail->AddCC("info@visionindustrialproduct.com", "Vision Info");
$address = "sales@visionindustrialproduct.com";
$mail->AddAddress($address, "Vision Sales");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  return $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>
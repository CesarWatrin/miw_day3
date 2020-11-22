<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
   // //Server settings
   // // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
   // // $mail->isSMTP();                                            // Send using SMTP
   // // $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
   // // $mail->SMTPAuth = true;                                   // Enable SMTP authentication
   // // $mail->Username = '*********';                     // SMTP username
   // // $mail->Password = '*********';                               // SMTP password
   // // // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
   // // $mail->SMTPSecure = 'tls';
   // // $mail->Port       = 465;                                    // TCP port to connect to
   //
   // // //Recipients
   // // $mail->setFrom('cesar.watrin@hotmail.com', 'MIW Party');
   // // $mail->addAddress($_GET['email']);     // Add a recipient
   // // $mail->addCC('cesar.watrin@hotmail.com');
   // //
   // // // Attachments
   // // //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // // //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   // //
   // // // Content
   // // $mail->isHTML(true);                                  // Set email format to HTML
   // // $mail->Subject = 'Here is the subject';
   // // $mail->Body = file_get_contents('email/email_party.html');
   // // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   // //
   // // $mail->send();
   //
   // $to = $_GET['email']; //$mailDemandeur
   // $from = 'miw@miw.com';
   // $fromName = 'LP MIW';
   // $subject = "XMAS PARTY à GAP";
   //
   // // Set content-type header for sending HTML email
   // $headers = 'From: '.$fromName.'<'.$from.'>' . "\r\n";
   // $headers .= "MIME-Version: 1.0" . "\r\n";
   // $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
   // $headers .= "\r\n";
   //
   // // Additional headers
   // // $headers .= 'Cc: welcome@example.com' . "\r\n";
   // // $headers .= 'Bcc: welcome2@example.com' . "\r\n";
   //
   // // Get HTML contents from file
   // $htmlContent = file_get_contents("email/email_party.html");
   // // $htmlContent = str_replace("maClefUnique", "$clef", $htmlContent);
   //
   // // Send email
   // mail($to, $subject, $htmlContent, $headers);

   //$mail->SMTPDebug = 2;                      // Enable verbose debug output
   $mail->isSMTP();                                            // Send using SMTP
   $mail->CharSet = 'utf-8';
   $mail->Host = 'smtp.office365.com';                    // Set the SMTP server to send through
   $mail->SMTPAuth = true;                                   // Enable SMTP authentication
   $mail->Username = 'cesar.w2000@hotmail.fr';               // SMTP username
   $mail->Password = '********';                               // SMTP password
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted 'PHPMailer::ENCRYPTION_STARTTLS'
   $mail->Port = 587;

   $mail->SMTPOptions = array(
      'ssl' => array(
           'verify_peer' => false,
           'verify_peer_name' => false,
           'allow_self_signed' => true
      )
   );

   //Recipients
   $mail->setFrom('cesar.w2000@hotmail.fr', 'MIW Party');
   if(isset($_GET['email'])){
      $mail->addAddress($_GET['email']);
      $mail->addCC($_GET['email']);
   }

   // Content
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'MIW Party';
   $mail->Body = file_get_contents('email/email_party.html');
   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   $mail->send();

   //echo 'Message has been sent';
   header('Location: index.php?delivery=sent');
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

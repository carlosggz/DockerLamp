<?php 
require('vendor/autoload.php');

$url = "http://".$_SERVER['SERVER_NAME'].":1080";

$mail = new PHPMailer;

$mail->isSMTP();            // Set mailer to use SMTP
$mail->Host = 'mail';       // Specify main and backup SMTP servers
$mail->SMTPAuth = false;    // Disable SMTP authentication
$mail->Port = 25;           // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('to@example.net', 'Joe User');     
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Mail sent at '.date('l jS \of F Y h:i:s A');
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$message = !$mail->send()
    ? 'Message could not be sent.<br />Mailer Error: ' . $mail->ErrorInfo
    : "Message has been sent, check your mail";

?>
<html>
    <head>
        <title>Docker LAMP</title>
    </head>
    <body>
        <h1>Docker LAMP - Test email server</h1>
        <h3><?= $message ?></h3>
        <p><a href="<?= $url ?>" target="_blank">Open email server interface</a></p> 
        <p><a href="index.html">Back to home</a></p>
    </body>
</html>


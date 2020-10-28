<?php

function print_pre($arr)
{
    print "<pre>";
    print_r($arr);
    print "</pre>";
}

function userpost($text)
{
   return $text = htmlspecialchars($text, ENT_QUOTES); 
}

function curl_post($url, $data)
{
    $query = http_build_query($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "{$url}?{$query}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $out = curl_exec($ch);
    curl_close($ch);
    
    return $out;
}

function phpmail($from, $to, $subject, $text, $password)
{
    require $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    $mail->CharSet = 'utf-8';
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "smtp.timeweb.ru";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = $from;
    //Password to use for SMTP authentication
    $mail->Password = $password;
    //Set who the message is to be sent from
    $mail->setFrom($from, '');
    //Set an alternative reply-to address
    $mail->addReplyTo($from, '');
    //Set who the message is to be sent to
    $mail->addAddress($to, '');
    //Set the subject line
    $mail->Subject = $subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->IsHTML(true);
    //Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body';
    $mail -> Body = $text;
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');
    $mail->send();

    //echo "Mailer Error: " . $mail->ErrorInfo;

}

function mb_ucfirst($string, $enc = 'UTF-8')
{
  return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) . mb_substr($string, 1, mb_strlen($string, $enc), $enc);
}

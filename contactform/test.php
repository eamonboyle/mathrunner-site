<?php
   $to = "blaowgaming@gmail.com"; // <– replace with your address here
   $subject = "test email";
   $message = "Hello! This is a simple test email message.";
   $from = "blaowskate@hotmail.com";
   $headers = "From:" . $from;
   mail($to,$subject,$message,$headers);
   echo "Mail Sent.";
?>
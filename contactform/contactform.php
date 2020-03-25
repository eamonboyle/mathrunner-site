<?php
include "../helpers/database.php";

$message = new ContactMessage;
$message->to = 'blaowgaming@gmail.com';
$message->from_name = $_POST['name'];
$message->from_email = $_POST['email'];
$message->subject = 'Math Runner Contact - ' . $_POST['subject'];

$message->add_message($_POST['name'], 'Name');
$message->add_message($_POST['email'], 'Email');
$message->add_message($_POST['message'], 'Message');

echo $message->send();

?>
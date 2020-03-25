<?php
include "../vendor/autoload.php";

$db = new Zebra_Database();

// $db->connect("localhost", "root", "", "mathrunner");
$db->connect("mathrunner.app", "eamonboyle", "Eamon1992!", "mathrunner");

$db->debug = true;

function insertContact($name, $email, $message)
{
    global $db;

    $db->insert(
        'contact',
        array(
            'name'      => $name,
            'email'      => $email,
            'message'      => $message,
            'message_sent' => 'NOW()'
        )
    );
}

class ContactMessage {
    public $to = '';
    public $ajax = true;
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
  
    private $body = '';
    private $headers = '';
  
    function add_message($string, $text)
    {
      $this->body .= '<b>' . $text . ':</b> ' . $string . '<br />';
    }
  
    function send()
    {
        insertContact($this->from_name, $this->from_email, $this->body);


      $this->headers = "From: Math Runner (info@eamonsdiary.co.uk)\r\n";
      $this->headers .= "Reply-To: ". strip_tags($this->from_email) . "\r\n";
      $this->headers .= "MIME-Version: 1.0\r\n";
      $this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
      if(mail($this->to, $this->subject, $this->body, $this->headers))
      {
        return 'OK';
      }
  
      return 'Failed to send your message, please try again.';
    }
  }

// insertContact("Eamon", 'info@eamonsdiary.co.uk', 'this is a message from PHP');
?>
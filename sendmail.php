<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
# ini_set("SMTP", "smtp.gmail.com");
# $from = $_POST["from"];
$to = $_POST["to"];
$head = $_POST["head"];
$body = $_POST["body"];

mail($to, $head, $body);

?>
<?php 
# FEITO POR: Paulo Artur 
# 03/10/2023

# OBS: No gmail ativar 'Acesso a app menos seguro'

//include classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

//criar objeto do handler do email e habilitar exceções (true)
$mail = new PHPMailer(true);
$to   = $_POST['to'];
$head = $_POST['head'];
$body = $_POST['body'];

try {
    // configs do server
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                    # server host
    $mail->SMTPAuth   = true;                                # auth
    $mail->Username   = 'seu@email.com';                     # email
    $mail->Password   = 'secreto';                           # senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         # habilitar encripção
    $mail->Port       = 465;                                 # porta usada

    // Recipientes
    $mail->setFrom('seu@email.com');
    $mail->addAddress($to);

    // Conteúdo
    $mail->isHTML(false);
    $mail->Subject = $head;
    $mail->Body    = $body;

    $mail->send();
    echo "<h1>Mensagem mandada!</h1>";
}
catch (Exception $e) {
    echo "<h1>Mensagem <b>NÃO</b> mandada!</h1>".
    "<h2>Erro: $mail->ErrorInfo</h2>";
}
?>
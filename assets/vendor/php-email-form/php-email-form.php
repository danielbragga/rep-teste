<?php
// Definir as variáveis de recebimento do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Definir o endereço de e-mail de destino
$receiving_email_address = 'danielbraga2221@gmail.com';

// Configurar o cabeçalho do e-mail
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Montar o corpo do e-mail
$body = "<strong>Nome:</strong> " . $name . "<br>";
$body .= "<strong>E-mail:</strong> " . $email . "<br>";
$body .= "<strong>Assunto:</strong> " . $subject . "<br>";
$body .= "<strong>Mensagem:</strong> " . nl2br($message) . "<br>";

// Enviar o e-mail
if (mail($receiving_email_address, $subject, $body, $headers)) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Falha ao enviar a mensagem.";
}
?>
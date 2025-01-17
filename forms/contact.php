<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Definir as variáveis de recebimento do formulário
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
  $message = isset($_POST['message']) ? $_POST['message'] : '';

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
    echo json_encode(['status' => 'success', 'message' => 'Mensagem enviada com sucesso!']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Falha ao enviar a mensagem.']);
  }
}
?>
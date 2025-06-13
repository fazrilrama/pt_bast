<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = htmlspecialchars($_POST['name']);
  $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  $to = "info@bast.co.id";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  $body = "Nama: $name\nEmail: $email\nSubject: $subject\n\nPesan:\n$message";

  if (mail($to, $subject, $body, $headers)) {
    echo "OK";
  } else {
    echo "Gagal mengirim email.";
  }
}
?>

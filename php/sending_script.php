<?php 
    $to = '313068@stud.umk.pl';
    $topic = 'Wiadomość ze strony WWW';
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = $_POST['text'];
    $topic = '=?UTF-8?B?' . base64_encode($topic) . '?=';

    $headers = 'Content-type: text/html; charset=UTF-8' . PHP_EOL;
    $headers.= "From: =?UTF-8?B?" . base64_encode($name) . "?= <$email>" . PHP_EOL;
    $headers.= "Reply-To: $email" . PHP_EOL;
    $headers.= 'X-Mailer: PHP/' . phpversion();
    $headers.= "Return-Path: $email". PHP_EOL;
    $headers.= "X-Priority: 3" . PHP_EOL;

    $protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
    $page = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $date = date('j.m.Y');
    $time = date('h:i:s');

    $content = "Wiadomość ze strony: $page <br>";
    $content .= "Imie i nazwisko: $name <br>";
    $content .= "Adres email: $email <br>";
    $content .= "Treść wiadomości: <br>";
    $content .= "<pre>$message </pre><br>";
    $content .= "Wiadomość wysłana dnia $date o godz. $time.";

    if (mail($to, $topic, $content, $headers)) {
        echo 'Twoja wiadomość została wysłana!';
    } 
    else {
        echo 'Wystąpił błąd podczas wysyłania!';
    }
?>
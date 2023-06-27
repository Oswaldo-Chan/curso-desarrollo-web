<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($nombre, $email, $token) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = $_ENV['MAILTRAP_USER'];
        $mail->Password = $_ENV['MAILTRAP_PASS'];
        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>¡Hola, ".$this->nombre."!</strong> Has creado tu cuenta en UpTask, solo debes confirmarla en el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://".$_ENV['VIRTUALHOST']."/confirmar?token=".$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }
}
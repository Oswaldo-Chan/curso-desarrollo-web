<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'ae51157c559c16';
        $mail->Password = '9de6c97bef4d6d';
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>¡Hola, ".$this->nombre."!</strong> Has creado tu cuenta en App Salon, 
        solo falta confirmarla presionando el siguiente enlace.</p>";
        //aqui cree en wamp un virtualhost el cual se llama appsalon
        $contenido .= "<p>Presiona aquí: <a href='http://".$_ENV['VIRTUALHOST']."/confirmar-cuenta?token=".$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        $mail->send();
    }
    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'ae51157c559c16';
        $mail->Password = '9de6c97bef4d6d';
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablecer password';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>¡Hola, ".$this->nombre."!</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        //aqui cree en wamp un virtualhost el cual se llama appsalon
        $contenido .= "<p>Presiona aquí: <a href='http://".$_ENV['VIRTUALHOST']."/recuperar?token=".$this->token."'>Reestablecer password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        $mail->send();
    }
}
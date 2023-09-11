<?php

namespace  Classes;


//use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct( $email, $nombre, $token ) 
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        $mail = new PHPMailer();
      
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['EMAIL_PORT'];
    
            $mail->setFrom('recaudaciones@sophianum.edu.pe', 'SOPORTE TI-Sophianum');
            $mail->addAddress('jorge.zavala@sophianum.edu.pe');
            $mail->addCC('jezc2000@hotmail.com');
    
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->Subject = 'Prueba de envio de correo por PHP';
            $mail->Subject = 'Confirma tu Cuenta';
            //$mail->Body = 'Esta es una prueba de <b> Envío de corroe desde PHP</b>';

            $contenido = '<html>';
            $contenido .= "<p><strong>Hola " . $this->nombre . " </strong>Has Creado tu cuenta en SoporteTI, solo debes confirmarla en el siguiente enlace</p>" ;
 
            $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/confirmar?token=" .  $this->token . "'>Confirmar Cuenta</a></p>";
 
            $contenido .= "<p> Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
            $contenido .= '</html>';

            $mail->Body = $contenido;

            $mail->send();
    
            echo 'Correo Enviado';
        } catch(Exception $e) {
            echo 'Mensaje '. $mail->ErrorInfo;
        }
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer();
      
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['EMAIL_PORT'];
    
            $mail->setFrom('recaudaciones@sophianum.edu.pe', 'SOPORTE TI-Sophianum');
            $mail->addAddress('jorge.zavala@sophianum.edu.pe');
            //$mail->addCC('jezc2000@hotmail.com');
    
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->Subject = 'Prueba de envio de correo por PHP';
            $mail->Subject = 'Reestablece tu Password';
            //$mail->Body = 'Esta es una prueba de <b> Envío de corroe desde PHP</b>';

            $contenido = '<html>';
            $contenido .= "<p><strong>Hola " . $this->nombre . " </strong>Restablece tu password en el siguiente enlace</p>" ;
 
            $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/reestablecer?token=" .  $this->token . "'>Reestablecer Password</a></p>";
 
            $contenido .= "<p> Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
            $contenido .= '</html>';

            $mail->Body = $contenido;

            $mail->send();
    
            echo 'Correo Enviado';
        } catch(Exception $e) {
            echo 'Mensaje '. $mail->ErrorInfo;
        }



    }

}
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{

    public static function enviar($correo, $nombre, $asunto, $cuerpo){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.educa.madrid.org';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'jason.londono';                     //SMTP username
            $mail->Password   = $_ENV['MAIL_PASSWD'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = "utf-8";

            //Recipients
            $mail->setFrom('jason.londono@educa.madrid.org', 'Jason Londoño');
            $mail->addAddress($correo, $nombre);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('jason.londono@educa.madrid.org', 'Jason Londoño');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public static function enviarRegistro($correo, $nombre, $token) {
        $asunto = 'Registro';
        $cuerpo = <<<EOL
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <style>
                table, td, div, h1, p {font-family: Arial, sans-serif;}
                table, td {border:2px solid #000000 !important;}
            </style>
        </head>
        <body style="margin: 0; padding: 0;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                <tr>
                    <td align="center" style="padding: 0;">
                        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                            <tr>
                                <td align="center" style="padding: 40px 0;">
                                    <h2>Linkenin</h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <p align="left">Hola {$nombre}. Pulse el siguiente botón para verificar su cuenta en nuestra plataforma.</p>

                                    <a href="http://localhost:8000/verificar.php?t={$token}" class="btn btn-primary">Verificar correo</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <small class="text-muted">Una vez verifique su correo no podrá usar más este enlace.</small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        EOL;

        self::enviar($correo, $nombre, $asunto, $cuerpo);
    }

    public static function enviarRecuperar($correo, $nombre, $token) {

        $asunto = 'Linkenin - Recuperar contraseña';
        $cuerpo = <<<EOL
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <style>
                table, td, div, h1, p {font-family: Arial, sans-serif;}
                table, td {border:2px solid #000000 !important;}
            </style>
        </head>
        <body style="margin: 0; padding: 0;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                <tr>
                    <td align="center" style="padding: 0;">
                        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                            <tr>
                                <td align="center" style="padding: 40px 0;">
                                    <h2>Linkenin</h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <p align="left">Para poder restablecer la contraseña de tu cuenta haz click en el siguiente enlace y estable la nueva con la que te vas a identificar en la plataforma.</p>

                                    <a href="http://localhost:8000/recuperar.php?t={$token}" class="btn btn-primary">Recuperar contraseña</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <small class="text-muted">Una vez se cambie no podrá usar más este enlace o después de media hora tras recibir el correo.</small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        EOL;

        self::enviar($correo, $nombre, $asunto, $cuerpo);
    }
}

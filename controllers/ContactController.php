<?php

use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends BaseController
{
    public function send(): void
    {
        #--------------------------------------------#
        $to = [
            "address"   => getenv("MY_EMAIL"),
            "name"   => getenv("MY_NAME")
        ];
        #--------------------------------------------#

        $subject    = $_POST["subject"];
        $message    = $_POST["message"];
        $from       = $_POST["email"];

        $mail = $this->config($from, $to, $to, $subject, $message);

        if (!$mail->send()) {
            $result = "Houve um erro ao enviar o e-mail: " . $mail->ErrorInfo;
            $type = "danger";
        } else {
            $result = "Mensagem enviada com sucesso.";
            $type = "success";
        }

        $alert = "<div class='alert alert-$type alert-dismissible fade show' role='alert'><strong>Opa!</strong> $result</div>";
        
        $_SESSION["alert"] = $alert;
        header("Location: " . $this->getRouteBase() . "/");
    }

    private function config($from, $to = array(), $cc = array(), $subject, $message): PHPMailer
    {
        #--------------------------------------------#
        $host       = getenv("SMTP_HOST");
        $username   = getenv("SMTP_USERNAME");
        $password   = getenv("SMTP_PASSWORD");
        $port       = getenv("SMTP_PORT");
        #--------------------------------------------#

        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Host         = $host;
        $mail->SMTPAuth     = true;
        $mail->SMTPSecure   = 'tls';
        $mail->Username     = $username;
        $mail->Password     = $password;
        $mail->Port         = $port;

        $mail->setFrom($from);
        $mail->addAddress($to["address"], $to["name"]);
        $mail->addCC($cc["address"], $cc["name"]);

        $mail->isHTML(true);

        $mail->Subject      = $subject;
        $mail->Body         = $message;

        return $mail;
    }
}

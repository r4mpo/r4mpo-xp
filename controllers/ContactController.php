<?php

class ContactController extends BaseController
{
    public function send()
    {
        $to         = getenv("MY_EMAIL");
        $subject    = $_POST["subject"];
        $message    = $_POST["message"];
        $from       = $_POST["email"];

        $headers = "From: $from"       . "\r\n" .
            "Reply-To: $from" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

        mail($to, subject: $subject, message: $message, additional_headers: $headers);
    }
}

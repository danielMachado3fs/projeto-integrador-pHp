<?php

namespace App\Views\login;


use PHPMailer\PHPMailer\PHPMailer;
use SplObserver;
use SplSubject;


class Logger implements SplObserver
{
    private function sendMail($to_email, $subject_email, $message)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'senderemailfrotas@gmail.com';
        $mail->Password = 'akaeexkpsbwnmprh';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('senderemailfrotas@gmail.com', 'RastrearFrotas');
        $mail->addAddress($to_email);

        $mail->Subject = $subject_email;
        $mail->Body = $message;

        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';
        }
    }

    public function update(SplSubject $subject)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $to_email = "email@gmail.com";  // Email recebedor
        $subject_email = 'Logger de Usuario';  // Assunto do email
        $message = "Usuário: {$subject->email} \nID: {$subject->userid} \nLogou em: " . date('Y-m-d H:i:s') . "\n";
        mail('santiangofabricio@gmail.com', $subject_email, $message);

        $this->sendMail($to_email, $subject_email, $message);
    }
}
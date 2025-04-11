<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars('gsa.sanjeet@gmail.com');
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sanjeetshekhawat2@gmail.com';
        $mail->Password = 'nrvuzukeqajdtamm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('admin@seizotechnology.com', 'Saurabh');
        $mail->Subject = "New Contact Us Message from $name";
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";

        if ($mail->send()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error"]);
    }
}
?>

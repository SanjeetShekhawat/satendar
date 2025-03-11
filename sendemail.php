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
        $mail->Username = 'beltechnology38@gmail.com';
        $mail->Password = 'fqlfksnsrbxomewi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('sanjeetshekhawat2@gmail.com', 'Sanjeet');
        $mail->Subject = "New Contact Us Message from $name";
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";

        if ($mail->send()) {
            header("Location: index.html");
            exit();
        } else {
            header("Location: error_page.php?error=" . urlencode($mail->ErrorInfo));
            exit();
        }
    } catch (Exception $e) {
        header("Location: error_page.php?error=" . urlencode($e->getMessage()));
        exit();
    }
}
?>

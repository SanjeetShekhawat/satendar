<?php
echo "hellohellohellohello";
// send_email.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars("gsa.sanjeet@gmail.com");
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address (your email)
    $to = "sanjeetshekhawat2@gmail.com"; // Replace with your email address
    $subject = "New Contact Us Message from $name";

    // Create the email body
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Redirect to a thank you page after successful submission
        header("Location: about_us.html"); // Replace with your thank you page URL
        exit();  // Ensure the script stops executing
    } else {
        echo "Sorry, something went wrong and we couldn't send your message.";
    }
}
?>

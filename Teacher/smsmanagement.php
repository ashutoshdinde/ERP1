<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="#" method="POST">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Compose email
    $to = "dindeashutosh6@gmail.com";
    $subject = "Message from Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // SMTP configuration
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 25;
    $smtpUsername = 'ashutoshdinde2003@gmail.com'; // Your Gmail username
    $smtpPassword = 'Ashu@2003'; // Your Gmail password

    // Attempt to send email using Gmail SMTP
    if (mail($to, $subject, $body, $headers, "-f $smtpUsername")) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect back to the form
  
    echo " request method is not post";
    exit();
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Your email where messages will go
    $to = "info@fillamotors.et"; // <-- change this to your real receiving email
    $subject = "New Contact Form Message from $name";

    // Email content
    $body = "
    You have received a new message from the Filla Motors website:
    
    Name: $name
    Email: $email
    Message:
    $message
    ";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('✅ Message sent successfully! We will get back to you soon.');
                window.location.href='contact.html';
              </script>";
    } else {
        echo "<script>
                alert('❌ Sorry, your message could not be sent. Please try again later.');
                window.history.back();
              </script>";
    }
} else {
    // If accessed directly, redirect back
    header("Location: contact.html");
    exit();
}
?>

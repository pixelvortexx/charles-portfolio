<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize inputs
    $name = strip_tags(trim($_POST["name"] ?? ""));
    $email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"] ?? "");

    // Check inputs
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Bad input, redirect back with error
        header("Location: index.html?status=error");
        exit;
    }

    // Recipient email address (put your email here)
    $recipient = "your-email@example.com";

    // Email subject
    $subject = "New contact from $name via Portfolio";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($recipient, $subject, $email_content, $headers)) {
        // Success
        header("Location: index.html?status=success");
    } else {
        // Fail
        header("Location: index.html?status=error");
    }
} else {
    // Not a POST request, redirect to home
    header("Location: index.html");
    exit;
}
?>

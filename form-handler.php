<?php
// Validate and sanitize user input
$name = htmlspecialchars($_POST['name']);
$visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

// Check if all required fields are filled
if (!$name || !$visitor_email || !$subject || !$message) {
    // Handle missing fields error
    echo "All fields are required!";
    exit;
}

// Sender's email address
$email_from = 'roinbejanidze2022@gmail.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name\n" .
              "User Email: $visitor_email\n" .
              "Subject: $subject\n" .
              "User Message: $message\n";

$to = 'avinash6252@gmail.com';

$headers = "From: $email_from\r\n" .
           "Reply-To: $visitor_email\r\n";

// Send email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Redirect to a thank you page
    header("Location: thank_you.html");
    exit;
} else {
    // Handle email sending failure
    echo "Oops! Something went wrong.";
}
?>
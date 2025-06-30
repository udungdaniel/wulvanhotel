<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "email@example.com";  // actual email
    $subject = "New Conference Hall Booking";

    $message = "";
    foreach ($_POST as $key => $value) {
        $message .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
    }

    $headers = "From: booking-form@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Booking submitted successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>

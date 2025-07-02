<?php
// Start session and include database
session_start();
require_once('db.php');
include 'header.php';

$successMessage = "";
$errorMessage = "";

// Form submission handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organizerName = trim($_POST['organizerName']);
    $contactPerson = trim($_POST['contactPerson']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $eventName = trim($_POST['eventName']);
    $eventDate = $_POST['eventDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $attendees = $_POST['attendees'];
    $termsAccepted = isset($_POST['terms']) ? 1 : 0;

    // Validate required fields
    if (empty($organizerName) || empty($contactPerson) || empty($phone) || empty($email) || empty($eventName) || empty($eventDate) || empty($startTime) || empty($endTime) || empty($attendees) || !$termsAccepted) {
        $errorMessage = "Please complete all required fields and accept the terms.";
    } else {
        // Insert into database
        $stmt = $con->prepare("INSERT INTO hall_requests (organizer_name, contact_person, phone, email, event_name, event_date, start_time, end_time, attendees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $organizerName, $contactPerson, $phone, $email, $eventName, $eventDate, $startTime, $endTime, $attendees);

        if ($stmt->execute()) {
            $successMessage = "Your hall booking request has been submitted successfully. We will contact you for confirmation.";
        } else {
            $errorMessage = "Something went wrong. Please try again.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hall Booking Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        form { max-width: 700px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 5px; }
        label { margin-top: 10px; display: block; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        .terms { font-size: 14px; background: #fff; padding: 10px; margin-top: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .alert { margin-top: 20px; }
        .promo-box { background-color: #fffbea; border: 1px solid #ffd76a; padding: 20px; border-radius: 5px; margin-bottom: 30px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center" style="color: goldenrod;">Hall Booking Form</h2>

    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?php echo $successMessage; ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <!-- Promotional Message -->
    <div class="promo-box">
        <h4 style="color: #b48800;"><strong> Host your unforgetable Event in our luxurious Hall! - Book Now!</strong></h4>
        <p>Looking for the perfect venue to host your next event? Whether you're planning an intimate gathering or a large-scale conference, we have the ideal space for you:</p>
        <ul>
            <li><strong> Mini Hall (1–40 Guests):</strong> Ideal for meetings, seminars, training sessions, or small celebrations. Equipped with modern amenities, air-conditioning, and high-speed Wi-Fi.</li>
            <li><strong> International Conference Hall (Up to 500 Guests):</strong> Perfect for conferences, workshops, or corporate events with a large audience. Includes stage, podium, AV support, and professional setup.</li>
        </ul>
        <p>Enjoy flexible booking, reliable on-site support, and a comfortable environment tailored to your event's needs. <strong>Availability is limited—reserve your date today!</strong></p>
    </div>

    <form method="post">

        <!-- Organizer Details -->
        <label for="organizerName">Name of Organizer / Company:</label>
        <input type="text" id="organizerName" name="organizerName" required value="<?php echo htmlspecialchars($_POST['organizerName'] ?? '') ?>">

        <label for="contactPerson">Name of Contact Person:</label>
        <input type="text" id="contactPerson" name="contactPerson" required value="<?php echo htmlspecialchars($_POST['contactPerson'] ?? '') ?>">

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required value="<?php echo htmlspecialchars($_POST['phone'] ?? '') ?>">

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">

        <!-- Event Details -->
        <label for="eventName">Event Type:</label>
        <input type="text" id="eventName" name="eventName" required value="<?php echo htmlspecialchars($_POST['eventName'] ?? '') ?>">

        <label for="eventDate">Date of Event:</label>
        <input type="date" id="eventDate" name="eventDate" required value="<?php echo htmlspecialchars($_POST['eventDate'] ?? '') ?>">

        <label for="startTime">Start Time:</label>
        <input type="time" id="startTime" name="startTime" required value="<?php echo htmlspecialchars($_POST['startTime'] ?? '') ?>">

        <label for="endTime">End Time:</label>
        <input type="time" id="endTime" name="endTime" required value="<?php echo htmlspecialchars($_POST['endTime'] ?? '') ?>">

        <label for="attendees">Hall Preference:</label>
        <select id="attendees" name="attendees" required>
            <option value="" disabled <?php echo !isset($_POST['attendees']) ? 'selected' : ''; ?>>Select seating capacity</option>
            <option value="small" <?php echo (($_POST['attendees'] ?? '') === 'small') ? 'selected' : ''; ?>>Min Hall (1–40 people)</option>
            <option value="medium" <?php echo (($_POST['attendees'] ?? '') === 'medium') ? 'selected' : ''; ?>>Int'l Conference Hall (1–500 people)</option>
        </select>

        <!-- Terms and Agreement -->
        <div class="terms">
            <label>
                <input type="checkbox" name="terms" required <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
                By submitting this booking form, I acknowledge and agree to the following terms:
                <ul>
                    <li>The booking is confirmed only after receiving a confirmation from the venue.</li>
                    <li>Any reservation made is valid for the specified event date and time as indicated in this form.</li>
                    <li>If the organizer or authorized person does not arrive within <strong>1 hour</strong> after the specified time on the form, the reservation will be considered <strong>invalid and automatically canceled</strong>.</li>
                    <li>The venue reserves the right to reallocate the hall if the reservation is canceled or deemed invalid due to no-show.</li>
                    <li>I agree to comply with all venue rules and regulations and take responsibility for any damages during the event.</li>
                    <li>Cancellations or changes to the booking must be communicated at least 24 hours before the event.</li>
                </ul>
            </label>
        </div>

        <br>
        <input type="submit" class="btn btn-block" value="Submit Booking" style="background-color: goldenrod; color: white;">
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>

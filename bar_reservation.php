<?php
require_once('db.php');
include 'header.php';

$successMessage = "";
$errorMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = preg_replace("/[^0-9]/", "", $_POST['phone']); // Sanitize phone
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $special_requests = trim($_POST['special_requests']);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($guests)) {
        $errorMessage = "Please complete all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } else {
        // Insert into DB using prepared statement
        $stmt = $con->prepare("INSERT INTO bar_reservations (name, email, phone, date, time, guests, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $phone, $date, $time, $guests, $special_requests);

        if ($stmt->execute()) {
            $successMessage = "Your bar reservation has been received! We’ll contact you shortly.";
        } else {
            $errorMessage = "An error occurred. Please try again later.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bar Reservation Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        form {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        label { margin-top: 10px; display: block; }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .alert { margin-top: 20px; }
        .bar-box { background-color: #fffbea; border: 1px solid #ffd76a; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
        .post {
           background-color:goldenrod
        }
       
        
   </style>
</head>
<body>
    <div class="bar-box">
        <p><strong>Book Your Event with Us!</strong><br> Fill out our bar reservation form for intimate gatherings or larger celebrations. Mini Hall for smaller parties and Conference Hall for larger events. Include special requests, and we'll make it happen. We can't wait to welcome you!
        </p>
    </div>

<div class="container">
    <h2 class="text-center" style="color: goldenrod;">Bar Reservation Form</h2>

    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?php echo $successMessage; ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form method="post" class= "post">

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>">

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required value="<?php echo htmlspecialchars($_POST['phone'] ?? '') ?>">

        <label for="date">Reservation Date:</label>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo htmlspecialchars($_POST['date'] ?? '') ?>">

        <label for="time">Reservation Time:</label>
        <input type="time" id="time" name="time" required value="<?php echo htmlspecialchars($_POST['time'] ?? '') ?>">

        <label for="guests">Expected Attendees:</label>
        <select id="guests" name="guests" required>
            <option value="" disabled <?php echo !isset($_POST['guests']) ? 'selected' : ''; ?>>Select seating capacity</option>
            <option value="Mini Hall" <?php echo (($_POST['guests'] ?? '') === 'Mini Hall') ? 'selected' : ''; ?>> 1–10 people </option>
            <option value="Mini Hall" <?php echo (($_POST['guests'] ?? '') === 'Mini Hall') ? 'selected' : ''; ?>> 21–30 people </option>
            <option value="Conference Hall" <?php echo (($_POST['guests'] ?? '') === 'Conference Hall') ? 'selected' : ''; ?>>Above 31 people</option>
        </select>

        <label for="special_requests">Special Requests:</label>
        <textarea id="special_requests" name="special_requests" rows="3"><?php echo htmlspecialchars($_POST['special_requests'] ?? '') ?></textarea>

        <br>
        <input type="submit" class="btn btn-block" value="Book Now" style="background-color: white; color: black; font-weight: bold; font-size: 16px;">
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
